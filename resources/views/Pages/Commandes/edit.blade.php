@extends('Pages.main')

@section('page_style')
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">
    <style>
        .btn-table{
            padding: 0 8px;
        }
    </style>

@endsection

@section('content')
    <!-- les pieces -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Les information du commande</h3>
        </div>
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-md-2 col-sm-6 text-center">
                    <h5 class="font-w700"><small>Nom du Client : <br> {{$commande->client->client_name}}</small></h5>
                </div>
                <div class="col-md-2 col-sm-6 text-center">
                    <h5 class="font-w700"><small>Date de Retrait : {{ date('d-m-Y', strtotime($commande->commande_date_retrait))}}</small></h5>
                </div>
                <div class="col-md-2 col-sm-6 text-center">
                    <h5 class="font-w700"><small>Montant Total : <br> <span  class="badge badge-info">{{$commande->commande_montant }}DH</span></small></h5>
                </div>
                <div class="col-md-2 col-sm-6 text-center">
                    <h5 class="font-w700"><small>Montant Payer : <br> <span  class="badge badge-success">{{ $total_payment}}DH</span></small></h5>
                </div>
                <div class="col-md-2 col-sm-6 text-center">
                    <h5 class="font-w700"><small>Montant Restant : <br> <span class="badge badge-danger">{{ $rest_payment}}DH</span></small></h5>
                </div>
            </div>
            {{--<div class="col-md-6"></div>--}}
        </div>
        <div class="bg-flat-dark col-2" style="padding: 10px 10px;border-radius: 8px">
            <h3 class="block-title" style="color: white">Paiement</h3>
        </div>
        <div class="block-content block-content-full">
            <form class="payment-form" action="/payment" method="post">
                <div class="row">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$commande->id_commande}}" name="id_commande" id="id_commande">
                    <div class="col-md-3">
                        <label for="mode">Mode de Paiement</label>
                        <select name="mode" id="mode" class="form-control">
                            <option value="Mode 1">Mode 1</option>
                            <option value="Mode 2">Mode 2</option>
                            <option value="Mode 3">Mode 3</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="montant">Mode de Paiement</label>
                        <input type="text" name="paid" id="paid" class="form-control" placeholder="entrer le montant" required >
                    </div>
                    <div class="col-md-2">
                       <button type="submit" class="btn btn-alt-primary" style="position: absolute;bottom: 0">Valider</button>
                    </div>
                </div>
            </form>

            {{--<div class="col-md-6"></div>--}}
        </div>
    </div>
    <!-- END Table  -->

    <!-- les pieces -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Pieces</h3>
            <span class="mr-auto">
                <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="modal" data-target="#add-item" title="Ajouter">
                    Ajouter
                </button>
            </span>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full mytable">
                <thead>
                <tr>
                    <th class="text-center" >Libelle</th>
                    <th class="text-center">Categorie</th>
                    <th class="text-center">Service</th>
                    <th class="text-center" style="width:20%;">Description</th>
                    <th class="text-center" style="width:8%;" >Quantity</th>
                    <th class="text-center" style="width:10%;">Prix Unit</th>
                    <th class="text-center" style="width:15%;">Prix Total (TTC)</th>
                    <th class="text-center" style="width:10%;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vetements as $vetement)
                    <tr class="commande_item">
                        <td class="d-none d-sm-table-cell text-center libelle">{{$vetement->vetement_libelle}}</td>
                        <td class="d-none d-sm-table-cell text-center categorie">
                            @foreach($categories as $categorie)
                                @if($vetement->id_categorie==$categorie->id_categorie)
                                    {{$categorie->categorie_name}}
                                @endif
                            @endforeach
                        </td>
                        <td class="d-none d-sm-table-cell text-center service">
                            @foreach($services as $service)
                                @if($vetement->id_service==$service->id_service)
                                    {{$service->service_name}}
                                @endif
                            @endforeach
                        </td>
                        <td class="d-none d-sm-table-cell text-center description">{{$vetement->vetement_description}}</td>
                        <td class="d-none d-sm-table-cell text-center quantity">{{$vetement->vetement_quantity}}</td>
                        <td class="d-none d-sm-table-cell text-center "> <span class="price">{{$vetement->vetement_price}}</span>DH</td>
                        <td class="d-none d-sm-table-cell text-center">{{$vetement->vetement_total}}DH</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <span data-toggle="tooltip" title="Modifier">
                                    <button type="button" class="btn btn-sm btn-table btn-alt-primary btn-edit-modal" data-toggle="modal"
                                            data-id="{{$vetement->id_vetement}}"
                                            data-categorie="{{$vetement->id_categorie}}"
                                            data-service="{{$vetement->id_service}}"
                                            data-description="{{$vetement->vetement_description}}"
                                            data-price="{{$vetement->vetement_price}}"
                                            data-quantity="{{$vetement->vetement_quantity}}"
                                            data-target="#edit-item">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </span>
                                <button type="button" data-id="{{$vetement->id_vetement}}" class="btn btn-sm btn-table btn-alt-danger">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Table  -->

    <!-- Add items -->
    <div class="modal" id="add-item" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="add-piece-form" action="/vetements" method="post">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$commande->id_commande}}" name="id_commande" id="id_commande">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Ajouter une pièce</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="categorie">Categorie <span class="text-danger">*</span></label>
                                        <select class="form-control categorie" id="categorie" name="categorie"
                                                style="width: 100%;" data-placeholder="Choisez la Categorie..">
                                            <option></option>
                                            @foreach( $categories as $categorie)
                                                <option value="{{$categorie->id_categorie}}">{{$categorie->categorie_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="service">Type
                                            de Service <span class="text-danger">*</span></label>
                                        <select class="form-control service"
                                                id="service" name="service"
                                                style="width: 100%;"
                                                data-placeholder="Choisez le Service..">
                                            <option></option>
                                            @foreach($services as $service)
                                                <option value="{{$service->id_service}}">{{$service->service_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="libelle">Libelle
                                            <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="si si-tag"></i></span>
                                            <input type="text" class="form-control libelle" id="libelle" name="libelle" placeholder="Entrer le nome du piece..">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label" for="description">
                                            Description <span style="font-size: 11px">(optionnel)</span>
                                        </label>
                                        <textarea class="form-control" rows="2" id="description" name="description" placeholder="Entrer la description de pièce"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="col-form-label" for="price">
                                            Prix Unit <span
                                                    class="text-danger">*</span>
                                        </label>
                                        <div class="input-group">
                                                            <span class="input-group-addon"><i
                                                                        class="fa fa-money"></i></span>
                                            <input type="text"
                                                   class="form-control price"
                                                   id="price"
                                                   name="price"
                                                   placeholder="10.60DH">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="col-form-label"
                                               for="quantity">Quantity</label>
                                        <div class="input-group">
                                                            <span class="input-group-addon"><i
                                                                        class="fa fa-archive"></i></span>
                                            <input type="number" min="1"
                                                   class="form-control quantity"
                                                   id="quantity" name="quantity"
                                                   value="1"
                                                   placeholder="Entrer la quantity">
                                        </div>
                                        <input type="hidden" class="total_price"
                                               name="vetement_total">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-alt-success">
                            <i class="fa fa-check"></i> Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit items -->
    <div class="modal" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="edit-piece-form" action="/vetements" method="post">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Modifier une Piece</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label" for="categorie">Categorie <span
                                                class="text-danger">*</span></label>
                                    <select class="form-control categorie" id="categorie" name="categorie"
                                            style="width: 100%;" data-placeholder="Choisez la Categorie..">
                                        <option></option>
                                        @foreach( $categories as $categorie)
                                            <option value="{{$categorie->id_categorie}}">{{$categorie->categorie_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="service">Type
                                        de Service <span
                                                class="text-danger">*</span></label>
                                    <select class="form-control service"
                                            id="service" name="service"
                                            style="width: 100%;"
                                            data-placeholder="Choisez le Service..">
                                        <option></option>
                                        @foreach($services as $service)
                                            <option value="{{$service->id_service}}">{{$service->service_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="libelle">Libelle
                                        <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="si si-tag"></i></span>
                                        <input type="text" class="form-control libelle" id="libelle" name="libelle" placeholder="Entrer le nome du piece..">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label"
                                           for="description">
                                        Description <span style="font-size: 11px">(optionnel)</span>
                                    </label>
                                    <textarea class="form-control" rows="2" id="description" name="description" placeholder="Entrer la description de pièce"></textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label" for="price">
                                        Prix Unit <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                        <input type="text" class="form-control price" id="price" name="price" placeholder="10.60DH">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-form-label"
                                           for="quantity">Quantity</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                                        <input type="number" min="1" class="form-control quantity" id="quantity" name="quantity" value="1" placeholder="Entrer la quantity">
                                    </div>
                                    <input type="hidden" class="total_price" name="vetement_total">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-alt-success" id="btn-edit-item">
                            <i class="fa fa-check"></i> Modifier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('page_script')
    <script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/additional-methods.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('assets/js/pages/be_tables_datatables.js')}}"></script>

    <script src="{{asset('assets/js/plugins/sweetalert2/es6-promise.auto.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

    <script src="{{asset('assets/js/pages/vetements_delete.js')}}"></script>
    <script src="{{asset('assets/js/pages/vetements_validation.js')}}"></script>


@endsection


