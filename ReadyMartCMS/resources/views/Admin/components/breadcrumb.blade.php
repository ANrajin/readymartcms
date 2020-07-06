<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{route('admin.home')}}">ReadyMart</a>
    <span class="breadcrumb-item active">
        @if (Request::is('admin/home'))
            {{'Dashboard'}}
        @elseif(Request::is('admin/tags'))
            {{'Tags'}}
        @elseif(Request::is('admin/categories'))
            {{'Category'}}
        @elseif(Request::is('admin/posts'))
            {{'Posts'}}
        @endif
    </span>
</nav>