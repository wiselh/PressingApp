<!-- Sidebar -->
<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="content-header content-header-fullrow px-15">
                <!-- Mini Mode -->
                <div class="content-header-section sidebar-mini-visible-b">
                    <!-- Logo -->
                    <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                        <span class="text-dual-primary-dark">P</span><span class="text-primary">S</span>
                    </span>
                    <!-- END Logo -->
                </div>
                <!-- END Mini Mode -->

                <!-- Normal Mode -->
                <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <!-- END Close Sidebar -->

                    <!-- Logo -->
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="/">
                            <i class="si si-fire text-primary"></i>
                            <span class="font-size-xl text-dual-primary-dark">Press</span><span class="font-size-xl text-primary">ing</span>
                        </a>
                    </div>
                    <!-- END Logo -->
                </div>
                <!-- END Normal Mode -->
            </div>
            <!-- END Side Header -->

            <!-- Side User -->
            <div class="content-side content-side-full content-side-user px-10 align-parent">
                <!-- Visible only in mini mode -->
                <div class="sidebar-mini-visible-b align-v animated fadeIn">
                    <img class="img-avatar img-avatar32" src="{{ asset(Auth::user()->picture)  }}" alt="">
                </div>
                <!-- END Visible only in mini mode -->

                <!-- Visible only in normal mode -->
                <div class="sidebar-mini-hidden-b text-center">
                    <a class="img-link" href="">
                        <img class="img-avatar" src="{{ asset(Auth::user()->picture) }}" alt="">
                    </a>
                    <ul class="list-inline mt-10">
                        <li class="list-inline-item">
                            <?php $name = explode(' ', Auth::user()->fullname, 2); ?>
                            <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="">{{ $name[0] }}</a>
                        </li>
                        <li class="list-inline-item">
                            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                            <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                                <i class="si si-drop"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="si si-logout"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li>
                        <a href="/commande/add"><i class="si si-note"></i><span class="sidebar-mini-hide">Commande</span></a>
                    </li>
                    <li class="open">
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Gestion</span></a>
                        <ul>
                            <li>
                                <a href="/commandes">Commandes</a>
                            </li>
                            <li>
                                <a href="/clients">Clients</a>
                            </li>
                            <li>
                                <a href="/services">Services</a>
                            </li>
                            <li>
                                <a class="active" href="/categories">Categories</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-visible">IU</span><span class="sidebar-mini-hidden">Interface d'Utilisateur</span></li>
                    <li>
                        <a href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle"><i class="si si-user"></i><span class="sidebar-mini-hide">Profile</span></a>
                    </li>
                    <li>
                        <a href="/societe"><i class="si si-energy"></i><span class="sidebar-mini-hide">Societe</span></a>
                    </li>
                    <li>
                        <a href="/users"><i class="si si-users "></i><span class="sidebar-mini-hide">Utilisateurs</span></a>
                    </li>
                    <li>
                        <a href="/statistics"><i class="si si-chart"></i><span class="sidebar-mini-hide">Statistics</span></a>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>
<!-- END Sidebar -->

<!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="content-header-section">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
            <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-navicon"></i>
            </button>
            <!-- END Toggle Sidebar -->

        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="content-header-section">
            <!-- User Dropdown -->
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->fullname }}<i class="fa fa-angle-down ml-5"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                        <i class="si si-user mr-5"></i> Profile
                    </a>
                    <a class="dropdown-item" href="/societe">
                        <i class="si si-note mr-5"></i> Profile de la Societe
                    </a>
                    <div class="dropdown-divider"></div>

                    <!-- Toggle Side Overlay -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <a class="dropdown-item" href="/users">
                        <i class="si si-wrench mr-5"></i> Gestion d'Utilisateurs
                    </a>
                    <!-- END Side Overlay -->

                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="si si-logout mr-5"></i> Deconnecter
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            <!-- END User Dropdown -->
            <!-- END Toggle Side Overlay -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->
</header>
<!-- END Header -->