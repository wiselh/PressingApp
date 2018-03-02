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
        return view('Pages.Facture.create', ['services' => $services,'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.Facture.create');
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
        $vetement = new Vetement();

        $client->nom=$request->nom;
        $client->tel=$request->tele;
        $client->adresse=$request->adresse;
        $client->save();

        $num_fac = "N°-".date('YmdHis');
        $commande->num_commande=$num_fac;
        $commande->date_commande=date('Y-m-d');
        $commande->date_retrait=$request->date_retrait;
        $commande->paye_commande=$request->paye;
        $commande->id_client=$client->id;

        // vetements
        $categorie = Input::get('categorie');
        $couleur = Input::get('couleur');
        $service = Input::get('service');
        $prix = Input::get('prix');
        $montant =0;
        $piece =0;

        for($i = 0;$i<count($categorie);$i++)
        {
            $montant += $prix[$i];
            $piece++;
        }
        $commande->montant_commande=$montant;
        $commande->quantity=$piece;
        $commande->save();

        for($i = 0;$i<count($categorie);$i++)
        {
            $vetement = new Vetement();
            $vetement->categorie=$categorie[$i];
            $vetement->couleur=$couleur[$i];
            $vetement->service=$service[$i];
            $vetement->prix=$prix[$i];
            $vetement->id_commande=$commande->id;
            $montant += $prix[$i];
            $vetement->save();
        }

        return view('Pages.Facture.create');
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
