<?php

use Illuminate\Database\Seeder;
use App\Incident;

class IncidentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incident')->delete();

        Incident::insert(['user_id' => '1', 'incident_date' => '2019-05-05', 'description' => 'FIRE!!', 'cat_id' => 'C1']);
        Incident::insert(['user_id' => '1', 'incident_date' => '2019-05-05', 'description' => 'FIRE!!', 'cat_id' => 'C1']);
        Incident::insert(['user_id' => '2', 'incident_date' => '2019-05-05', 'description' => 'FIRE!!', 'cat_id' => 'C1']);
        Incident::insert(['user_id' => '2', 'incident_date' => '2019-05-05', 'description' => 'FIRE!!', 'cat_id' => 'C2']);
        Incident::insert(['user_id' => '3', 'incident_date' => '2019-05-05', 'description' => 'FIRE!!', 'cat_id' => 'C2']);
        Incident::insert(['user_id' => '3', 'incident_date' => '2019-05-05', 'description' => 'FIRE!!', 'cat_id' => 'C2']);
        Incident::insert(['user_id' => '4', 'incident_date' => '2019-05-05', 'description' => 'FIRE!!', 'cat_id' => 'C3']);
        Incident::insert(['user_id' => '4', 'incident_date' => '2019-05-05', 'description' => 'FIRE!!', 'cat_id' => 'C3']);
        Incident::insert(['user_id' => '5', 'incident_date' => '2019-05-05', 'description' => 'FIRE!!', 'cat_id' => 'C3']);
        Incident::insert(['user_id' => '5', 'incident_date' => '2019-05-05', 'description' => 'FIRE!!', 'cat_id' => 'C4']);
        Incident::insert(['user_id' => '6', 'incident_date' => '2019-05-05', 'description' => 'FIRE!!', 'cat_id' => 'C4']);

    }
}
