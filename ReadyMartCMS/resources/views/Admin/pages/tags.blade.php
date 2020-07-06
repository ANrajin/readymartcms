@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card bd-0">
                <div class="card-header card-header-default bg-info">
                    Create New Tag
                </div><!-- card-header -->
                <div class="card-body bd bd-t-0 rounded-bottom">
                    <form action="{{route('tags.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Tag</label>
                            <input class="form-control @error('tag') is-invalid @enderror" placeholder="Create New Tag" type="text" name="tag">
                            @error('tag')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Create</button>
                    </form>
                </div><!-- card-body -->
            </div><!-- card -->
        </div>
        <div class="col-md-9">
            <div class="card bd-0">
                <div class="card-header card-header-default bg-dark">
                    Created Tags
                </div><!-- card-header -->
                <div class="card-body bd bd-t-0 rounded-bottom">
                    <div class="table-wrapper">
                        <table id="datatable" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th>SL:</th>
                                    <th>Action</th>
                                    <th>UN ID:</th>
                                    <th>Tags</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-sm text-info"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('tag.remove', $tag->id)}}" class="btn btn-sm text-danger delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                        <td>tag#{{$tag->id}}</td>
                                        <td>{{$tag->tags}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- card-body -->
            </div><!-- card -->
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
    </script>
@endpush
