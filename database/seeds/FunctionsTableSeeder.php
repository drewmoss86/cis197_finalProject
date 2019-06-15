<?php

use Illuminate\Database\Seeder;
use App\Functions;

class FunctionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('functions')->delete();

        Functions::insert(['id' => '1', 'description' => 'transportation']);
        Functions::insert(['id' => '2', 'description' => 'communications']);
        Functions::insert(['id' => '3', 'description' => 'engineering']);
        Functions::insert(['id' => '4', 'description' => 'search and rescue']);
        Functions::insert(['id' => '5', 'description' => 'education']);
        Functions::insert(['id' => '6', 'description' => 'energy']);
        Functions::insert(['id' => '7', 'description' => 'firefighting']);
        Functions::insert(['id' => '8', 'description' => 'human services']);

    }
}
