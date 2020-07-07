<?php

namespace App\Console\Commands;

use App\Services\ClientService;
use Illuminate\Console\Command;
use Exception;

class CreateClientCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'client:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating client';

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
     * @return void
     */
    public function handle(ClientService $clientService)
    {
        $name = $this->ask('Enter name:');
        try {
            $client = $clientService->create($name);
        } catch (Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            exit();
        }

        $this->info("Client name: $client->name");
        $this->info("Client key: $client->key");
    }
}
