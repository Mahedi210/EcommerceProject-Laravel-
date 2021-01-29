<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

use View;
use App\category;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
   View::composer('*',function ($view){

       $view->with('categories',category::where('publication_status',1)->get()

       );
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
