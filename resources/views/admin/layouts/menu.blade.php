<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="{{ route('admin.dashboard') == url()->current() ? 'active' : '' }}"
                   href="{{route('admin.dashboard')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-caret-square-o-up"></i>
                    <span>Pages</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('admin.home')}}">Homepage</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Content Store</a></li>
                    <li><a href="#">Membership</a></li>
                    <li><a href="#">Coupons</a></li>
                </ul>
            </li>
            <li>
                <a class="{{ route('admin.home') == url()->current() ? 'active' : '' }}"
                   href="{{route('admin.home')}}">
                    <i class="fa fa-home"></i>
                    <span>Home Page</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.categories.index')}}"
                   class="{{ route('admin.categories.index') == url()->current() ? 'active' : '' }}">
                    <i class="fa fa-list-alt"></i>
                    <span>{{__('Categories')}}</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.product.index')}}"
                   class="{{ route('admin.product.index') == url()->current() ? 'active' : '' }}">
                    <i class="fa fa-shopping-cart"></i>
                    <span>{{__('Products')}}</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-caret-square-o-up"></i>
                    <span>Content Store</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('admin.content_images.index')}}">Images</a></li>
                    <li><a href="{{route('admin.content_documents.index')}}">Documents</a></li>
                    <li><a href="{{route('admin.content_videos.index')}}">Videos</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('admin.users.index')}}"
                   class="{{ route('admin.users.index') == url()->current() ?'active':'' }}">
                    <i class="fa fa-user"></i>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.promo.index')}}"
                   class="{{ route('admin.promo.index') == url()->current() ?'active':'' }}">
                    <i class="fa fa-solid fa-bullhorn"></i>
                    <span>{{__('Promo Codes')}}</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.coupons.index')}}"
                   class="{{ route('admin.coupons.index') == url()->current() ?'active':'' }}">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                    <span>{{__('Coupons')}}</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.subscriptions.index')}}"
                   class="{{ route('admin.subscriptions.index') == url()->current() ?'active':'' }}">
                    <i class="fa fa-credit-card"></i>
                    <span>Subscriptions</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.settings')}}"
                   class="{{ route('admin.settings') == url()->current() ?'active':'' }}">
                    <i class="fa fa-gears"></i>
                    <span>{{__('General Settings')}}</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
