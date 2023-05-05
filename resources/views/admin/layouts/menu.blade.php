<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            {{--<li>
                <a class="{{ route('admin.dashboard') == url()->current() ? 'active' : '' }}"
                   href="{{route('admin.dashboard')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>--}}
            <li>
                <a href="{{route('admin.users.index')}}"
                   class="{{ route('admin.users.index') == url()->current() ?'active':'' }}">
                    <i class="fa fa-user"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-caret-square-o-up"></i>
                    <span>Pages</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('admin.home')}}">Homepage</a></li>
                    <li><a href="{{route('admin.about')}}">About Us</a></li>
                    <li><a href="{{route('admin.content')}}">Content Store</a></li>
                    <li><a href="{{route('admin.membership')}}">Membership</a></li>
                    <li><a href="{{route('admin.coupon')}}">Coupons</a></li>
                    <li><a href="{{route('admin.shop')}}">Shop</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('admin.categories.index')}}"
                   class="{{ route('admin.categories.index') == url()->current() ? 'active' : '' }}">
                    <i class="fa fa-list-alt"></i>
                    <span>{{__('Categories')}}</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-caret-square-o-up"></i>
                    <span>Content Store</span>
                </a>
                <ul class="sub">
                    <li class="{{ route('admin.content_images.index') == url()->current() ? 'active' : '' }}"><a href="{{route('admin.content_images.index')}}"     >Images</a></li>
                    <li class="{{ route('admin.content_documents.index') == url()->current() ? 'active' : '' }}"><a href="{{route('admin.content_documents.index')}}"  >Documents</a></li>
                    <li class="{{ route('admin.content_videos.index') == url()->current() ? 'active' : '' }}"><a href="{{route('admin.content_videos.index')}}"     >Videos</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route('admin.product.index')}}"
                   class="{{ route('admin.product.index') == url()->current() ? 'active' : '' }}">
                    <i class="fa fa-shopping-cart"></i>
                    <span>{{__('Products')}}</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.orders.index')}}"
                   class="{{ route('admin.orders.index') == url()->current() ? 'active' : '' }}">
{{--                    <i class="fa fa-shopping-cart"></i>--}}
                    <i class="fa fa-tags"></i>
                    <span>{{__('Orders')}}</span>
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
            <li>
                <a href="{{route('admin.inquires')}}"
                   class="{{ route('admin.inquires') == url()->current() ?'active':'' }}">
                    <i class="fa fa-phone"></i>
                    <span>{{__('User Inquiry')}}</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.change_password')}}"
                   class="{{ route('admin.change_password') == url()->current() ?'active':'' }}">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <span>{{__('Change Password')}}</span>
                </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
