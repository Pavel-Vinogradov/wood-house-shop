<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Exception;

final class TruncateAllExceptUsers extends Command
{
    protected $signature = 'db:truncate-except-users';
    protected $description = 'Truncate all tables except users';

    public function handle(): int
    {
        $tables = [
            'categories',
            'products',
            'posts',
            'orders',
            'cache',
            'jobs',
            'job_batches',
            'failed_jobs',
            'sessions',
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($tables as $table) {
            try {
                DB::table($table)->truncate();
                $this->info("Table {$table} truncated successfully.");
            } catch (Exception $e) {
                $this->warn("Table {$table} does not exist or could not be truncated.");
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->info('All tables except users have been truncated.');

        return self::SUCCESS;
    }
}
