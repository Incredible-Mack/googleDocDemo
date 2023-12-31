<?php

namespace Database\Seeders;

use App\Models\Comment;
use Database\Seeders\Traits\DisableForeignKeyCheck;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     use TruncateTable, DisableForeignKeyCheck;
    public function run(): void
    {
        //

        $this->disableforeignkey();
        $this->truncate('comments');
        Comment::factory(3)->create();
        $this->enableforeignkey();


    }
}
