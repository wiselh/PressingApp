<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Commande;
use App\Service;
use App\Vetement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class VetementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_commande = Input::get('id_commande');
        $commande = Commande::find($id_commande);

        $categorie = Input::get('categorie');
        $service = Input::get('service');
        $libelle = Input::get('libelle');
        $price = Input::get('price');
        $quantity = Input::get('quantity');
        $total = $price*$quantity;
        $description = Input::get('description');

        $commande->commande_montant = $commande->commande_montant + $total;
        $commande->commande_quantity = $commande->commande_quantity + $quantity;
        $commande->save();

        $vetement = new Vetement();
        $vetement->id_categorie=$categorie;
        $vetement->id_service=$service;
        $vetement->id_commande=$id_commande;
        $vetement->vetement_libelle=$libelle;
        $vetement->vetement_price=$price;
        $vetement->vetement_quantity=$quantity;
        $vetement->vetement_total=$total;
        $vetement->vetement_description=$description;
        $vetement->save();

        return redirect('/factures/'.$id_commande);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $vetements =  Commande::find($id)->vetements;
//        $client =  Commande::find($id)->client;
        $categories =  Categorie::all();
        $services =  Service::all();
        return view('Pages.Facture.items', [
//            'client' =>$client,
            'vetements' => $vetements,
            'categories' => $categories,
            'services' => $services
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vetement = Vetement::find($id);
        $commande = Commande::find($vetement->id_commande);

        $libelle = $request->libelle;
        $price = $request->price;
        $quantity= $request->quantity;
        $description = $request->description;
        $total = $price*$quantity;


        $vetement->vetement_libelle= $libelle;
        $vetement->vetement_price=$price;
        $vetement->vetement_quantity=$quantity;
        $vetement->vetement_total=$total;
        $vetement->vetement_description=$description;
        $vetement->save();

        $montant = 0;
        $pieces = 0;
        $vetements = Commande::find($vetement->id_commande)->vetements;

        foreach ($vetements as $vet){
            $montant += $vet->vetement_total;
            $pieces += $vet->vetement_quantity;
        }
        $commande->commande_montant = $montant;
        $commande->commande_quantity = $pieces;

        $commande->save();

        return redirect('/factures/'.$vetement->id_commande);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vetement = Vetement::find($id);
        $commande = Commande::find($vetement->id_commande);

        $commande->commande_montant = $commande->commande_montant - $vetement->vetement_total;
        $commande->commande_quantity = $commande->commande_quantity - $vetement->vetement_quantity;
        $commande->save();

        Vetement::destroy($id);
    }
}
