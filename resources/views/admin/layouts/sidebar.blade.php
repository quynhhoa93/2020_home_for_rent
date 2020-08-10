<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        @if(Auth::user()->role->id == 1)
            <?php echo Auth::user()->role->id ?>
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a href="{{route('admin.dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is('admin/category') ? 'active' : '' }}"><a href="{{route('admin.category.index')}}"><i class="icon icon-th-list"></i> <span>tất cả danh mục</span></a></li>

            <li class="{{ Request::is('admin/contact') ? 'active' : '' }}"><a href="{{route('admin.getContact')}}"><i class="icon icon-home"></i> <span>phản ánh của khách hàng</span></a></li>

            <li class="{{ Request::is('admin/blogs') ? 'active' : '' }}"><a href="{{route('admin.blogs.index')}}"><i class="icon icon-home"></i> <span>bài viết blog</span></a></li>

            <li class="{{ Request::is('admin/pending/blogs') ? 'active' : '' }}"><a href="{{route('admin.blog.pending')}}"><i class="icon icon-home"></i> <span>bài viết blog chờ phê duyệt</span></a></li>

            <li class="{{ Request::is('admin/type-asset') ? 'active' : '' }}"><a href="{{route('admin.type-asset.index')}}"><i class="icon icon-list"></i> <span>loại tài sản</span></a></li>

            <li class="{{ Request::is('admin/information') ? 'active' : '' }}"><a href="{{route('admin.information.index')}}"><i class="icon icon-list"></i> <span>thông tin mua/thuê nhà đất</span></a></li>
        @endif


        @if(Auth::user()->role->id === 2 )
            <li class="{{ Request::is('author/dashboard') ? 'active' : '' }}"><a href="{{route('author.dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is('author/information') ? 'active' : '' }}"><a href="{{route('author.information.index')}}"><i class="icon icon-list"></i> <span>đăng ký mua/thuê nhà đất</span></a></li>
        @endif
    </ul>
</div>
<!--sidebar-menu-->
