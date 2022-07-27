<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExpiredPaymentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:set-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command untuk membuat payment menjadi expired';

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
     * @return int
     */
    public function handle()
    {
        // coding command kita
        $this->info('Command berhasil dijalankan nih!');
    }
}
