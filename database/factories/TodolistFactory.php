<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Todolist::class, function (Faker $faker) {
    return [
        'title'=>$faker->text(50),
        'content'=>$faker->text(191),
        'imagePath'=>$faker->text(191),
        'categoryName'=>$faker->text(50)
    ];
});
