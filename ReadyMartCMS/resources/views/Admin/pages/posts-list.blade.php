@extends('Admin.layouts.app')

@section('content')
<h4>Created Posts</h4>
<div class="card">
    <div class="card-body">
        <div class="table-wrapper">
            <table id="datatable" class="table display responsive nowrap">
              <thead>
                <tr>
                    <th>SL:</th>
                    <th>UN_ID:</th>
                    <th>Thumbnail</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Created_at</th>
                </tr>
              </thead>
              <tbody>
                  @php
                      $i=1;
                  @endphp
                  @isset($posts)
                  @foreach ($posts as $post)
                      <tr>
                          <td>{{$i++}}</td>
                          <td>#{{$post->id}}</td>
                          <td><img src="{{asset('storage/posts/'.$post->thumbnail)}}" alt="thumbnail" style="width: 50px"></td>
                          <td>{{mb_strimwidth($post->title, 0, 50, "...")}}</td>
                          <td>{{$post->type}}</td>
                          <td>
                          <input type="checkbox" class="status" data-id="{{$post->id}}" value="publish" {{($post->status == 'publish') ? 'checked' : ''}}>&nbsp;
                              {{($post->status == 'publish') ? 'Published' : 'Un published'}}
                          </td>
                          <td>{{$post->created_at}}</td>
                      </tr>
                  @endforeach
                  @endisset
              </tbody>
            </table>
          </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        $('#datatable').DataTable({
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            }
        });

        $(".status").change(function(){
            var status = "";
            var id = $(this).data('id');
            if(this.checked){
                status = $(this).val();
            }else{
                status = 'unpublish'
            }
           
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

           $.ajax({
               url: "posts/"+id,
               method: "PUT",
               data: {status:status},
               success: function(data){
                   if(data == 'success'){
                       location.reload() = true;
                   }
               }
           })
        })
    </script>
@endpush