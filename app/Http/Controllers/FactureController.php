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

        $factures = DB::table('commandes')
            ->join('clients', 'clients.id_client', '=', 'commandes.id_client')
            ->join('vetements', 'vetements.id_commande', '=', 'commandes.id_commande')
            ->distinct('DISTINCT id_vetement,*')
//            ->where('clients.id_client = commandes.id_client AND vetements.id_commande = commandes.id_commande')
            ->get();
//        $clients = DB::table('clients')->get();
//        $vetements = DB::table('vetements')->get();
//        $commandes = DB::table('commandes')->get();
//        $services = DB::table('services')->get();
//        $categories = DB::table('categories')->get();

        return view('Pages.Facture.show', [
            'factures' => $factures,
//            'clients' => $clients,
//            'vetements' => $vetements,
//            'commandes' => $commandes,
//            'services' => $services,
//            'categories' => $categories,
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

    }

}
