<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'First User',
            'email'    => 'dev@dangmedia.de',
            'password' => bcrypt('secret'),
        ]);

        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name'     => str_random(10),
                'email'    => str_random(10) . '@dangmedia.de',
                'password' => bcrypt('secret'),
            ]);
        }
    }
}
