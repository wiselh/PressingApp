<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Client;
use App\Facture;
use App\Vetement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class FactureController extends Controller
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
//        $nbr_fac = DB::table('factures')->count();
//        $nbr_clt = DB::table('clients')->count();
//        $nbr_cat = DB::table('categories')->count();
//        $nbr_sev = DB::table('services')->count();
//        return view('Pages.Facture.create', ['nbr_fac' => $nbr_fac]);

        $services = DB::table('services')->get();
        $categories = DB::table('categories')->get();
        return view('Pages.Facture.create', ['services' => $services,'categories' => $categories]);




//        $items = DB::table('vetement_facture_client')
//            ->select('*')
////            ->groupBy('status_id')
//            ->orderBy('date_facture' , 'desc')
////            ->whereIn('user_id', Auth::user()->id())
//            ->get();
//        die($items);


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
        $facture = new Facture();
        $vetement = new Vetement();



        $client->nom=$request->nom;
        $client->tel=$request->tele;
        $client->adresse=$request->adresse;
        $client->save();

        $num_fac = "N°-".date('YmdHis');
        $facture->num_facture=$num_fac;
        $facture->date_facture=date('Y-m-d');
        $facture->date_retrait_facture=$request->date_retrait;
        $facture->paye_facture=$request->paye;
        $facture->id_client=$client->id;




        // vetements
        $categorie = Input::get('categorie');
        $couleur = Input::get('couleur');
        $service = Input::get('service');
        $prix = Input::get('prix');
        $montant =0;

        for($i = 0;$i<count($categorie);$i++)
        {
            $montant += $prix[$i];
        }
        $facture->montant_facture=$montant;
        $facture->save();





        for($i = 0;$i<count($categorie);$i++)
        {
            $vetement = new Vetement();
            $vetement->categorie=$categorie[$i];
            $vetement->couleur=$couleur[$i];
            $vetement->service=$service[$i];
            $vetement->prix=$prix[$i];
            $vetement->id_facture=$facture->id;
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
        //
    }


//    public function tst(Request $request)
//    {
//        $categorie = Input::get('categorie');
//        $couleur = Input::get('couleur');
//        $service = Input::get('service');
//        $prix = Input::get('prix');
//
//        for($i = 0;$i<count($categorie);$i++)
//        {
//            $vetement = new Vetement();
//            $vetement->categorie=$categorie[$i];
//            $vetement->couleur=$couleur[$i];
//            $vetement->service=$service[$i];
//            $vetement->prix=$prix[$i];
//            $vetement->id_facture=1;
//            $vetement->save();
//        }
//        die('success');
////        die(var_dump($categorie[2]));
//    }


}
