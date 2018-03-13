<?php

namespace App\Http\Controllers;

use App\Facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImpressionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('Pages.Impression.generate', [
            'id' => $id,
        ]);
    }
    public function destroy($id)
    {
      //
    }
    public function show($id)
    {
        $facture = DB::table('factures')->where('id_commande',$id)->first();

        return view('Pages.Impression.generate', [
            'facture' => $facture,
        ]);
    }
}
