@extends('Pages.main')

@section('page_style')
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">

    <style type="text/css">
        th{
            font-size: 10px;
        }
        .btn-table{
            padding: 0 8px;
        }
        .upload-btn-wrapper input[type=file] {
            font-size: 20px;
            position: absolute;
            left: 0;
            bottom: 0;
            opacity: 0;
            cursor: pointer;
        }
        .btn-block-option{
            cursor: pointer;
        }
        .optionnel{
            font-size: 11px;
        }
        .browse {
            background-color: #dcdfe3;
        }
        .browse:hover {
            background-color: #ebeef2;
        }
    </style>
@endsection

@section('content')


@endsection

@section('page_script')
    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/additional-methods.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('assets/js/pages/be_tables_datatables.js')}}"></script>

    <script src="{{asset('assets/js/plugins/sweetalert2/es6-promise.auto.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

@endsection


