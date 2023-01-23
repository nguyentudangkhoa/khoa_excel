<?php

namespace Khoanguyen\Excel;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Khoanguyen\Excel\Console\Commands\CreateImportExcel;
use Khoanguyen\Excel\Facade\Excel;
use Khoanguyen\Excel\Support\ExcelFacade;

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

        $alias = AliasLoader::getInstance();

        $alias->alias('Excel', ExcelFacade::class);
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
