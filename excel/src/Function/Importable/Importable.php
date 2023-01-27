<?php

namespace Khoanguyen\Excel\Function\Importable;

use Illuminate\Support\Facades\Log;
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
            while (($row = fgetcsv($handle, null, ";")) !== FALSE) {
                $csv[$i] = array_combine($headers, $row);

                $i++;
            }

            fclose($handle);
        }

        try {
            $data = array_chunk($csv, 100);
            foreach ($data as $items) {
                foreach ($items as $item) {
                    $this->model->insert($item);
                }
            }

            unlink($url);
            return true;
        } catch (\Exception $e) {
            Log::info($e);
            return false;
        }
    }
}
