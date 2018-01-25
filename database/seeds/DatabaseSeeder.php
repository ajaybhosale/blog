<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        $this->call('PostsTableSeeder');
        $this->call('CommentsTableSeeder');
    }

}

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'name' => 'swati', 'username' => 'swati', 'email' => 'swati.jadhav@silicus.com', 'password' => app('hash')->make('carrotz124')],
            ['id' => 2, 'name' => 'ajay', 'username' => 'ajay', 'email' => 'ajay.bhosale@silicus.com', 'password' => app('hash')->make('carrotz124')],
        ];

        DB::table('users')->insert($users);
    }

}

class CommentsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            ['id' => 1, 'comment_content' => 'For test comment', 'user_id' => 1, 'post_id' => 1],
            ['id' => 2, 'comment_content' => 'For rest api comment', 'user_id' => 2, 'post_id' => 2],
        ];

        DB::table('comments')->insert($comments);
    }

}

class PostsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            ['id' => 1, 'post_title' => 'Test', 'post_content' => 'For testing!', 'user_id' => 1],
            ['id' => 2, 'post_title' => 'Rest API', 'post_content' => 'For Rest API testing!', 'user_id' => 1],
        ];

        DB::table('posts')->insert($posts);
    }

}
