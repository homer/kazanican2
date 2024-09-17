<?php

namespace App\Console\Commands;

use App\Events\ExportFinishedEvent;
use Illuminate\Console\Command;

class ExporterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:exporter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $userId = $this->ask('What is the user id?');
        event(new ExportFinishedEvent($userId));
    }
}
