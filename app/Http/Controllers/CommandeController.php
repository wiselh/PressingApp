<?php

namespace App\Http\Controllers;

use App\Client;
use App\Commande;
use App\Facture;
use App\Vetement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CommandeController extends Controller
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
        $services = DB::table('services')->get();
        $categories = DB::table('categories')->get();
        
        return view('Pages.Commande.create', ['services' => $services,'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.Commande.create');
    }
    public function test(){
        return view('Pages.Commande.test');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();
        $commande = new Commande();


        $client->client_name=$request->client_name;
        $client->client_tele=$request->client_tele;
        $client->client_adresse=$request->client_adresse;
        $client->save();

        $num_fac = "N°".date('ymdHi');
        $commande->commande_num=$num_fac;
        $commande->commande_date=date('Y-m-d');
        $commande->commande_date_retrait=$request->commande_date_retrait;
        $commande->commande_paid=$request->commande_paid;
        $commande->id_client=$client->id;

        // vetements
        $categorie = Input::get('categorie');
        $service = Input::get('service');
        $color = Input::get('vetement_color');
        $price = Input::get('vetement_price');
        $quantity = Input::get('vetement_quantity');
        $total = Input::get('vetement_total');
        $description = Input::get('vetement_description');
        $montant =0;
        $piece =0;

        for($i = 0;$i<count($categorie);$i++)
        {
            $montant += $total[$i];
            $piece+=$quantity[$i];
        }
        $commande->commande_montant=$montant;
        $commande->commande_quantity=$piece;
        $commande->save();

        for($i = 0;$i<count($categorie);$i++)
        {
            $vetement = new Vetement();

            $vetement->id_categorie=$categorie[$i];
            $vetement->id_service=$service[$i];
            $vetement->id_commande=$commande->id;

            $vetement->vetement_color=$color[$i];
            $vetement->vetement_price=$price[$i];
            $vetement->vetement_quantity=$quantity[$i];
            $vetement->vetement_total=$total[$i];
            $vetement->vetement_description=$description[$i];
            $vetement->save();
        }

        return redirect('/commandes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        DB::table('c')->where('id_client', '=', $id)->delete();
//        return redirect('/clients');
    }
}
