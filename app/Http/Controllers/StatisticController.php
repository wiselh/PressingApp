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
    public function statistic($date){
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
    public function test(){

        $days=[];
        $weeks=[];
        $months=[];
        $dayRevenu=[];
        for ($i = 0 ;$i<7;$i++){

            $nbr = DB::table('commandes')
                ->where("commande_date","=",Carbon::now()->startOfWeek()->addDays($i))
                ->whereNotNull('deleted_at')->count();
            $revenuDay = DB::table('commandes')
                ->where("commande_date","=",Carbon::now()->startOfWeek()->addDays($i))
                ->whereNotNull('deleted_at')
                ->sum('commandes.commande_montant');
            array_push($days,$nbr);
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

//            return [
//                'days' => $days,
//                'weeks' => $weeks,
//                'months' => $months,
//                'revenu' =>$dayRevenu,
//                'revenuOfWeek'=>$revenuOfWeek,
//                'commandesOfWeek'=>$commandesOfWeek,
//                'commandesOfMonth'=>$commandesOfMonth,
//                'revenuOfMonth'=>$revenuOfMonth
//
//            ];
        return  [
            'days' => $days,
            'weeks' => $weeks,
            'months' => $months,
            'revenu' =>$dayRevenu,
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
    public function statisticBetweenTwoDates(){
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
