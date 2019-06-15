<?php

use Illuminate\Database\Seeder;
use App\Admin; //need to extend admin class

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admin')->delete();

        Admin::insert(['user_id' => '1', 'email' => 'tstark@avengers.com']);
        Admin::insert(['user_id' => '2', 'email' => 'bwayne@justiceleague.com']);

    }
}
