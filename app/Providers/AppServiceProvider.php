<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;
use App\Models\tasks;
use App\Models\User;
use App\Models\settings;
use App\Models\contacts;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // Using view composer to set following variables globally


        view()->composer('*',function($view) {
            $view->with('settings', settings::first());
            if (Auth::check())
            {
                $view->with('login_user', Auth::user());
                $view->with('mytasks', tasks::where('assigned_to',Auth::user()->id)->where('status','!=','Completed')->paginate(10));
                $view->with('allcontacts', contacts::select('id','name','customerid','organization')->get());

                $view->with('allusers', User::select('name','id')->get());
                // $view->with('hmembers', User::select('status')->get());

            }
            // if you need to access in controller and views:
            // Config::set('something', $something);
        });
    }
}
