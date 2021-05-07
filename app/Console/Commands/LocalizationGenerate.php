<?php

namespace App\Console\Commands;

use App\Models\Localization;
use Illuminate\Console\Command;

class LocalizationGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'localization:generate {from} {to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate localization file for language';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $from = $this->argument('from');
        $to = $this->argument('to');
        $fields = Localization::tableFields();

        if (in_array($from, $fields) && in_array($to, $fields)) {
            if ($from != $to) {
                $data = [];
                $localizations = Localization::all();
                foreach ($localizations as $item) {
                    $data[addslashes($item->{$from})] =  addslashes($item->{$to});
                }
                $data = array_filter($data);

                $fileName = $to . '.json';
                file_put_contents(
                    base_path(str_replace('/', DIRECTORY_SEPARATOR, 'resources/lang/' . $fileName)),
                    json_encode($data)
                );
                $this->info('File "' . $fileName . '" generated successfully!');
            } else {
                $this->error('Languages cannot be the same!');
            }
        } else {
            $this->error('Wrong parameters! Accepted values: ' . implode(', ', $fields));
        }
    }
}
