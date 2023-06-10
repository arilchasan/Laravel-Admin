
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Admin</span>
                </li>
                <li class="submenu">
                    <li><a href="{{ route('dashboard/page') }}"><i class="la la-dashboard"></i> <span> Dashboard</span></a></li>
                </li>
                <li class="submenu">
                    <li><a href='/dashboard/destinasi/all'><i class="la la-bar-chart"></i> <span> Destinasi</span></a></li>    
                </li>
                <li class="submenu">
                    <li><a href='/dashboard/kuliner/all'><i class="la la-cutlery"></i> <span> Kuliner</span></a></li>
                {{-- <li class="submenu">
                    <li><a href='/dashboard/peta/all'><i class="la la-map"></i> <span> Peta</span></a></li>    
                </li> --}}
                <li class="submenu">
                    <li><a href='/dashboard/userlogin/all'><i class="la la-user"></i> <span> User Login</span></a></li>    
                </li>
                <li class="submenu">
                    <li><a href="/dashboard/wishlist/all"><i class="la la-wishlist"></i> <span>Wishlist</span></a></li>
                </li>

                
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->