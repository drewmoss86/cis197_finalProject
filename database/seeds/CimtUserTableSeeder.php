<?php

use Illuminate\Database\Seeder;
use App\CimtUser; //reference CimtUser model

class CimtUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete's current values and reseeds
        DB::table('cimt_user')->delete();

        CimtUser::insert(['user_id' => '3', 'phone' => '555-555-5555']);
        CimtUser::insert(['user_id' => '4', 'phone' => '555-556-5556']);
    }
}
