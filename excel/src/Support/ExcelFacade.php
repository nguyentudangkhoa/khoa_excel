<?php

namespace Khoanguyen\Excel\Support;

use Illuminate\Support\Facades\Facade;

class ExcelFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'excel';
    }
}
