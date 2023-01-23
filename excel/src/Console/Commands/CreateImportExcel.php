<?php

namespace Khoanguyen\Excel\Console\Commands;

use Illuminate\Console\Command;

class CreateImportExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:import_excel {import_file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make import excel file!';

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $path = app_path() . '/Excel/Import/';
        $fileName = ucfirst($this->argument('import_file'));
        if (! is_dir($path)) {
            mkdir($path, 0777, true);
        }

        if (file_exists($path . $this->argument('import_file') . '.php')) {
            $this->error(__('Class name :file_name is exist !!!!', ['file_name' => $fileName]));
        } else {
            $phpFile = str_contains($fileName, '.php') ? $fileName : $fileName . '.php';
            $myFile = fopen($path . $phpFile , "w") or die("Unable to open file!");

            $content = '';
            $content .= "<?php\n";
            $content .= "\nnamespace App\Excel\Import;\n";
            $content .= "\nuse Khoanguyen\Excel\Function\ImportAble\ImportAble;\n";
            $content .= "\nclass $fileName extends ImportAble";
            $content .= "\n{\n\tpublic function __construct()\n\t{\n\t}\n}\n";

            fwrite($myFile, $content);
            fclose($myFile);

            $this->info(__('Create import class :file_name successfully', ['file_name' => $fileName]));
        }
    }
}
