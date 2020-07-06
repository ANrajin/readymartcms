<header>
    <section class="bg-dark">
        <div class="container p-1">
            {{-- top bar --}}
            <div class="row">
                <div class="col-md-6">
                    {{-- social icons --}}
                    <a href="javascript:void(0)" class="text-light px-1" style="font-size: 1.2rem;">
                        <i class="fa fa-facebook-square" aria-hidden="true"></i>
                    </a>
                    <a href="javascript:void(0)" class="text-light px-1" style="font-size: 1.2rem;">
                        <i class="fa fa-twitter-square" aria-hidden="true"></i>
                    </a>
                    <a href="javascript:void(0)" class="text-light px-1" style="font-size: 1.2rem;">
                        <i class="fa fa-youtube-square" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-md-6 d-flex justify-content-end text-light">
                    {{-- contact information --}}
                    <span class="px-3"><strong><i class="fa fa-phone" aria-hidden="true"></i></strong>&nbsp;+880 1234 567 890</span>
                    <span class="px-3">
                        <a href="{{route("login")}}" class="btn btn-sm btn-outline-primary">Login/Register</a>
                    </span>
                </div>
            </div>
        </div>
    </section>

    <section class=" bg-primary">
        <div class="container py-4 px-0">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="{{URL::to("/")}}">
                    <span style="font-size: 1.5rem">
                        <strong>ReadyMartCMS</strong>
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{URL::to("/")}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("admin")}}">Admin</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
        </div>
    </section>
</header>