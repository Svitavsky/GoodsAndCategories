<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Goods;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Goods::class, function (Faker $faker) {
    $name = ucfirst($faker->words(3, true));
    $slug = Str::slug($name);
    $categories = Category::all()->pluck('id')->toArray();
    $extensions = ['jpg', 'png', 'svg'];
    $extension = $extensions[array_rand($extensions)];

    return [
        'name' => $name,
        'description' => $faker->text(),
        'image' => url('/') . "/{$slug}.{$extension}",
        'category_id' => array_rand($categories)
    ];
});
