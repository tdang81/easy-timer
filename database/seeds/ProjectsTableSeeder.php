<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

/**
 * Class ProjectsTableSeeder
 */
class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstUserId = User::where('name', 'First User')->first()->id;

        DB::table('projects')->insert([
            'name'    => 'First Timer Project',
            'user_id' => $firstUserId
        ]);

        for ($i = 0; $i < 5; $i++) {
            DB::table('projects')->insert([
                'name'    => str_random(10),
                'user_id' => $firstUserId,
            ]);
        }
    }
}
