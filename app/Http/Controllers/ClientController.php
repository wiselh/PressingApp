<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ClientController extends Controller
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
        $clients = DB::table('clients')->get();
        return view('Pages.Client.show', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.Client.clients');
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
        $client->nom=$request->nom;
        $client->tele=$request->tele;
        $client->adresse=$request->adresse;
        $client->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = DB::table('clients')->where('id_client', $id)->first();
        return view('Pages.Client.edit', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = DB::table('clients')->where('id_client', $id)->first();
        return view('Pages.Client.edit', ['client' => $client]);
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
        DB::table('clients')
            ->where('id_client', $id)
            ->update(
                [
                    'nom' =>$request->nom,
                    'tel' =>$request->tel,
                    'adresse' =>$request->adresse
                ]);


        return redirect('/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('clients')->where('id_client', '=', $id)->delete();
        return redirect('/clients');
    }

    public function downloadPDF($id){
        $client = $client = DB::table('clients')->where('id_client', $id)->first();

//        die(var_dump($client));
        $pdf = PDF::loadView('Pages.Client.pdf', ['client' => $client]);
        return $pdf->download('myclient.pdf');

    }
}
