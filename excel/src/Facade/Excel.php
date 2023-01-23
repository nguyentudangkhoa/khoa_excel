<?php

namespace Khoanguyen\Excel\Facade;

class Excel
{
    /**
     * @param $class
     * @param $table
     * @param  array  $data
     * @return mixed
     */
    public function importExcel($class, $table, $data = [])
    {
        return new $class($table, $data);
    }
}
