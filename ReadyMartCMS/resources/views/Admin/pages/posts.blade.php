@extends('admin.layouts.app')

@section('content')
    <h4>Create New Posts</h4>
    <form action="{{route("posts.store")}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Post Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Create post title" name="title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Post Slug</label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Create post slug" name="slug">
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Select Post Thumbnail</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <textarea name="details" id="summernote" class="form-control">Hello. Post Something Awesome!</textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <select class="form-control select2 @error('categories') is-invalid @enderror" data-placeholder="Categories" name="categories[]" multiple>
                                <option label="Categories"></option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                            </select>
                            @error('categories')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select class="form-control select2" data-placeholder="Tags" multiple name="tags[]">
                                @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->tags}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="appreance" class="form-control select2 @error('appreance') is-invalid @enderror" data-placeholder="Choose post section">
                                <option label="Choose post section"></option>
                                <option value="">Select Post Apperance</option>
                                <option value="one">Section One</option>
                                <option value="two">Section Two</option>
                            </select>
                            @error('appreance')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Posts Type</label>
                            <label class="rdiobox">
                                <input name="type" type="radio" value="post" checked>
                                <span>Post</span>
                            </label>
                            <label class="rdiobox">
                                <input name="type" type="radio" value="video">
                                <span>Video</span>
                            </label>
                            <input type="text" name="link" id="videolink" class="form-control" placeholder="insert video link here" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Posts Status</label>
                            <label class="ckbox">
                                <input type="checkbox" id="status" name="status" value="publish">
                                <span id="text">Un Publish</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="ckbox">
                                <input type="checkbox" name="featured" value="yes">
                                <span>Featured</span>
                            </label>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-info">Create Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('js')
    {{-- summernote --}}
    <script src="{{asset('AdminAssets/lib/summernote/summernote-bs4.min.js')}}"></script>

    <script>
        // Summernote editor
        $('#summernote').summernote({
            height: 300,
            tooltip: true
        })

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        $('input:radio[name="type"]').change(function(){
            if(this.checked && this.value == 'video'){
                $("#videolink").attr("disabled", false);
            }else{
                $("#videolink").attr("disabled", true);
            }
        })

        $("#status").change(function(){
            if(this.checked){
                $("#text").text("Publish");
            }else{
                $("#text").text("Un Publish");
            }
        })
    </script>
@endpush
