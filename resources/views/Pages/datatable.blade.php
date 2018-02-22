@extends('Pages.index')

@section('page_style')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">

@endsection

@section('content')

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <div class="row gutters-tiny invisible" data-toggle="appear">
                <!-- Row #1 -->
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block text-center" href="javascript:void(0)">
                        <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                            <div class="ribbon-box">750</div>
                            <p class="mt-5">
                                <i class="si si-book-open fa-3x text-white-op"></i>
                            </p>
                            <p class="font-w600 text-white">Articles</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block text-center" href="javascript:void(0)">
                        <div class="block-content bg-gd-primary">
                            <p class="mt-5">
                                <i class="si si-plus fa-3x text-white-op"></i>
                            </p>
                            <p class="font-w600 text-white">New Article</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block text-center" href="be_pages_forum_categories.html">
                        <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                            <div class="ribbon-box">16</div>
                            <p class="mt-5">
                                <i class="si si-bubbles fa-3x text-white-op"></i>
                            </p>
                            <p class="font-w600 text-white">Comments</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block text-center" href="be_pages_generic_search.html">
                        <div class="block-content bg-gd-lake">
                            <p class="mt-5">
                                <i class="si si-magnifier fa-3x text-white-op"></i>
                            </p>
                            <p class="font-w600 text-white">Search</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block text-center" href="be_comp_charts.html">
                        <div class="block-content bg-gd-emerald">
                            <p class="mt-5">
                                <i class="si si-bar-chart fa-3x text-white-op"></i>
                            </p>
                            <p class="font-w600 text-white">Statistics</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block text-center" href="javascript:void(0)">
                        <div class="block-content bg-gd-corporate">
                            <p class="mt-5">
                                <i class="si si-settings fa-3x text-white-op"></i>
                            </p>
                            <p class="font-w600 text-white">Settings</p>
                        </div>
                    </a>
                </div>
                <!-- END Row #1 -->
            </div>

            <div class="row gutters-tiny invisible" data-toggle="appear">
                <!-- Row #3 -->
                <div class="col-xl-8 d-flex align-items-stretch">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Dynamic Table <small>Full</small></h3>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th>Name</th>
                                <th class="d-none d-sm-table-cell">Email</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                                <th class="text-center" style="width: 15%;">Profile</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="font-w600">Barbara Scott</td>
                                <td class="d-none d-sm-table-cell">customer1@example.com</td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-danger">Disabled</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="font-w600">Laura Carr</td>
                                <td class="d-none d-sm-table-cell">customer2@example.com</td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-success">VIP</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td class="font-w600">Melissa Rice</td>
                                <td class="d-none d-sm-table-cell">customer3@example.com</td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-info">Business</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td class="font-w600">Susan Day</td>
                                <td class="d-none d-sm-table-cell">customer4@example.com</td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-info">Business</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td class="font-w600">Sara Fields</td>
                                <td class="d-none d-sm-table-cell">customer5@example.com</td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-warning">Trial</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td class="font-w600">Carl Wells</td>
                                <td class="d-none d-sm-table-cell">customer6@example.com</td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-info">Business</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">7</td>
                                <td class="font-w600">Lori Moore</td>
                                <td class="d-none d-sm-table-cell">customer7@example.com</td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-warning">Trial</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">8</td>
                                <td class="font-w600">Jeffrey Shaw</td>
                                <td class="d-none d-sm-table-cell">customer8@example.com</td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-danger">Disabled</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">9</td>
                                <td class="font-w600">Scott Young</td>
                                <td class="d-none d-sm-table-cell">customer9@example.com</td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-danger">Disabled</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">10</td>
                                <td class="font-w600">Sara Fields</td>
                                <td class="d-none d-sm-table-cell">customer10@example.com</td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-warning">Trial</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">11</td>
                                <td class="font-w600">Carol White</td>
                                <td class="d-none d-sm-table-cell">customer11@example.com</td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-danger">Disabled</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">12</td>
                                <td class="font-w600">Brian Cruz</td>
                                <td class="d-none d-sm-table-cell">customer12@example.com</td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-primary">Personal</span>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                                        <i class="fa fa-user"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="block block-transparent bg-primary-dark d-flex align-items-center w-100">
                        <div class="block-content block-content-full">
                            <div class="py-15 px-20 clearfix border-black-op-b">
                                <div class="float-right mt-15 d-none d-sm-block">
                                    <i class="si si-book-open fa-2x text-success"></i>
                                </div>
                                <div class="font-size-h3 font-w600 text-success" data-toggle="countTo" data-speed="1000" data-to="750">0</div>
                                <div class="font-size-sm font-w600 text-uppercase text-success-light">Articles</div>
                            </div>
                            <div class="py-15 px-20 clearfix border-black-op-b">
                                <div class="float-right mt-15 d-none d-sm-block">
                                    <i class="si si-wallet fa-2x text-danger"></i>
                                </div>
                                <div class="font-size-h3 font-w600 text-danger">$<span data-toggle="countTo" data-speed="1000" data-to="980">0</span></div>
                                <div class="font-size-sm font-w600 text-uppercase text-danger-light">Earnings</div>
                            </div>
                            <div class="py-15 px-20 clearfix border-black-op-b">
                                <div class="float-right mt-15 d-none d-sm-block">
                                    <i class="si si-envelope-open fa-2x text-warning"></i>
                                </div>
                                <div class="font-size-h3 font-w600 text-warning" data-toggle="countTo" data-speed="1000" data-to="38">0</div>
                                <div class="font-size-sm font-w600 text-uppercase text-warning-light">Messages</div>
                            </div>
                            <div class="py-15 px-20 clearfix border-black-op-b">
                                <div class="float-right mt-15 d-none d-sm-block">
                                    <i class="si si-users fa-2x text-info"></i>
                                </div>
                                <div class="font-size-h3 font-w600 text-info" data-toggle="countTo" data-speed="1000" data-to="260">0</div>
                                <div class="font-size-sm font-w600 text-uppercase text-info-light">Online</div>
                            </div>
                            <div class="py-15 px-20 clearfix">
                                <div class="float-right mt-15 d-none d-sm-block">
                                    <i class="si si-drop fa-2x text-elegance"></i>
                                </div>
                                <div class="font-size-h3 font-w600 text-elegance" data-toggle="countTo" data-speed="1000" data-to="59">0</div>
                                <div class="font-size-sm font-w600 text-uppercase text-elegance-light">Themes</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Row #3 -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

@endsection

@section('page_script')
    <!-- Page JS Plugins -->
    <script src="{{('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{('assets/js/pages/be_tables_datatables.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/chartjs/Chart.bundle.min.js')}}"></script>
    <!-- Page JS Code -->
    <script src="{{asset('assets/js/pages/be_pages_dashboard.js')}}"></script>
@endsection


