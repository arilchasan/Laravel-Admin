
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Admin</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="" href="{{ route('dashboard/page') }}">Admin Dashboard</a></li>
                        <li><a href="{{ route('dashboard/data') }}">Data</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href='dashboard/data'><i class="la la-dashboard"></i> <span> Data</span></a>
                    
                </li>

                
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->