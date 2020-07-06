@extends('Frontend.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-7">
                    @isset($featuredOne)
                        <a href="{{route('view.post', $featuredOne->slug)}}">
                            <div class="card mb-3">
                                <div class="img-card">
                                    <img class="card-img-top img-responsive" src="{{asset('storage/posts/'.$featuredOne->thumbnail)}}" alt="Card image cap">
                                    @if ($featuredOne->type == 'video')
                                        <span class="video-icon"><i class="fa fa-video-camera" aria-hidden="true"></i></span>
                                    @endif
                                </div>
                                <div class="card-body p-3">
                                    <h5 class="card-title">{{mb_strimwidth($featuredOne->title, 0, 50, "...")}}</h5>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </a>
                    @endisset
                </div>
                <div class="col-md-5">
                    <div class="row">
                        @isset($postsOne)
                            @foreach ($postsOne as $item)
                            <div class="col-md-6 px-1">
                                <a href="{{route('view.post', $item->slug)}}">
                                    <div class="card mb-3">
                                        <div class="img-card">
                                            <img class="card-img-top" src="{{asset('storage/posts/'.$item->thumbnail)}}" alt="Card image cap">
                                            @if ($item->type == 'video')
                                                <span class="video-icon"><i class="fa fa-video-camera" aria-hidden="true"></i></span>
                                            @endif
                                        </div>
                                        <div class="card-body p-2">
                                            <h5 class="card-title">{{mb_strimwidth($item->title, 0, 25, "...")}}</h5>
                                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    @isset($featuredTwo)
                    <a href="{{route('view.post', $featuredTwo->slug)}}">
                        <div class="card mb-3">
                            <div class="img-card">
                                <img class="card-img-top" src="{{asset('storage/posts/'.$item->thumbnail)}}" alt="Card image cap">
                                @if ($featuredTwo->type == 'video')
                                    <span class="video-icon"><i class="fa fa-video-camera" aria-hidden="true"></i></span>
                                @endif
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{mb_strimwidth($featuredOne->title, 0, 50, "...")}}</h5>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </a>
                    @endisset
                </div>
            </div>
            <div class="row">
                @isset($postsTwo)
                    @foreach ($postsTwo as $itemtwo)
                        <div class="col-md-6">
                            <a href="{{route('view.post', $itemtwo->slug)}}">
                                <div class="card mb-3">
                                    <div class="img-card">
                                        <img class="card-img-top" src="{{asset('storage/posts/'.$itemtwo->thumbnail)}}" alt="Card image cap">
                                        @if ($itemtwo->type == 'video')
                                            <span class="video-icon"><i class="fa fa-video-camera" aria-hidden="true"></i></span>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{mb_strimwidth($itemtwo->title, 0, 25, "...")}}</h5>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
@endsection