<?php

namespace HelpDesk\Providers;

use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.admin.sidebar', function($view) {
            $view->with('menus', \HelpDesk\Menu::latest()->get());
        });

        view()->composer('partials.admin.mobile-header', function($view) {
            $view->with('menus', \HelpDesk\Menu::latest()->get());
        });

        // view()->composer('pages.admin.monthly.report', function($view) {
        //     $view->with('services', \HelpDesk\Service::latest()->get());
        // });

        // view()->composer('pages.admin.monthly.report', function($view) {
        //     $view->with('projects', \HelpDesk\Project::whereIn(DB::raw('MONTH(created_at)'), [date('m')])->whereIn(DB::raw('YEAR(created_at)'), [date('Y')])->latest()
        //                    ->get());
        // });
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
