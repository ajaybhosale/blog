<?php

use Illuminate\Database\Seeder;

class UsersTableDataSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'name' => 'swati', 'username' => 'swati', 'email' => 'swati.jadhav@silicus.com', 'password' => bcrypt('carrotz124')],
            ['id' => 2, 'name' => 'ajay', 'username' => 'ajay', 'email' => 'ajay.bhosale@silicus.com', 'password' => bcrypt('carrotz124')],
        ];

        DB::table('users')->insert($users);
    }

}
