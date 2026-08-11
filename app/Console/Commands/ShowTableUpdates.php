<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class ShowTableUpdates extends Command
{
    protected $signature = 'db:show-updates {--since=}';
    protected $description = 'Show last updated_at timestamp for all tables in the database, optionally filtered by time';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'app:show-table-updates';

    /**
     * The console command description.
     *
     * @var string
     */
    //protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $dbName = env('DB_DATABASE');
        $sinceOption = $this->option('since');
        $sinceTime = null;
        // Parse the --since option if provided
        if ($sinceOption) {
            try {
                $sinceTime = Carbon::now()->sub($this->parseTimeString($sinceOption));
            } catch (\Exception $e) {
                $this->error("Invalid --since format. Use like: 2days, 5hours, 30minutes");
                return;
            }
        }

        // Get all table names
        $tables = DB::select("SHOW TABLES");
        if (empty($tables)) {
            $this->error('No tables found in the database.');
            return;
        }

        //$key = "Tables_in_{$dbName}";
        $key = array_key_first((array) $tables[0]); // dynamically get the column name

        $results = [];

        foreach ($tables as $table) {
            $tableName = $table->$key;

            // Only check tables that have updated_at column
            if (Schema::hasColumn($tableName, 'updated_at')) {
                $query = DB::table($tableName);

                if ($sinceTime) {
                    $query->where('updated_at', '>=', $sinceTime);
                }

                $lastUpdate = $query->max('updated_at');

                if ($lastUpdate) {
                    $results[] = [
                        'Table' => $tableName,
                        'Last Update' => $lastUpdate
                    ];
                }
            }
        }

        // Sort by last update descending
        usort($results, fn($a, $b) => strcmp($b['Last Update'], $a['Last Update']));

        if (empty($results)) {
            $this->info('No updates found for the given filter.');
            return;
        }
        $this->table(['Table', 'Last Update'], $results);

    }
    /**
     * Parse a time string like "2days", "5hours", "30minutes"
     */

    private function parseTimeString(string $timeString): Carbon
    {
        $timeString = strtolower(trim($timeString));

        if (preg_match('/^(\d+)\s*(day|days|hour|hours|minute|minutes)$/', $timeString, $matches)) {
            $value = (int)$matches[1];
            $unit = rtrim($matches[2], 's'); // singular form
            return Carbon::now()->sub($unit, $value);
        }

        throw new \InvalidArgumentException("Invalid --since format. Use like: 2days, 5hours, 30minutes");
    }
}
