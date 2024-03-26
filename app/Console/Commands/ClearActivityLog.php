<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClearActivityLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-activity-log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear the activity_log table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Menghapus semua data dari tabel activity_log
        DB::table('activity_log')->truncate();

        $this->info('Activity log table has been cleared.');
    }
}
