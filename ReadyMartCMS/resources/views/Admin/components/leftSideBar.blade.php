<div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
<div class="sl-sideleft">
  <div class="input-group input-group-search">
    <input type="search" name="search" class="form-control" placeholder="Search">
    <span class="input-group-btn">
      <button class="btn"><i class="fa fa-search"></i></button>
    </span><!-- input-group-btn -->
  </div><!-- input-group -->

  <label class="sidebar-label">Navigation</label>

  <!-- sl-sideleft-menu -->
  <div class="sl-sideleft-menu">
    <!-- sl-menu-link -->
    <a href="{{route('admin.home')}}" class="sl-menu-link {{Request::is('admin/home') ? 'active' : ''}}">
      <!-- menu-item -->
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
        <span class="menu-item-label">Dashboard</span>
      </div>
    </a>
    {{-- tag --}}
    <a href="{{route('tags.index')}}" class="sl-menu-link {{Request::is('admin/tags') ? 'active' : ''}}">
      <!-- menu-item -->
      <div class="sl-menu-item">
        <i class="menu-item-icon fa fa-tags tx-22"></i>
        <span class="menu-item-label">Tags</span>
      </div>
    </a>
    {{-- category --}}
    <a href="{{route('categories.index')}}" class="sl-menu-link {{Request::is('admin/categories') ? 'active' : ''}}">
      <!-- menu-item -->
      <div class="sl-menu-item">
        <i class="menu-item-icon icon ion-paperclip tx-22"></i>
        <span class="menu-item-label">Categories</span>
      </div>
    </a>
    {{-- Posts --}}
    <a href="#" 
    class="sl-menu-link {{Request::is('admin/posts') ? 'active show-sub' : ''}} {{Request::is('admin/all-posts') ? 'active show-sub' : ''}}">
      <div class="sl-menu-item">
        <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
        <span class="menu-item-label">Posts</span>
        <i class="menu-item-arrow fa fa-angle-down"></i>
      </div><!-- menu-item -->
    </a><!-- sl-menu-link -->
    <ul class="sl-menu-sub nav flex-column">
      <li class="nav-item">
        <a href="{{route('posts.index')}}" class="nav-link {{Request::is('admin/posts') ? 'active' : ''}}">Create Post</a>
        <a href="{{route('all.posts')}}" class="nav-link {{Request::is('admin/all-posts') ? 'active' : ''}}">Posts</a>
      </li>
    </ul>
  </div>

  <br>
</div><!-- sl-sideleft -->