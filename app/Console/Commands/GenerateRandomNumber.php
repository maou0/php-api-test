<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Console\Command\Command as CommandAlias;

class GenerateRandomNumber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'number:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a random number';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::withHeaders(['Content-Type' => 'application/json'])->post('http://nginx:80/api/v1/numbers');
        $this->info("Random number has been successfully generated");

        return CommandAlias::SUCCESS;
    }
}
