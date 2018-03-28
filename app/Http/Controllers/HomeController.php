<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revenuOfWeek=0;
        $commandesOfWeek=0;

        for ($i = 0 ;$i<7;$i++){

            $nbr = DB::table('commandes')
                ->where("commande_date","=",Carbon::now()->startOfWeek()->addDays($i))
                ->whereNotNull('deleted_at')->count();
            $commandes = DB::table('commandes')
                ->where("commande_date","=",Carbon::now()->startOfWeek()->addDays($i))
                ->whereNotNull('deleted_at')
                ->sum('commandes.commande_montant');
            $revenuOfWeek+=$commandes;
            $commandesOfWeek+=$nbr;
        }

        $revenuOfMonth = DB::table('commandes')
            ->whereMonth("commande_date","=",Carbon::now()->month)
            ->whereNotNull('deleted_at')
            ->sum('commandes.commande_montant');

        $commandesOfMonth = DB::table('commandes')
            ->whereMonth("commande_date","=",Carbon::now()->month)
            ->whereNotNull('deleted_at')
            ->count();

        $revenuOfYear = DB::table('commandes')
            ->whereYear("commande_date","=",Carbon::now()->year)
            ->whereNotNull('deleted_at')
            ->sum('commandes.commande_montant');

        $commandesOfYear = DB::table('commandes')
            ->whereYear("commande_date","=",Carbon::now()->year)
            ->whereNotNull('deleted_at')
            ->count();

        $revenuTotal = DB::table('commandes')
            ->whereNotNull('deleted_at')
            ->sum('commandes.commande_montant');

        $commandesTotal = DB::table('commandes')
            ->whereNotNull('deleted_at')
            ->count();

        return view('home', [
            'revenuOfWeek'=>$revenuOfWeek,
            'commandesOfWeek'=>$commandesOfWeek,
            'commandesOfMonth'=>$commandesOfMonth,
            'revenuOfMonth'=>$revenuOfMonth,
            'commandesOfYear'=>$commandesOfYear,
            'revenuOfYear'=>$revenuOfYear,
            'commandesTotal'=>$commandesTotal,
            'revenuTotal'=>$revenuTotal

        ]);

    }

    public function test(){


    }
}
