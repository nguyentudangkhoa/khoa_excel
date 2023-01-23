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
        $instance = new $class($table, $data);
        return $instance->saveData();
    }

    public function test()
    {
        dd('asdasd');
    }
}
