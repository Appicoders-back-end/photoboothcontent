<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="{{ route('admin.dashboard') == url()->current() ?'active':'' }}" href="{{route('admin.dashboard')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.categories.index')}}">
                    <i class="fa fa-gears"></i>
                    <span>{{__('Categories')}}</span>
                </a>
            </li>
            {{--<li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-comments-o"></i>
                    <span>Chat Room</span>
                </a>
                <ul class="sub">
                    <li><a  href="lobby.html">Lobby</a></li>
                    <li><a  href="chat_room.html"> Chat Room</a></li>
                </ul>
            </li> --}}
            <li>
                <a href="{{route('admin.users.index')}}">
                    <i class="fa fa-user"></i>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-tags"></i>
                    <span>Leads</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-gift"></i>
                    <span>Promo Codes</span>
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a href="{{ route('admin.promo.index') }}">
                                <i class="fa fa-gift"></i>
                                <span>Promo Codes</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.promo.create') }}">
                                <i class="fa fa-gift"></i>
                                <span>Create Promo</span>
                            </a>
                        </li>
                    </ul>
                </a>
            </li>
            <li>
                <a href="{{route('admin.settings')}}">
                    <i class="fa fa-gears"></i>
                    <span>{{__('General Settings')}}</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
