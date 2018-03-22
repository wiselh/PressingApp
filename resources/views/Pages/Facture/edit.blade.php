@extends('Pages.main')

@section('page_style')
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
                    <th class="text-center">Libelle</th>
                    <th class="text-center">Categorie</th>
                    <th class="text-center">Service</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Prix Unit (DH)</th>
                    <th class="text-center">Prix Total (DH TTC)</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vetements as $vetement)
                    <tr class="clients">
                        <td class="d-none d-sm-table-cell text-center">{{$vetement->vetement_libelle}}</td>
                        <td class="d-none d-sm-table-cell text-center">{{$vetement->id_categorie}}</td>
                        <td class="d-none d-sm-table-cell text-center">{{$vetement->id_service}}</td>
                        <td class="d-none d-sm-table-cell text-center">{{$vetement->vetement_description}}</td>
                        <td class="d-none d-sm-table-cell text-center">{{$vetement->vetement_quantity}}</td>
                        <td class="d-none d-sm-table-cell text-center">{{$vetement->vetement_price}}</td>
                        <td class="d-none d-sm-table-cell text-center">{{$vetement->vetement_total}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-table btn-alt-primary" data-toggle="modal"
                                        data-id="{{$vetement->id_vetement}}"
                                        data-name="{{$vetement->client_name}}"
                                        data-tele="{{$vetement->client_tele}}"
                                        data-adresse="{{$vetement->client_adresse}}" title="Edit"
                                        data-target="#modal-fromright">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" data-id="{{$vetement->id_client}}" class="btn btn-sm btn-table btn-alt-danger">
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

    <!-- Show items -->
    <div class="modal" id="add-item" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Ajouter une Pieces</h3>
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
                                    <select class="form-control categorie" id="categorie.0" name="categorie[]"
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
                                            id="service.0" name="service[]"
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
                                                        <span class="input-group-addon"><i
                                                                    class="si si-tag"></i></span>
                                        <input type="text"
                                               class="form-control libelle"
                                               id="libelle.0" name="libelle[]"
                                               placeholder="Entrer le nome du piece..">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label"
                                           for="description">
                                        Description <span
                                                style="font-size: 11px">(optionnel)</span>
                                    </label>
                                    <textarea class="form-control" rows="2"
                                              id="description"
                                              name="description"
                                              placeholder="Entrer la description de pièce"></textarea>
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
                                               id="price.0"
                                               name="price[]"
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
                                               id="quantity" name="quantity[]"
                                               value="1"
                                               placeholder="Entrer la quantity">
                                    </div>
                                    <input type="hidden" class="total_price"
                                           name="vetement_total[]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-alt-success" id="add">
                        <i class="fa fa-check"></i> Ajouter
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{--Pieces--}}
    {{--<div class="row" id="pieces">--}}
        {{--<div class="col-12">--}}
            {{--<div class="block row">--}}
                {{--<div class="block-header sous-block-header-default header-block col-md-12">--}}
                    {{--<h3 class="block-title">Pieces</h3>--}}
                {{--</div>--}}
                {{--<div class="col-12 alert-secondary" data-id="0" id="piece">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-3">--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-form-label" for="categorie">Categorie <span--}}
                                            {{--class="text-danger">*</span></label>--}}
                                {{--<select class="form-control categorie" id="categorie.0" name="categorie[]"--}}
                                        {{--style="width: 100%;" data-placeholder="Choisez la Categorie..">--}}
                                    {{--<option></option>--}}
                                    {{--@foreach( $categories as $categorie)--}}
                                        {{--<option value="{{$categorie->id_categorie}}">{{$categorie->categorie_name}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-form-label" for="service">Type--}}
                                    {{--de Service <span--}}
                                            {{--class="text-danger">*</span></label>--}}
                                {{--<select class="form-control service"--}}
                                        {{--id="service.0" name="service[]"--}}
                                        {{--style="width: 100%;"--}}
                                        {{--data-placeholder="Choisez le Service..">--}}
                                    {{--<option></option>--}}
                                    {{--@foreach($services as $service)--}}
                                        {{--<option value="{{$service->id_service}}">{{$service->service_name}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-form-label" for="libelle">Libelle--}}
                                    {{--<span class="text-danger">*</span></label>--}}
                                {{--<div class="input-group">--}}
                                                        {{--<span class="input-group-addon"><i--}}
                                                                    {{--class="si si-tag"></i></span>--}}
                                    {{--<input type="text"--}}
                                           {{--class="form-control libelle"--}}
                                           {{--id="libelle.0" name="libelle[]"--}}
                                           {{--placeholder="Entrer le nome du piece..">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-form-label"--}}
                                       {{--for="description">--}}
                                    {{--Description <span--}}
                                            {{--style="font-size: 11px">(optionnel)</span>--}}
                                {{--</label>--}}
                                {{--<textarea class="form-control" rows="2"--}}
                                          {{--id="description"--}}
                                          {{--name="description"--}}
                                          {{--placeholder="Entrer la description de pièce"></textarea>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-3">--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-form-label" for="price">--}}
                                    {{--Prix Unit <span--}}
                                            {{--class="text-danger">*</span>--}}
                                {{--</label>--}}
                                {{--<div class="input-group">--}}
                                                        {{--<span class="input-group-addon"><i--}}
                                                                    {{--class="fa fa-money"></i></span>--}}
                                    {{--<input type="text"--}}
                                           {{--class="form-control price"--}}
                                           {{--id="price.0"--}}
                                           {{--name="price[]"--}}
                                           {{--placeholder="10.60DH">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group ">--}}
                                {{--<label class="col-form-label"--}}
                                       {{--for="quantity">Quantity</label>--}}
                                {{--<div class="input-group">--}}
                                                        {{--<span class="input-group-addon"><i--}}
                                                                    {{--class="fa fa-archive"></i></span>--}}
                                    {{--<input type="number" min="1"--}}
                                           {{--class="form-control quantity"--}}
                                           {{--id="quantity" name="quantity[]"--}}
                                           {{--value="1"--}}
                                           {{--placeholder="Entrer la quantity">--}}
                                {{--</div>--}}
                                {{--<input type="hidden" class="total_price"--}}
                                       {{--name="vetement_total[]">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-12" id="add_button">--}}
            {{--<div class="block row">--}}
                {{--<div class="col-md-3">--}}
                    {{--<button id="add" type="button"--}}
                            {{--class="btn btn-alt-secondary btn-sm">--}}
                        {{--<i class="fa fa-plus-circle"></i> Autre Pièce--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="col-md-2 ml-auto">--}}
                    {{--<b><span id="montant">Montant Total:0</span>DH</b>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection

@section('page_script')

@endsection


