<?php

use Faker\Generator as Faker;


/** @var TYPE_NAME $factory */
$factory->define(\App\category::class, function (Faker $faker) {
    return [
        'category_name'=>$faker->word,
        'category_description'=>$faker->text,
        'publication_status'=>$faker->boolean(),
    ];
});
