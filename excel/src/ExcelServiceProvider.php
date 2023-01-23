<?php

namespace Khoanguyen\Excel;

use Illuminate\Support\ServiceProvider;
use Khoanguyen\Excel\Console\Commands\CreateImportExcel;
use Khoanguyen\Excel\Facade\Excel;

class ExcelServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('excel', function () {
            return new Excel();
        });

        $this->commands([
            CreateImportExcel::class,
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
