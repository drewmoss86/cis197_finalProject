<?php

use Illuminate\Database\Seeder;
use App\Unit;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('unit')->delete();

        Unit::insert(['id' => '1', 'description' => 'day']);
        Unit::insert(['id' => '2', 'description' => 'use']);
        Unit::insert(['id' => '3', 'description' => 'hour']);
        Unit::insert(['id' => '4', 'description' => 'week']);

    }
}
