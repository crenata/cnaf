<div class="site-menubar">
    <ul class="site-menu">
        <li class="site-menu-item {{ Request::is('admin') ? 'active' : '' }}">
            <a class="animsition-link" href="{{ route('admin.home') }}">
                <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Dashboard</span>
            </a>
        </li>

        <li class="site-menu-item has-sub {{ Request::is('admin/vendor', 'admin/brand', 'admin/item') ? 'active' : '' }}">
            <a href="javascript:void(0)">
                <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                <span class="site-menu-title">Master</span>
                <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
                <li class="site-menu-item {{ Request::is('admin/vendor') ? 'active' : '' }}">
                    <a class="animsition-link" href="{{ route('vendor.index') }}">
                        <span class="site-menu-title">Vendor</span>
                    </a>
                </li>

                <li class="site-menu-item {{ Request::is('admin/brand') ? 'active' : '' }}">
                    <a class="animsition-link" href="{{ route('brand.index') }}">
                        <span class="site-menu-title">Brand</span>
                    </a>
                </li>

                <li class="site-menu-item {{ Request::is('admin/item') ? 'active' : '' }}">
                    <a class="animsition-link" href="{{ route('item.index') }}">
                        <span class="site-menu-title">Items</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="site-menu-item has-sub {{ Request::is('admin/carregion', 'admin/carbrand', 'admin/cartype') ? 'active' : '' }}">
            <a href="javascript:void(0)">
                <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                <span class="site-menu-title">Car</span>
                <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
                <li class="site-menu-item {{ Request::is('admin/carregion') ? 'active' : '' }}">
                    <a class="animsition-link" href="{{ route('carregion.index') }}">
                        <span class="site-menu-title">Car Region</span>
                    </a>
                </li>

                <li class="site-menu-item {{ Request::is('admin/carbrand') ? 'active' : '' }}">
                    <a class="animsition-link" href="{{ route('carbrand.index') }}">
                        <span class="site-menu-title">Car Brand</span>
                    </a>
                </li>

                <li class="site-menu-item {{ Request::is('admin/cartype') ? 'active' : '' }}">
                    <a class="animsition-link" href="{{ route('item.index') }}">
                        <span class="site-menu-title">Car Type</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="site-menu-item {{ Request::is('admin/blog') ? 'active' : '' }}">
            <a class="animsition-link" href="{{ route('blog.index') }}">
                <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Blogs</span>
            </a>
        </li>
    </ul>
</div>

<div class="site-gridmenu">
    <div>
        <div>
            <ul>
                <li>
                    <a href="apps/mailbox/mailbox.html">
                        <i class="icon md-email"></i>
                        <span>Mailbox</span>
                    </a>
                </li>
                <li>
                    <a href="apps/calendar/calendar.html">
                        <i class="icon md-calendar"></i>
                        <span>Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="apps/contacts/contacts.html">
                        <i class="icon md-account"></i>
                        <span>Contacts</span>
                    </a>
                </li>
                <li>
                    <a href="apps/media/overview.html">
                        <i class="icon md-videocam"></i>
                        <span>Media</span>
                    </a>
                </li>
                <li>
                    <a href="apps/documents/categories.html">
                        <i class="icon md-receipt"></i>
                        <span>Documents</span>
                    </a>
                </li>
                <li>
                    <a href="apps/projects/projects.html">
                        <i class="icon md-image"></i>
                        <span>Project</span>
                    </a>
                </li>
                <li>
                    <a href="apps/forum/forum.html">
                        <i class="icon md-comments"></i>
                        <span>Forum</span>
                    </a>
                </li>
                <li>
                    <a href="index.html">
                        <i class="icon md-view-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>