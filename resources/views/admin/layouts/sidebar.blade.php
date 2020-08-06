<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        @if(Auth::user()->role->id == 1)
            <?php echo Auth::user()->role->id ?>
            <li><a href="{{route('admin.dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a></li>

            <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>danh mục</span> <span
                            class="label label-important">3</span></a>
                <ul>
                    <li><a href="{{route('admin.category.index')}}">tất cả danh mục</a></li>
                    <li><a href="{{route('admin.category.create')}}">thêm danh mục</a></li>
                </ul>
            </li>

            <li><a href="{{route('admin.getContact')}}"><i class="icon icon-home"></i> <span>phản ánh của khách hàng</span></a></li>
        @endif


        @if(Auth::user()->role->id === 2 )
            <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a></li>
            <li><a href="charts.html"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a></li>
        @endif
    </ul>
</div>
<!--sidebar-menu-->