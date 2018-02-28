<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        

        view()->composer('Pages.main', function($view)
        {
            $nbr_factures = DB::table('commandes')->count();
            $nbr_clients = DB::table('clients')->count();
            $nbr_categories = DB::table('categories')->count();
            $nbr_services = DB::table('services')->count();
            $view->with([
                'nbr_factures'=>$nbr_factures,
                'nbr_clients'=>$nbr_clients,
                'nbr_categories'=>$nbr_categories,
                'nbr_services'=>$nbr_services
            ]);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
