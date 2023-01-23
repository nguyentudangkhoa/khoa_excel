<?php

namespace Khoanguyen\Excel\Function\ImportAble;

class ImportAble implements ImportAbleInterface
{
    public function __construct(
        protected $model,
        protected $data,

    ) {
    }

    public function import()
    {

    }
}
