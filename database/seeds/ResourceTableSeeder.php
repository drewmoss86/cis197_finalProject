<?php

use Illuminate\Database\Seeder;
use App\Resource;

class ResourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resource')->delete();

        Resource::insert(['func_id' => '1', 'name' => 'Quinjet', 'description' => 'SHIELD jet used for transportation', 'capabilities' => 'flight,gatling gun,missles,', 'distance_from_pcc' => '10.1', 'cost' => '500.40', 'per' => 'day', 'user_id' => '1']);
        Resource::insert(['func_id' => '2', 'name' => 'Hulkbuster', 'description' => 'Built to restrain the Hulk', 'capabilities' => 'waterhose,ladder,axe,', 'distance_from_pcc' => '10.2', 'cost' => '510.40', 'per' => 'hour', 'user_id' => '1']);
        Resource::insert(['func_id' => '3', 'name' => 'Helicarrier', 'description' => 'Mobile SHIELD HQ', 'capabilities' => 'waterhose,ladder,axe,', 'distance_from_pcc' => '10.3', 'cost' => '520.40', 'per' => 'hour', 'user_id' => '2']);
        Resource::insert(['func_id' => '4', 'name' => 'Milano', 'description' => 'Ravager ship', 'capabilities' => 'waterhose,ladder,axe,', 'distance_from_pcc' => '10.4', 'cost' => '530.40', 'per' => 'use', 'user_id' => '2']);
        Resource::insert(['func_id' => '5', 'name' => 'Batmobile', 'description' => 'Batman\'s ground vehicle', 'capabilities' => 'waterhose,ladder,axe,gun', 'distance_from_pcc' => '10.5', 'cost' => '540.40', 'per' => 'use', 'user_id' => '3']);
        Resource::insert(['func_id' => '6', 'name' => 'Millennium Falcon', 'description' => 'Corellian light freighter', 'capabilities' => 'waterhose,ladder,axe,pepper', 'distance_from_pcc' => '10.6', 'cost' => '550.40', 'per' => 'week', 'user_id' => '3']);
        Resource::insert(['func_id' => '7', 'name' => 'X-Wing', 'description' => 'Rebel starfighter', 'capabilities' => 'waterhose,ladder,axe,shield', 'distance_from_pcc' => '10.7', 'cost' => '560.40', 'per' => 'week', 'user_id' => '4']);
        Resource::insert(['func_id' => '8', 'name' => 'TIE Fighter', 'description' => 'Imperial starfighter', 'capabilities' => 'waterhose,ladder,axe,sword', 'distance_from_pcc' => '10.8', 'cost' => '570.40', 'per' => 'day', 'user_id' => '4']);
        Resource::insert(['func_id' => '1', 'name' => 'Slave 1', 'description' => '', 'capabilities' => 'waterhose,ladder,axe,flare', 'distance_from_pcc' => '10.9', 'cost' => '580.40', 'per' => 'minutes', 'user_id' => '5']);
        Resource::insert(['func_id' => '1', 'name' => 'Imperial Star Destroyer', 'description' => 'asdasdfasdfasdf', 'capabilities' => 'ion cannon,tractor beam,ion shield,hyperdrive', 'distance_from_pcc' => '11.1', 'cost' => '590.40', 'per' => 'minutes', 'user_id' => '5']);
        Resource::insert(['func_id' => '1', 'name' => 'test7', 'description' => 'asdasdfasdfasdf', 'capabilities' => 'waterhose,ladder,axe,', 'distance_from_pcc' => '11.2', 'cost' => '600.40', 'per' => 'hour', 'user_id' => '6']);
    }
}
