<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClearPassResetToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-password-reset-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear the password_reset_tokens table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Menghapus semua data dari tabel activity_log
        DB::table('password_reset_tokens')->truncate();

        $this->info('Password reset tokens table has been cleared.');
    }
}
