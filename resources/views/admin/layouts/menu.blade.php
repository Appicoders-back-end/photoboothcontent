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
                <a href="#">
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
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
