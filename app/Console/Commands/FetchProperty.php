<?php

namespace App\Console\Commands;

use App\Services\PropertyService;
use Illuminate\Console\Command;

class FetchProperty extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'property:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and save Property and Property Type';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        resolve(PropertyService::class)->makeRequest();
        return Command::SUCCESS;
    }
}
