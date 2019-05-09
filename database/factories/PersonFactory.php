<?php

use Faker\Generator as Faker;
use App\Person;
use App\User;

$factory->define(Person::class, function (Faker $faker) {
    return [
        //
        'nama_depan' => $faker->name,
        'nama_belakang'=>'test',
        'nip' => str_random(16),
        'role_id' =>100,
        'is_active' => 1,
        'user_id'=>function () { return factory(User::class)->create()->id; }
    ];
});
