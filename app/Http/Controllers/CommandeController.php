<?php

namespace App\Http\Controllers;

use App\Client;
use App\Commande;
use App\Facture;
use App\Payment;
use App\Vetement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Validator;

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
        $clients = DB::table('clients')->get();

        return view('Pages.Commande.add', [
            'services' => $services,
            'categories' => $categories,
            'clients' => $clients
        ]);
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
//    public function test(){
//        $v =(int)(date('dmy')."00");
//        die(var_dump($v+2));
//
//    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'categorie.*' => "required",
            'service.*' => 'required',
            'price.*' => 'required',
            'libelle.*' => 'required',
            'paid' => 'required',
            'commande_date_retrait' => 'required'

        ];
        $messages = [
            'categorie.*' => 'S\'il vous plaît entrer la categorie du pièce!',
            'service.*' => 'S\'il vous plaît entrer le service pour cette pièce!',
            'price.*' => 'S\'il vous plaît entrer le prix du pièce!',
            'libelle.*' => 'S\'il vous plaît entrer le nom du pièce!',
            'commande_date_retrait' => 'Le champ Date de Retrait est obligatoire.!',
            'paid' => 'Choisez Oui ou Non.'

        ];
        $this->validate($request, $rules, $messages);


        if ($request->check_client == 'old') {
            $client = DB::table('clients')->where('id_client', $request->client)->first();
        } else {
            $client = new Client();
            $client->client_name = $request->client_name;
            $client->client_tele = $request->client_tele;
            $client->client_adresse = $request->client_adresse;
            $client->save();
        }

        $commande = new Commande();

        $nbr = DB::table('commandes')->count();
        if ($nbr < 1) {
            $num_fac = 18031300;
        } else {
            $cmd = DB::table('commandes')->max('id_commande')->first();
            $num_fac = $cmd->commande_num + 1;
        }

        $commande->commande_num = $num_fac;
        $commande->commande_date = date('Y-m-d');
        $commande->commande_date_retrait = $request->commande_date_retrait;
        $commande->commande_paid = $request->paid;
        $commande->id_client = $client->id_client;


        // vetements
        $categorie = Input::get('categorie');
        $service = Input::get('service');
        $libelle = Input::get('vetement_libelle');
        $price = Input::get('vetement_price');
        $quantity = Input::get('vetement_quantity');
        $total = Input::get('vetement_total');
        $description = Input::get('vetement_description');
        $montant = 0;
        $pieces = 0;

        for ($i = 0; $i < count($categorie); $i++) {
            $montant += $total[$i];
            $pieces += $quantity[$i];
        }
        $commande->commande_montant = $montant;
        $commande->commande_quantity = $pieces;
        $commande->save();

        //payment
        $payment = new Payment();
        if ($request->paid == 'oui') {
            $payment->payment_mode = $request->payment_mode;
            $payment->payment_paid = $request->payment_paid;
            $rest = $montant - $request->payment_paid;
            $payment->payment_rest = $rest;
            $payment->id_commande = $commande->id_commande;
        }

        for($i = 0;$i<count($categorie);$i++)
        {
            $vetement = new Vetement();
            $vetement->id_categorie=$categorie[$i];
            $vetement->id_service=$service[$i];
            $vetement->id_commande=$commande->id_commande;
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
