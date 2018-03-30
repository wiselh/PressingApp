<?php

namespace App\Http\Controllers;

use App\Commande;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
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
        $commandes = DB::table('commandes')->whereNotNull('deleted_at')->get();
        $commandes_counter = DB::table('commandes')->whereNotNull('deleted_at')->count();
        $client_counter = DB::table('clients')->count();

        $montant = 0;
        foreach ($commandes as $commande){
            $montant += $commande->commande_montant;
        }
        return view('Pages.Statistics.statistics', [
            'earning' => $montant,
            'commandes_counter'=>$commandes_counter,
            'client_counter'=>$client_counter
        ]);


    }
    public function graphStatistics(){
        //commandes arrays
        $days=[];
        $lastDays=[];
        $months=[];
        $lastMonths=[];

        //earnings arrays
        $revenuDays=[];
        $revenuLastDays=[];
        $revenuMonths=[];
        $revenuLastMonths=[];

        // add this year and last year to arrays
        array_push($months,Carbon::now()->year);
        array_push($lastMonths,Carbon::now()->year-1);
        array_push($revenuMonths,Carbon::now()->year);
        array_push($revenuLastMonths,Carbon::now()->year-1);

        // get a weeks days data
        for ($i = 0 ;$i<7;$i++){

            $thisDay = DB::table('commandes')
                ->where("commande_date","=",Carbon::now()->startOfWeek()->addDays($i))
                ->whereNotNull('deleted_at')->count();
            $lastDay = DB::table('commandes')
                ->where("commande_date","=",Carbon::parse('last sunday')->startOfWeek()->addDays($i))
                ->whereNotNull('deleted_at')->count();
            $revenuThisDay = DB::table('commandes')
                ->where("commande_date","=",Carbon::now()->startOfWeek()->addDays($i))
                ->whereNotNull('deleted_at')
                ->sum('commandes.commande_montant');
            $revenuLastDay = DB::table('commandes')
                ->where("commande_date","=",Carbon::parse('last sunday')->startOfWeek()->addDays($i))
                ->whereNotNull('deleted_at')
                ->sum('commandes.commande_montant');

            array_push($days,$thisDay);
            array_push($lastDays,$lastDay);
            array_push($revenuDays,$revenuThisDay);
            array_push($revenuLastDays,$revenuLastDay);
        }

        // get a years months data
        for ($i=1;$i<13;$i++){
            $thisMonth =  DB::table('commandes')
                ->whereYear("commande_date","=",Carbon::now()->year)
                ->whereMonth("commande_date","=",$i)
                ->whereNotNull('deleted_at')->count();
            $revenuThisMonth =  DB::table('commandes')
                ->whereYear("commande_date","=",Carbon::now()->year)
                ->whereMonth("commande_date","=",$i)
                ->whereNotNull('deleted_at')->sum('commandes.commande_montant');

            $lastMonth =  DB::table('commandes')
                ->whereYear("commande_date","=",(Carbon::now()->year-1))
                ->whereMonth("commande_date","=",$i)
                ->whereNotNull('deleted_at')->count();
            $revenuLastMonth =  DB::table('commandes')
                ->whereYear("commande_date","=",(Carbon::now()->year-1))
                ->whereMonth("commande_date","=",$i)
                ->whereNotNull('deleted_at')->sum('commandes.commande_montant');
            array_push($months,$thisMonth);
            array_push($revenuMonths,$revenuThisMonth);

            array_push($lastMonths,$lastMonth);
            array_push($revenuLastMonths,$revenuLastMonth);

        }

        return  [
            //commandes counts
            'days' => $days,
            'lastDays' => $lastDays,
            'months' => $months,
            'lastMonths'=>$lastMonths,
            // earnings
            'revenuDays' =>$revenuDays,
            'revenuLastDays' =>$revenuLastDays,
            'revenuMonths' =>$revenuMonths,
            'revenuLastMonths' =>$revenuLastMonths,

        ];
    }
    public function headerStatistics($date){
        switch($date){
            case 'day'  : return $this->getDataOfInterval(Carbon::now()->subDay(),$date);
                break;
            case 'week' : return $this->getDataOfInterval(Carbon::now()->subWeek(),$date);
                break;
            case 'month': return $this->getDataOfInterval(Carbon::now()->subMonth(),$date);
                break;
            case 'year' : return $this->getDataOfInterval(Carbon::now()->subYear(),$date);
                break;
            case 'lifetime' : return $this->getDataOfInterval(Carbon::now()->subYears(100),$date);
                break;
            default : return $this->getDataOfInterval(Carbon::now()->subYears(100),$date);
       }

    }

    public function tableCommandes(){
        //commandes arrays
        $days=[];

        // get a weeks days data
        for ($i = 0 ;$i<7;$i++){
            $thisDay = DB::table('commandes')
                ->where("commande_date","=",Carbon::now()->startOfWeek()->addDays($i))
                ->whereNotNull('deleted_at')->get();

            array_push($days,$thisDay);
        }
//        return ['day'=>$days];
        return response()
            ->json(['day'=>$days]);

    }

    public function test(){

        $days=[];
        $lastDays=[];
        $weeks=[];
        $months=[];
        $lastMonths=[];
        $dayRevenu=[];
        array_push($months,Carbon::now()->year);
        array_push($lastMonths,Carbon::now()->year-1);

        for ($i = 0 ;$i<7;$i++){

            $thisDay = DB::table('commandes')
                ->where("commande_date","=",Carbon::now()->startOfWeek()->addDays($i))
                ->whereNotNull('deleted_at')->count();
            $lastDay = DB::table('commandes')
                ->where("commande_date","=",Carbon::parse('last sunday')->startOfWeek()->addDays($i))
                ->whereNotNull('deleted_at')->count();
            $revenuDay = DB::table('commandes')
                ->where("commande_date","=",Carbon::now()->startOfWeek()->addDays($i))
                ->whereNotNull('deleted_at')
                ->sum('commandes.commande_montant');

            array_push($days,$thisDay);
            array_push($lastDays,$lastDay);
            array_push($dayRevenu,$revenuDay);
        }
//        $year =2018;
//        $month =03;
//        $day =28;
//        Carbon::create($year,$month,$day)
        $week1 = DB::table('commandes')
            ->where("commande_date",">=",Carbon::now()->startOfMonth()->subDay())
            ->where("commande_date","<",Carbon::now()->startOfMonth()->subDay()->addDay(7))
            ->whereNotNull('deleted_at')->count();
        $week2 = DB::table('commandes')
            ->where("commande_date",">=",Carbon::now()->startOfMonth()->subDay()->addDay(7))
            ->where("commande_date","<",Carbon::now()->startOfMonth()->subDay()->addDay(14))
            ->whereNotNull('deleted_at')->count();
        $week3 = DB::table('commandes')
            ->where("commande_date",">=",Carbon::now()->startOfMonth()->subDay()->addDay(14))
            ->where("commande_date","<",Carbon::now()->startOfMonth()->subDay()->addDay(21))
            ->whereNotNull('deleted_at')->count();
        $week4 =  DB::table('commandes')
            ->where("commande_date",">=",Carbon::now()->startOfMonth()->subDay()->addDay(21))
            ->whereMonth("commande_date","=",Carbon::now()->month)
            ->whereNotNull('deleted_at')->count();
        array_push($weeks,$week1,$week2,$week3,$week4);



        for ($i=1;$i<13;$i++){
           $month =  DB::table('commandes')
                ->whereYear("commande_date","=",Carbon::now()->year)
                ->whereMonth("commande_date","=",$i)
                ->whereNotNull('deleted_at')->count();
            array_push($months,$month);
        }
        for ($i=1;$i<13;$i++){
            $month =  DB::table('commandes')
                ->whereYear("commande_date","=",(Carbon::now()->year-1))
                ->whereMonth("commande_date","=",$i)
                ->whereNotNull('deleted_at')->count();
            array_push($lastMonths,$month);
        }

        return  [
            'days' => $days,
            'lastDays' => $lastDays,
            'weeks' => $weeks,
            'revenu' =>$dayRevenu,
            'months' => $months,
            'lastMonths'=>$lastMonths
        ];

    }


    public function getDataOfInterval($date,$period_date){

        switch($period_date){
            case 'day'  :  $period ='Aujourd\'hui';
                break;
            case 'week' :  $period ='Cette Semaine';
                break;
            case 'month':  $period ='Ce Mois';
                break;
            case 'year' :  $period ='Cette Année';
                break;
            case 'lifetime' :  $period ='Toujours';
                break;
            default :  $period = 'Entre deux dates';
        }

        $cmd = DB::table('commandes')
            ->where("commande_date",">",$date)
            ->where("commande_date","<",Carbon::now())
            ->whereNotNull('deleted_at')->count();
        $clients = DB::table('clients')
            ->where("created_at",">",$date)
            ->where("created_at","<",Carbon::now())
            ->count();
        $commandes = DB::table('commandes')
            ->where("commande_date",">",$date)
            ->where("commande_date","<",Carbon::now())
            ->whereNotNull('deleted_at')->get();
        $factures = DB::table('factures')
            ->where("commande_date",">",$date)
            ->where("commande_date","<",Carbon::now())
            ->whereNotNull('deleted_at')->get();
        $total = 0;
        if ($cmd>0){
            foreach ($commandes as $commande){
                $total+=$commande->commande_montant;
            }
        }
        //graph
//        $cmd = DB::table('commandes')
//            ->where("commande_date","=",Carbon::now()->startOfWeek())
//            ->whereNotNull('deleted_at')->count();
//        $cmd = DB::table('commandes')
//            ->where("commande_date","=",Carbon::now()->startOfWeek())
//            ->whereNotNull('deleted_at')->count();

        return ['money' => $total,
            'commandes_nbr'=>$cmd,
            'commandes'=>$factures,
            'clients_nbr' => $clients,
            'period' => $period];
    }
    public function statisticsBetweenTwoDates(){
        $date1 = $_GET['date1'];
        $date2 = $_GET['date2'];

        $cmd = DB::table('commandes')
            ->where("commande_date",">=",$date1)
            ->where("commande_date","<=",$date2)
            ->whereNotNull('deleted_at')->count();
        $clients = DB::table('clients')
            ->where("created_at",">=",$date1)
            ->where("created_at","<=",$date2)
            ->count();
        $commandes = DB::table('commandes')
            ->where("commande_date",">=",$date1)
            ->where("commande_date","<=",$date2)
            ->whereNotNull('deleted_at')->get();
        $total = 0;
        if ($cmd>0){
            foreach ($commandes as $commande){
                $total+=$commande->commande_montant;
            }
        }
        $period ='Entre deux dates';
        return ['money' => $total,
            'commandes_nbr'=>$cmd,
            'clients_nbr' => $clients,
            'period' => $period];
    }


}
