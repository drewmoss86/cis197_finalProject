<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->delete();

        Category::insert(['id' => 'C1', 'description' => 'must evac, secure lockdown']); 
        Category::insert(['id' => 'C2', 'description' => 'may evac, secure lockdown']); 
        Category::insert(['id' => 'C3', 'description' => 'no evac, limited lockdown']);
        Category::insert(['id' => 'C4', 'description' => 'no evac, no lockdown']);
    }
}
