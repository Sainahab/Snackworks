<?php

// app/Console/Commands/RestoreDatabaseCommand.php

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class RestoreDatabaseCommand extends Command
{
    protected $signature = 'db:restore';

    protected $description = 'Restore MySQL database from backup';

    public function handle()
    {

        $sourcePath = storage_path('app/backups/pictures');
        $destinationPath = base_path("/../public_www/storage/Default");
        File::deleteDirectory($destinationPath);

        //create folder of back up
        mkdir(base_path("/../public_www/storage/Default"), 0777, true);

        // Get all files from the source folder
        $files = File::allFiles($sourcePath);

        // Loop through each file and copy it to the destination folder
        foreach ($files as $file) {
            // Get the file name
            $fileName = $file->getFilename();

            // Copy the file to the destination folder
            File::copy($file->getPathname(), $destinationPath . '/' . $fileName);
        }
           // Disable foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=0');

    // Drop all tables in the database
    $tables = DB::select('SHOW TABLES');
    foreach ($tables as $table) {
        $tableName = reset($table);
        DB::statement('DROP TABLE IF EXISTS ' . $tableName);
    }

    // Enable foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Remove existing data from all tables in the database
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            $table = reset($table);
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Restore database from backup
        $backupPath = storage_path('app/backups/database/backup.sql'); // Update with your backup file path
        DB::unprepared(file_get_contents($backupPath));

        $this->info('MySQL & Pictures restored from backup successfully!');
    }
}
