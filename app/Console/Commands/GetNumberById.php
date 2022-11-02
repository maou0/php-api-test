<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetNumberById extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'number:get {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets a specific number by id';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('id');
        $response = Http::withHeaders(['Content-Type' => 'application/json'])->get('http://nginx:80/api/v1/numbers/'. $id);
        $this->info('Requested number is: ' . $response['value']);

        return Command::SUCCESS;
    }
}
