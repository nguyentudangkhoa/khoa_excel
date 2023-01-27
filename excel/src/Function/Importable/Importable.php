<?php

namespace Khoanguyen\Excel\Function\Importable;

use Illuminate\Support\Facades\Storage;

class Importable implements ImportableInterface
{
    public function __construct(
        protected $model,
        protected $file
    ) {
        //
    }

    /**
     * @return mixed
     */
    public function import()
    {
        $fileName = time() . '.' . $this->file->getClientOriginalExtension();
        Storage::disk('public')->put($fileName, file_get_contents($this->file));
        $url = storage_path('/app/public/' . time() . '.' . $this->file->getClientOriginalExtension());
        $csv = [];
        $i = 1;
        if (($handle = fopen($url, "r")) !== false) {
            $headers = fgetcsv($handle, null, ";");
            $columns = [];
            while (($data = fgetcsv($handle, null, ";")) !== FALSE) {
                for ($c=0; $c < count($data); $c++) {
                    array_push($columns, $data);
                }

                $i++;
            }

            foreach ($columns as $column) {
                for ($headerNumber = 0; $headerNumber < count($headers); $headerNumber++) {
                    $csv[$headers[$headerNumber]][]= $column[$headerNumber] ?: '-';
                }
            }

            fclose($handle);
        }
        dd($csv);
        return $this->model->create($this->file);
    }
}
