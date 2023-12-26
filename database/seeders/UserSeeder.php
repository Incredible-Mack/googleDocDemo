<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Traits\DisableForeignKeyCheck;
use Database\Seeders\Traits\TruncateTable;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    use DisableForeignKeyCheck, TruncateTable;
    public function run(): void
    {
        $this->disableforeignkey();
        $this->truncate('users');
        $user = User::factory(10)->create();
        $this->enableforeignkey();

        // \App\Models\User::factory(10)->create();
    }
}
