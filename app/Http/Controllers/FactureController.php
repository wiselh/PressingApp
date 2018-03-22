<?php

namespace App\Http\Controllers;


use App\Categorie;
use App\Commande;
use App\Service;
use Illuminate\Http\Request;
use App\Client;
use App\Facture;
use App\Vetement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Query\Builder;


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

        $factures = DB::table('factures')->whereNull('deleted_at')->get();


        return view('Pages.Facture.show', [
            'factures' => $factures,
        ]);
    }

    public function allCommandes()
    {
        $factures = DB::table('factures')->whereNotNull('deleted_at')->get();

        return view('Pages.Facture.allTrashed', [
            'factures' => $factures,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $client =  Commande::find($id)->client;
        $commande = Commande::find($id);
//        $payment = Commande::find($id)->latestPayment();
        $total_payment = Commande::find($id)->totalPayment();
        $rest_payment = Commande::find($id)->restPayment();

        $categories =  Categorie::all();
        $services =  Service::all();

        return view('Pages.Facture.edit',[
            'total_payment'=>$total_payment,
            'rest_payment'=>$rest_payment,
            'client' => $client,
            'commande' => $commande,
            'vetements' => $vetements,
            'services' => $services,
            'categories' => $categories,
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
        Commande::destroy($id);
        return redirect('/factures');
    }

}
