<?php

use Illuminate\Database\Seeder;
use App\ResourceProvider;

class ResourceProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //delete's current values and reseeds
        DB::table('resource_provider')->delete();

        ResourceProvider::insert(['user_id' => '5', 'address' => '123 Evergreen Terrace, Springfield, IL 62629']);
        ResourceProvider::insert(['user_id' => '6', 'address' => '234 Evergreen Terrace, Springfield, IL 62629']);
    }
}
