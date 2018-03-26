<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Codebase - Bootstrap 4 Admin Template &amp; UI Framework</title>

        <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="Codebase">
        <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="assets/img/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Codebase framework -->
        <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">

    </head>
    <body>
        <!-- Page Container -->
        <div id="page-container" class="sidebar-mini sidebar-o sidebar-inverse side-scroll page-header-fixed page-header-glass page-header-inverse main-content-boxed">

            @include('Layouts.profile')


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
                                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
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
                                    <a class="link-effect font-w700" href="index.html">
                                        <i class="si si-fire text-primary"></i>
                                        <span class="font-size-xl text-dual-primary-dark">code</span><span class="font-size-xl text-primary">base</span>
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
                                <img class="img-avatar img-avatar32" src="assets/img/avatars/avatar15.jpg" alt="">
                            </div>
                            <!-- END Visible only in mini mode -->

                            <!-- Visible only in normal mode -->
                            <div class="sidebar-mini-hidden-b text-center">
                                <a class="img-link" href="be_pages_generic_profile.html">
                                    <img class="img-avatar" src="assets/img/avatars/avatar15.jpg" alt="">
                                </a>
                                <ul class="list-inline mt-10">
                                    <li class="list-inline-item">
                                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="be_pages_generic_profile.html">J. Smith</a>
                                    </li>
                                    <li class="list-inline-item">
                                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                        <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                                            <i class="si si-drop"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="link-effect text-dual-primary-dark" href="op_auth_signin.html">
                                            <i class="si si-logout"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END Visible only in normal mode -->
                        </div>
                        <!-- END Side User -->

                        <!-- Side Navigation -->
                        <div class="content-side content-side-full">
                            <ul class="nav-main">
                                <li class="open">
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboards</span></a>
                                    <ul>
                                        <li>
                                            <a href="be_pages_dashboard.html">Dashboard 1</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_dashboard2.html">Dashboard 2</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_dashboard3.html">Dashboard 3</a>
                                        </li>
                                        <li>
                                            <a class="active" href="be_pages_dashboard4.html">Dashboard 4</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="bd_dashboard.html"><i class="si si-compass"></i><span class="sidebar-mini-hide">Boxed Backend</span></a>
                                </li>
                                <li class="nav-main-heading"><span class="sidebar-mini-visible">UI</span><span class="sidebar-mini-hidden">User Interface</span></li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-puzzle"></i><span class="sidebar-mini-hide">Blocks</span></a>
                                    <ul>
                                        <li>
                                            <a href="be_blocks.html">Styles</a>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Widgets</a>
                                            <ul>
                                                <li>
                                                    <a href="be_blocks_widgets_users.html">Users</a>
                                                </li>
                                                <li>
                                                    <a href="be_blocks_widgets_stats.html">Stats</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="be_blocks_tiles.html">Tiles</a>
                                        </li>
                                        <li>
                                            <a href="be_blocks_draggable.html">Draggable</a>
                                        </li>
                                        <li>
                                            <a href="be_blocks_api.html">API</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-energy"></i><span class="sidebar-mini-hide">Elements</span></a>
                                    <ul>
                                        <li>
                                            <a href="be_ui_grid.html">Grid</a>
                                        </li>
                                        <li>
                                            <a href="be_ui_icons.html">Icons</a>
                                        </li>
                                        <li>
                                            <a href="be_ui_typography.html">Typography</a>
                                        </li>
                                        <li>
                                            <a href="be_ui_activity.html">Activity</a>
                                        </li>
                                        <li>
                                            <a href="be_ui_buttons.html">Buttons</a>
                                        </li>
                                        <li>
                                            <a href="be_ui_navigation.html">Navigation</a>
                                        </li>
                                        <li>
                                            <a href="be_ui_tabs.html">Tabs</a>
                                        </li>
                                        <li>
                                            <a href="be_ui_modals_tooltips.html">Modals &amp; Tooltips</a>
                                        </li>
                                        <li>
                                            <a href="be_ui_images.html">Images</a>
                                        </li>
                                        <li>
                                            <a href="be_ui_animations.html">Animations</a>
                                        </li>
                                        <li>
                                            <a href="be_ui_ribbons.html">Ribbons</a>
                                        </li>
                                        <li>
                                            <a href="be_ui_timeline.html">Timeline</a>
                                        </li>
                                        <li>
                                            <a href="be_ui_color_themes.html">Color Themes</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-layers"></i><span class="sidebar-mini-hide">Tables</span></a>
                                    <ul>
                                        <li>
                                            <a href="be_tables_styles.html">Styles</a>
                                        </li>
                                        <li>
                                            <a href="be_tables_responsive.html">Responsive</a>
                                        </li>
                                        <li>
                                            <a href="be_tables_helpers.html">Helpers</a>
                                        </li>
                                        <li>
                                            <a href="be_tables_pricing.html">Pricing</a>
                                        </li>
                                        <li>
                                            <a href="be_tables_datatables.html">DataTables</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-note"></i><span class="sidebar-mini-hide">Forms</span></a>
                                    <ul>
                                        <li>
                                            <a href="be_forms_elements_bootstrap.html">Bootstrap Elements</a>
                                        </li>
                                        <li>
                                            <a href="be_forms_elements_material.html">Material Elements</a>
                                        </li>
                                        <li>
                                            <a href="be_forms_css_inputs.html">CSS Inputs</a>
                                        </li>
                                        <li>
                                            <a href="be_forms_plugins.html">Plugins</a>
                                        </li>
                                        <li>
                                            <a href="be_forms_editors.html">Editors</a>
                                        </li>
                                        <li>
                                            <a href="be_forms_validation.html">Validation</a>
                                        </li>
                                        <li>
                                            <a href="be_forms_wizard.html">Wizard</a>
                                        </li>
                                        <li>
                                            <a href="be_forms_premade.html">Pre-made</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-main-heading"><span class="sidebar-mini-visible">BD</span><span class="sidebar-mini-hidden">Build</span></li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-vector"></i><span class="sidebar-mini-hide">Layout</span></a>
                                    <ul>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">General</a>
                                            <ul>
                                                <li>
                                                    <a href="be_layout_default.html">Default</a>
                                                </li>
                                                <li>
                                                    <a href="be_layout_flipped.html">Flipped</a>
                                                </li>
                                                <li>
                                                    <a href="be_layout_native_scrolling.html">Native Scrolling</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Header</a>
                                            <ul>
                                                <li>
                                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">Static</a>
                                                    <ul>
                                                        <li>
                                                            <a href="be_layout_header_modern.html">Modern</a>
                                                        </li>
                                                        <li>
                                                            <a href="be_layout_header_classic.html">Classic</a>
                                                        </li>
                                                        <li>
                                                            <a href="be_layout_header_classic_inverse.html">Classic Inverse</a>
                                                        </li>
                                                        <li>
                                                            <a href="be_layout_header_glass.html">Glass</a>
                                                        </li>
                                                        <li>
                                                            <a href="be_layout_header_glass_inverse.html">Glass Inverse</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">Fixed</a>
                                                    <ul>
                                                        <li>
                                                            <a href="be_layout_header_fixed_modern.html">Modern</a>
                                                        </li>
                                                        <li>
                                                            <a href="be_layout_header_fixed_classic.html">Classic</a>
                                                        </li>
                                                        <li>
                                                            <a href="be_layout_header_fixed_classic_inverse.html">Classic Inverse</a>
                                                        </li>
                                                        <li>
                                                            <a href="be_layout_header_fixed_glass.html">Glass</a>
                                                        </li>
                                                        <li>
                                                            <a href="be_layout_header_fixed_glass_inverse.html">Glass Inverse</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sidebar</a>
                                            <ul>
                                                <li>
                                                    <a href="be_layout_sidebar_inverse.html">Inverse</a>
                                                </li>
                                                <li>
                                                    <a href="be_layout_sidebar_hidden.html">Hidden</a>
                                                </li>
                                                <li>
                                                    <a href="be_layout_sidebar_mini.html">Mini</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Side Overlay</a>
                                            <ul>
                                                <li>
                                                    <a href="be_layout_side_overlay_visible.html">Visible</a>
                                                </li>
                                                <li>
                                                    <a href="be_layout_side_overlay_hoverable.html">Hoverable</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Main Content</a>
                                            <ul>
                                                <li>
                                                    <a href="be_layout_content_boxed.html">Boxed</a>
                                                </li>
                                                <li>
                                                    <a href="be_layout_content_narrow.html">Narrow</a>
                                                </li>
                                                <li>
                                                    <a href="be_layout_content_full_width.html">Full Width</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Hero</a>
                                            <ul>
                                                <li>
                                                    <a href="be_layout_hero_color.html">Color</a>
                                                </li>
                                                <li>
                                                    <a href="be_layout_hero_image.html">Image</a>
                                                </li>
                                                <li>
                                                    <a href="be_layout_hero_video.html">Video</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="be_layout_api.html">API</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-trophy"></i><span class="sidebar-mini-hide">Components</span></a>
                                    <ul>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">Main Menu</span></a>
                                            <ul>
                                                <li>
                                                    <a href="#">Link 1-1</a>
                                                </li>
                                                <li>
                                                    <a href="#">Link 1-2</a>
                                                </li>
                                                <li>
                                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 2</a>
                                                    <ul>
                                                        <li>
                                                            <a href="#">Link 2-1</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Link 2-2</a>
                                                        </li>
                                                        <li>
                                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Sub Level 3</a>
                                                            <ul>
                                                                <li>
                                                                    <a href="#">Link 3-1</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Link 3-2</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Chat</a>
                                            <ul>
                                                <li>
                                                    <a href="be_comp_chat_multiple.html">Multiple</a>
                                                </li>
                                                <li>
                                                    <a href="be_comp_chat_single.html">Single</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="be_comp_charts.html">Charts</a>
                                        </li>
                                        <li>
                                            <a href="be_comp_gallery.html">Gallery</a>
                                        </li>
                                        <li>
                                            <a href="be_comp_sliders.html">Sliders</a>
                                        </li>
                                        <li>
                                            <a href="be_comp_scrolling.html">Scrolling</a>
                                        </li>
                                        <li>
                                            <a href="be_comp_rating.html">Rating</a>
                                        </li>
                                        <li>
                                            <a href="be_comp_filtering.html">Filtering</a>
                                        </li>
                                        <li>
                                            <a href="be_comp_appear.html">Appear</a>
                                        </li>
                                        <li>
                                            <a href="be_comp_countto.html">CountTo</a>
                                        </li>
                                        <li>
                                            <a href="be_comp_calendar.html">Calendar</a>
                                        </li>
                                        <li>
                                            <a href="be_comp_image_cropper.html">Image Cropper</a>
                                        </li>
                                        <li>
                                            <a href="be_comp_maps_google.html">Google Maps</a>
                                        </li>
                                        <li>
                                            <a href="be_comp_maps_vector.html">Vector Maps</a>
                                        </li>
                                        <li>
                                            <a href="be_comp_syntax_highlighting.html">Syntax Highlighting</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-main-heading"><span class="sidebar-mini-visible">PG</span><span class="sidebar-mini-hidden">Pages</span></li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-globe-alt"></i><span class="sidebar-mini-hide">Generic</span></a>
                                    <ul>
                                        <li>
                                            <a href="be_pages_generic_blank.html">Blank</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_generic_blank_block.html">Blank (Block)</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_generic_blank_breadcrumb.html">Blank (Breadcrumb)</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_generic_search.html">Search</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_generic_profile.html">Profile</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_generic_inbox.html">Inbox</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_generic_invoice.html">Invoice</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_generic_faq.html">FAQ</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_generic_blog.html">Blog</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_generic_story.html">Story</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_generic_project_list.html">Project List</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_generic_project.html">Project</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_generic_upgrade_plan.html">Upgrade Plan</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_generic_team.html">Team</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_generic_contact.html">Contact</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_generic_todo.html">Todo</a>
                                        </li>
                                        <li>
                                            <a href="op_coming_soon.html">Coming Soon</a>
                                        </li>
                                        <li>
                                            <a href="op_maintenance.html">Maintenance</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-flag"></i><span class="sidebar-mini-hide">Error</span></a>
                                    <ul>
                                        <li>
                                            <a href="be_pages_error_all.html">All</a>
                                        </li>
                                        <li>
                                            <a href="op_error_400.html">400</a>
                                        </li>
                                        <li>
                                            <a href="op_error_401.html">401</a>
                                        </li>
                                        <li>
                                            <a href="op_error_403.html">403</a>
                                        </li>
                                        <li>
                                            <a href="op_error_404.html">404</a>
                                        </li>
                                        <li>
                                            <a href="op_error_500.html">500</a>
                                        </li>
                                        <li>
                                            <a href="op_error_503.html">503</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-lock"></i><span class="sidebar-mini-hide">Authentication</span></a>
                                    <ul>
                                        <li>
                                            <a href="be_pages_auth_all.html">All</a>
                                        </li>
                                        <li>
                                            <a href="op_auth_signin.html">Sign In</a>
                                        </li>
                                        <li>
                                            <a href="op_auth_signin2.html">Sign In 2</a>
                                        </li>
                                        <li>
                                            <a href="op_auth_signin3.html">Sign In 3</a>
                                        </li>
                                        <li>
                                            <a href="op_auth_signup.html">Sign Up</a>
                                        </li>
                                        <li>
                                            <a href="op_auth_signup2.html">Sign Up 2</a>
                                        </li>
                                        <li>
                                            <a href="op_auth_signup3.html">Sign Up 3</a>
                                        </li>
                                        <li>
                                            <a href="op_auth_lock.html">Lock Screen</a>
                                        </li>
                                        <li>
                                            <a href="op_auth_lock2.html">Lock Screen 2</a>
                                        </li>
                                        <li>
                                            <a href="op_auth_lock3.html">Lock Screen 3</a>
                                        </li>
                                        <li>
                                            <a href="op_auth_reminder.html">Pass Reminder</a>
                                        </li>
                                        <li>
                                            <a href="op_auth_reminder2.html">Pass Reminder 2</a>
                                        </li>
                                        <li>
                                            <a href="op_auth_reminder3.html">Pass Reminder 3</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-handbag"></i><span class="sidebar-mini-hide">e-Commerce</span></a>
                                    <ul>
                                        <li>
                                            <a href="be_pages_ecom_dashboard.html">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_ecom_orders.html">Orders</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_ecom_order.html">Order</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_ecom_products.html">Products</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_ecom_product_edit.html">Product Edit</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_ecom_customer.html">Customer</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bubbles"></i><span class="sidebar-mini-hide">Forum</span></a>
                                    <ul>
                                        <li>
                                            <a href="be_pages_forum_categories.html">Categories</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_forum_topics.html">Topics</a>
                                        </li>
                                        <li>
                                            <a href="be_pages_forum_discussion.html">Discussion</a>
                                        </li>
                                    </ul>
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

                        <!-- Open Search Section -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="header_search_on">
                            <i class="fa fa-search"></i>
                        </button>
                        <!-- END Open Search Section -->

                        <!-- Layout Options (used just for demonstration) -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-options-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-wrench"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="page-header-options-dropdown">
                                <h6 class="dropdown-header">Header</h6>
                                <button type="button" class="btn btn-sm btn-block btn-alt-secondary" data-toggle="layout" data-action="header_fixed_toggle">Fixed Mode</button>
                                <button type="button" class="btn btn-sm btn-block btn-alt-secondary d-none d-lg-block mb-10" data-toggle="layout" data-action="header_style_classic">Classic Style</button>
                                <div class="d-none d-xl-block">
                                    <h6 class="dropdown-header">Main Content</h6>
                                    <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="content_layout_toggle">Toggle Layout</button>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="be_layout_api.html">
                                    <i class="si si-chemistry"></i> All Options (API)
                                </a>
                            </div>
                        </div>
                        <!-- END Layout Options -->

                        <!-- Color Themes (used just for demonstration) -->
                        <!-- Themes functionality initialized in Codebase() -> uiHandleTheme() -->
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-paint-brush"></i>
                            </button>
                            <div class="dropdown-menu min-width-150" aria-labelledby="page-header-themes-dropdown">
                                <h6 class="dropdown-header text-center">Color Themes</h6>
                                <div class="row no-gutters text-center mb-5">
                                    <div class="col-4 mb-5">
                                        <a class="text-default" data-toggle="theme" data-theme="default" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-4 mb-5">
                                        <a class="text-elegance" data-toggle="theme" data-theme="assets/css/themes/elegance.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-4 mb-5">
                                        <a class="text-pulse" data-toggle="theme" data-theme="assets/css/themes/pulse.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-4 mb-5">
                                        <a class="text-flat" data-toggle="theme" data-theme="assets/css/themes/flat.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-4 mb-5">
                                        <a class="text-corporate" data-toggle="theme" data-theme="assets/css/themes/corporate.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                    <div class="col-4 mb-5">
                                        <a class="text-earth" data-toggle="theme" data-theme="assets/css/themes/earth.min.css" href="javascript:void(0)">
                                            <i class="fa fa-2x fa-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_toggle">Sidebar Style</button>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="be_ui_color_themes.html">
                                    <i class="fa fa-paint-brush"></i> All Color Themes
                                </a>
                            </div>
                        </div>
                        <!-- END Color Themes -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="content-header-section">
                        <!-- User Dropdown -->
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                J. Smith<i class="fa fa-angle-down ml-5"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                                <a class="dropdown-item" href="be_pages_generic_profile.html">
                                    <i class="si si-user mr-5"></i> Profile
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">
                                    <span><i class="si si-envelope-open mr-5"></i> Inbox</span>
                                    <span class="badge badge-primary">3</span>
                                </a>
                                <a class="dropdown-item" href="be_pages_generic_invoice.html">
                                    <i class="si si-note mr-5"></i> Invoices
                                </a>
                                <div class="dropdown-divider"></div>

                                <!-- Toggle Side Overlay -->
                                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                    <i class="si si-wrench mr-5"></i> Settings
                                </a>
                                <!-- END Side Overlay -->

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="op_auth_signin.html">
                                    <i class="si si-logout mr-5"></i> Sign Out
                                </a>
                            </div>
                        </div>
                        <!-- END User Dropdown -->

                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="side_overlay_toggle">
                            <i class="fa fa-tasks"></i>
                        </button>
                        <!-- END Toggle Side Overlay -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header">
                    <div class="content-header content-header-fullrow">
                        <form action="be_pages_generic_search.html" method="post">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <!-- Close Search Section -->
                                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                    <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <!-- END Close Search Section -->
                                </span>
                                <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header content-header-fullrow text-center">
                        <div class="content-header-item">
                            <i class="fa fa-sun-o fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Hero -->
                <div class="bg-image bg-image-bottom" style="background-image: url('assets/img/photos/photo34@2x.jpg');">
                    <div class="bg-primary-dark-op">
                        <div class="content content-top text-center overflow-hidden">
                            <div class="pt-50 pb-20">
                                <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Dashboard</h1>
                                <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Welcome to your custom panel!</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                <div class="content">
                    <div class="row invisible" data-toggle="appear">
                        <!-- Row #1 -->
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-pop text-right bg-primary" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-bar-chart fa-3x text-primary-light"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-white" data-toggle="countTo" data-speed="1000" data-to="8900">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-white-op">Sales</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-pop text-right bg-earth" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-trophy fa-3x text-earth-light"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-white">$<span data-toggle="countTo" data-speed="1000" data-to="2600">0</span></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-white-op">Earnings</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-pop text-right bg-elegance" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-envelope-letter fa-3x text-elegance-light"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-white" data-toggle="countTo" data-speed="1000" data-to="260">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-white-op">Messages</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-pop text-right bg-corporate" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix border-black-op-b border-3x">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-fire fa-3x text-corporate-light"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-white" data-toggle="countTo" data-speed="1000" data-to="4252">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-white-op">Online</div>
                                </div>
                            </a>
                        </div>
                        <!-- END Row #1 -->
                    </div>
                    <div class="row invisible" data-toggle="appear">
                        <!-- Row #2 -->
                        <div class="col-md-6">
                            <div class="block">
                                <div class="block-header bg-primary-lighter">
                                    <h3 class="block-title">
                                        Sales <small>This week</small>
                                    </h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-wrench"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="pull-all pt-30">
                                        <!-- Lines Chart Container -->
                                        <canvas class="js-chartjs-dashboard-lines"></canvas>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <div class="row items-push text-center">
                                        <div class="col-12 col-sm-4">
                                            <div class="font-w600 text-success">
                                                <i class="fa fa-caret-up"></i> +6%
                                            </div>
                                            <div class="font-size-h4 font-w600">35.2</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Average</div>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <div class="font-w600 text-success">
                                                <i class="fa fa-caret-up"></i> +14%
                                            </div>
                                            <div class="font-size-h4 font-w600">960</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">This Month</div>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <div class="font-w600 text-danger">
                                                <i class="fa fa-caret-down"></i> -1%
                                            </div>
                                            <div class="font-size-h4 font-w600">263</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">This Week</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block">
                                <div class="block-header bg-earth-lighter">
                                    <h3 class="block-title">
                                        Earnings <small>This week</small>
                                    </h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-wrench"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="pull-all pt-30">
                                        <!-- Lines Chart Container -->
                                        <canvas class="js-chartjs-dashboard-lines2"></canvas>
                                    </div>
                                </div>
                                <div class="block-content bg-white">
                                    <div class="row items-push text-center">
                                        <div class="col-6 col-sm-4">
                                            <div class="font-w600 text-success">
                                                <i class="fa fa-caret-up"></i> +8%
                                            </div>
                                            <div class="font-size-h4 font-w600">$ 8,200</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">This Month</div>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <div class="font-w600 text-danger">
                                                <i class="fa fa-caret-down"></i> -9%
                                            </div>
                                            <div class="font-size-h4 font-w600">$ 1,318</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">This Week</div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="font-w600 text-success">
                                                <i class="fa fa-caret-up"></i> +39%
                                            </div>
                                            <div class="font-size-h4 font-w600">$ 4,850</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Balance</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Row #2 -->
                    </div>
                    <div class="row invisible" data-toggle="appear">
                        <!-- Row #3 -->
                        <div class="col-md-6">
                            <a class="block" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <i class="si si-game-controller fa-2x text-body-bg-dark"></i>
                                    <div class="row pt-10 pb-30 text-center">
                                        <div class="col-6 border-r">
                                            <div class="font-size-h3 font-w600">190</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Games</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="font-size-h3 font-w600">870</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Subscriptions</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a class="block" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="text-right">
                                        <i class="si si-wallet fa-2x text-body-bg-dark"></i>
                                    </div>
                                    <div class="row pt-10 pb-30 text-center">
                                        <div class="col-6 border-r">
                                            <div class="font-size-h3 font-w600">$840</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Today</div>
                                        </div>
                                        <div class="col-6">
                                            <div class="font-size-h3 font-w600">$4,490</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Last Week</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- END Row #3 -->
                    </div>
                    <div class="row invisible" data-toggle="appear">
                        <!-- Row #4 -->
                        <div class="col-md-4">
                            <div class="block">
                                <div class="block-content block-content-full">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <i class="si si-earphones fa-3x text-success"></i>
                                        </div>
                                        <div class="font-size-h4 font-w600">4.8k Songs</div>
                                        <div class="text-muted">Your library is growing!</div>
                                        <div class="pt-20">
                                            <a class="btn btn-rounded btn-alt-success" href="javascript:void(0)">
                                                <i class="fa fa-shopping-bag mr-5"></i> Get more
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="block">
                                <div class="block-content block-content-full">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <i class="si si-diamond fa-3x text-warning"></i>
                                        </div>
                                        <div class="font-size-h4 font-w600">7580 Points</div>
                                        <div class="text-muted">Nice, you are doing great!</div>
                                        <div class="pt-20">
                                            <a class="btn btn-rounded btn-alt-warning" href="javascript:void(0)">
                                                <i class="fa fa-check mr-5"></i> Redeem them now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="block">
                                <div class="block-content block-content-full">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <i class="si si-grid fa-3x text-info"></i>
                                        </div>
                                        <div class="font-size-h4 font-w600">2 Grid Servers</div>
                                        <div class="text-muted">Currently active.</div>
                                        <div class="pt-20">
                                            <a class="btn btn-rounded btn-alt-info" href="javascript:void(0)">
                                                <i class="fa fa-plus mr-5"></i> Add More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Row #4 -->
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                        Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://goo.gl/po9Usv" target="_blank">Codebase 1.3</a> &copy; <span class="js-year-copy">2017</span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="assets/js/core/jquery.appear.min.js"></script>
        <script src="assets/js/core/jquery.countTo.min.js"></script>
        <script src="assets/js/core/js.cookie.min.js"></script>
        <script src="assets/js/codebase.js"></script>

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/chartjs/Chart.bundle.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_pages_dashboard.js"></script>
    </body>
</html>