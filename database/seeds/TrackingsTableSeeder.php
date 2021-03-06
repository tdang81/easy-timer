<?php

use Illuminate\Database\Seeder;
use App\Project;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

/**
 * Class TrackingsTableSeeder
 */
class TrackingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstProjectId = Project::where('name', 'First Timer Project')->first()->id;

        DB::table('trackings')->insert([
            'name'    => 'First Timer Entry',
            'project_id' => $firstProjectId,
            'start_datetime' => Carbon::now()
        ]);

        for ($i = 0; $i < 5; $i++) {
            DB::table('trackings')->insert([
                'name'    => str_random(10),
                'project_id' => $firstProjectId,
            ]);
        }
    }
}
