<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //hashing password
        $password = '12345';
        $hashedPassword = Hash::make($password);

        //delete's current values and reseeds
        DB::table('user')->delete();

        User::insert(['name' => 'Tony Stark', 'username' => 'ironman', 'password' => $hashedPassword, 'user_icon' => 'noimage.jpg']);
        User::insert(['name' => 'Bruce Wayne', 'username' => 'batman', 'password' => $hashedPassword, 'user_icon' => 'noimage.jpg']);
        User::insert(['name' => 'Bruce Banner', 'username' => 'hulk', 'password' => $hashedPassword, 'user_icon' => 'noimage.jpg']);
        User::insert(['name' => 'Peter Parker', 'username' => 'spiderman', 'password' => $hashedPassword, 'user_icon' => 'noimage.jpg']);
        User::insert(['name' => 'Clark Kent', 'username' => 'superman', 'password' => $hashedPassword, 'user_icon' => 'noimage.jpg']);
        User::insert(['name' => 'Dick Grayson', 'username' => 'robin', 'password' => $hashedPassword, 'user_icon' => 'noimage.jpg']);
    }
}
