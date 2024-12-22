<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TruncateTablesSeeder extends Seeder
{
    public function run(): void
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // // List all the tables you want to truncate
        // DB::table('roles')->truncate();
        // DB::table('users')->truncate();
        // DB::table('posts')->truncate();
        // DB::table('comments')->truncate();
        // // Add other tables as needed

        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

