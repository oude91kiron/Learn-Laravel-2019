<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Create 10 user and for each one create a post
        factory('App\User', 10)->create()->each(function($user) {

            $user->posts()->save(factory('App\Post')->make());

        });



        // // Create 10 posts for a one user.
        // factory('App\User')->create()->each(function($user) {

            
        //     for($i=0; $i<16; $i++) {

        //     $user->posts()->save(factory('App\Post')->make());
            
        //     }
        // });
    }
}
