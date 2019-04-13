<?php

use Faker\Generator as Faker;
use App\Person;
use App\User;

$factory->define(Person::class, function (Faker $faker) {
    return [
        //
        'nama' => $faker->name,
        'nip' => str_random(16),
        'role_id' => $faker->randomElement(['1', '2','3','4','5','6']),
        'is_active' => 1,
        'user_id'=>function () { return factory(User::class)->create()->id; }
    ];
});
