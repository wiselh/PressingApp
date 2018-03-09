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
        DB::table('commandes')->where('id_commande', '=', $id)->delete();
        return redirect('/factures');
    }

}
