<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <strong class="text-primary">Online Support<br>Platform</strong>
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ $curr_url=='home'?'active':'' }}" href="{{route('home')}}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link {{ $curr_url=='tickets.all'?'active':'' }}" href="{{ route('tickets.all')}}">
                            <i class="ni ni-album-2 text-primary"></i>
                            <span class="nav-link-text">Ticket Management</span>
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</nav>
