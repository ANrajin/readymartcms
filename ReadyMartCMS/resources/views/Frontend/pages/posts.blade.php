@extends('Frontend.layouts.master')
@section('content')
<div class="row">
    <div class="col-md-2">
        <div class="category">
            <p><strong>Categories</strong></p>
            @isset($categories)
            @foreach ($categories as $category)
                <span class="badge badge-secondary px-3">{{$category->category}}</span>
            @endforeach    
            @endisset
        </div>
        <hr>
        <div class="tags">
            <p><strong>Tags</strong></p>
            @isset($tags)
            @foreach ($tags as $tag)
                <span class="badge badge-secondary px-3">{{$tag->tags}}</span>
            @endforeach    
            @endisset
        </div>
    </div>
    @isset ($post)
        <div class="col-md-6">
            <div class="title py-2">
                <h2>{{$post->title}}</h2>
                <span class="text-secondary">by Admin</span>
            </div>
            @if ($post->type == 'video')
            @php
                $link = preg_replace("#.*youtube\.com/watch\?v=#", "", $post->video_link);
            @endphp
            <iframe width="740" height="400" src="https://www.youtube.com/embed/{{$link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            @else
            <img src="{{asset('storage/posts/'.$post->thumbnail)}}" class="img-fluid" alt="Responsive image">
            @endif
            <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit</span>
            <hr>
            <div class="text-justify">
                <?php
                    echo $post->details;    
                ?>
            </div>
            <div class="share py-5" style="font-size: 1.25rem">
                <span>Share:&nbsp;&nbsp;</span>
                <a href="" class="px-2">
                    <i class="fa fa-facebook-square" aria-hidden="true"></i>
                </a>
                <a href="" class="px-2">
                    <i class="fa fa-twitter-square" aria-hidden="true"></i>
                </a>
            </div>
            <hr>
            {{-- comment section --}}
            <div class="comment py-3">
                <div class="row py-3">
                    <div class="col-md-2">
                        <img src="{{asset('images/img1.jpg')}}" class="img-fluid rounded-circle" alt="Responsive image">
                    </div>
                    <div class="col-md-10">
                        <h5><strong>Jhon Doe</strong></h5>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo et nulla quas tempore ratione quaerat odit magnam eaque voluptatibus
                        </p>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-md-2">
                        <img src="{{asset('images/img2.jpg')}}" class="img-fluid rounded-circle" alt="Responsive image">
                    </div>
                    <div class="col-md-10">
                        <h5><strong>Jhon Doe</strong></h5>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo et nulla quas tempore ratione quaerat odit magnam eaque voluptatibus
                        </p>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-md-2">
                        <img src="{{asset('images/img3.jpg')}}" class="img-fluid rounded-circle" alt="Responsive image">
                    </div>
                    <div class="col-md-10">
                        <h5><strong>Jhon Doe</strong></h5>
                        <p>
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo et nulla quas tempore ratione quaerat odit magnam eaque voluptatibus
                        </p>
                    </div>
                </div>

                <form action="">
                    <div class="form-group">
                        <label for="" style="font-size: 1.5rem">
                            <strong>Leave your comment</strong>
                        </label>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    @endisset
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('images/p1.jpg')}}" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-7">
                <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </h5>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('images/p1.jpg')}}" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-7">
                <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </h5>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('images/p1.jpg')}}" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-7">
                <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </h5>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('images/p1.jpg')}}" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-7">
                <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </h5>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('images/p1.jpg')}}" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-7">
                <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </h5>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('images/p1.jpg')}}" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-7">
                <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </h5>
            </div>
        </div>
        <hr>
    </div>
</div>
@endsection