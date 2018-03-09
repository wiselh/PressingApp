@extends('Pages.main')

@section('page_style')


@endsection

@section('content')

    <!-- Bootstrap Forms Validation -->
    {{--<h2 class="content-heading">Bootstrap Forms</h2>--}}

    <div class="block" style="padding: 10px">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <!-- Default Pills -->
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Default Style</h3>
                    </div>
                    <div class="block-content ">
                        <div class="container">
                            <div class="text-center">
                                <button type="button" class="btn btn-alt-info mr-5 mb-5">
                                    <i class="fa fa-download mr-5"></i>Imprimer le Ticket
                                </button>
                                <button type="button" class="btn btn-alt-info mr-5 mb-5">
                                    <i class="fa fa-download mr-5"></i>Imprimer le Code Bar
                                </button>
                                <button type="button" class="btn btn-alt-info mr-5 mb-5">
                                    <i class="fa fa-download mr-5"></i>Imprimer la Facture
                                </button>
                            </div>
                        </div>
                        <div class="container">
                            <div class="text-center">
                                <button type="button" class="btn btn-alt-secondary min-width-125">
                                    <i class="fa fa-chevron-left fa-1x"></i> Retour
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Default Pills -->
            </div>

        </div>

    </div>
    <!-- Bootstrap Forms Validation -->

@endsection

@section('page_script')
    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/additional-methods.min.js')}}"></script>
@endsection


