<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\User::class, 15)->create()->each(function ($u) {
          $u->person()->save(factory(App\Person::class)->make());
        });

       // factory(App\Person::class, 50)->create();
    }
}
