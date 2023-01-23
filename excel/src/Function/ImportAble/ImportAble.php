<?php

namespace Khoanguyen\Excel\Function\ImportAble;

class ImportAble implements ImportAbleInterface
{
    public function __construct(
        protected $model,
        protected $data
    ) {
        //
    }

    /**
     * @return mixed
     */
    public function import()
    {
        return $this->model->create($this->data);
    }
}
