<?php

namespace Khoanguyen\Excel\Facade;

class Excel
{
    public function importExcel($class)
    {
        return new $class();
    }
}
