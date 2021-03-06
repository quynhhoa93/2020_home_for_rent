<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        @if(Auth::user()->role->id == 1)
            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a href="{{route('admin.dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is('admin/category') ? 'active' : '' }}"><a href="{{route('admin.category.index')}}"><i class="icon icon-th-list"></i> <span>tất cả danh mục</span></a></li>

            <li class="{{ Request::is('admin/contact') ? 'active' : '' }}"><a href="{{route('admin.getContact')}}"><i class="icon icon-home"></i> <span>phản ánh của khách hàng</span></a></li>

            <li class="{{ Request::is('admin/blogs') ? 'active' : '' }}"><a href="{{route('admin.blogs.index')}}"><i class="icon icon-home"></i> <span>bài viết blog</span></a></li>

            <li class="{{ Request::is('admin/pending/blogs') ? 'active' : '' }}"><a href="{{route('admin.blog.pending')}}"><i class="icon icon-home"></i> <span>bài viết blog chờ phê duyệt</span></a></li>

            <li class="{{ Request::is('admin/type-asset') ? 'active' : '' }}"><a href="{{route('admin.type-asset.index')}}"><i class="icon icon-list"></i> <span>loại tài sản</span></a></li>

            <li class="{{ Request::is('admin/information') ? 'active' : '' }}"><a href="{{route('admin.information.index')}}"><i class="icon icon-list"></i> <span>thông tin mua/thuê nhà đất</span></a></li>

            <li class="{{ Request::is('admin/comment-blog') ? 'active' : '' }}"><a href="{{route('admin.comment-blog.index')}}"><i class="icon-comments"></i> <span>bình luận blog</span></a></li>

            <li class="{{ Request::is('admin/comment-information') ? 'active' : '' }}"><a href="{{route('admin.comment-information.index')}}"><i class="icon-comments-alt"></i> <span>bình luận mua bán nhà đất</span></a></li>

             <li class="{{ Request::is('admin/pending/information') ? 'active' : '' }}"><a href="{{route('admin.information.pending')}}"><i class="icon icon-home"></i> <span>bài viết mua/thuê nhà đất chờ phê duyệt</span></a></li>

            <li class="{{ Request::is('admin/users') ? 'active' : '' }}"><a href="{{route('admin.users.index')}}"><i class="icon-group"></i> <span>thông tin tài khoản của tất cả user</span></a></li>

            <li class="{{ Request::is('admin/admin-user') ? 'active' : '' }}"><a href="{{route('admin.getAdminUser')}}"><i class="icon-user"></i> <span>thông tin tài khoản</span></a></li>

            @endif


        @if(Auth::user()->role->id === 2 )
            <li class="{{ Request::is('author/dashboard') ? 'active' : '' }}"><a href="{{route('author.dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a></li>

            <li class="{{ Request::is('author/blogs') ? 'active' : '' }}"><a href="{{route('author.blogs.index')}}"><i class="icon icon-home"></i> <span>blog</span></a></li>


            <li class="{{ Request::is('author/information') ? 'active' : '' }}"><a href="{{route('author.information.index')}}"><i class="icon icon-list"></i> <span>đăng ký mua/thuê nhà đất</span></a></li>

            <li class="{{ Request::is('author/users') ? 'active' : '' }}"><a href="{{route('author.users.index')}}"><i class="icon icon-list"></i> <span>thông tin tài khoản</span></a></li>
        @endif
    </ul>
</div>
<!--sidebar-menu-->
