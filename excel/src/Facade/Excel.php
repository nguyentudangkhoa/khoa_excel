<?php

namespace Khoanguyen\Excel\Facade;

class Excel
{
    /**
     * @param $class
     * @param $table
     * @param  $file
     * @return mixed
     */
    public function importExcel($class, $table, $file): mixed
    {
        $instance = new $class($table, $file);
        return $instance->saveData();
    }
}
