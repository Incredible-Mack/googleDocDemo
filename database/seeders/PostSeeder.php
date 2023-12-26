<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Database\Factories\Helpers\FactoryHelper;
use Database\Seeders\Traits\DisableForeignKeyCheck;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    use DisableForeignKeyCheck, TruncateTable;
    public function run(): void
    {
        $this->disableforeignkey();
        $this->truncate('posts');
        $posts = Post::factory(5)->create();

        $posts->each(function(Post $post){
            $post->users()->sync(FactoryHelper::getRandomModelId(User::class));
        });

        $this->enableforeignkey();

    }
}
