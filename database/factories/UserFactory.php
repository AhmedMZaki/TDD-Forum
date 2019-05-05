<?php

use App\User;
use App\Reply;
use App\Thread;
use App\Channel;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Channel::class,function (Faker $faker){
    $name = $faker->word;

    return [
      'name' => $name,
      'slug' => str_slug($name),
    ];
});

$factory->define(Thread::class, function (Faker $faker) {
    return [
       'user_id' => function(){
        return factory(User::class)->create()->id;
      },
        'channel_id' => function(){
        return factory(Channel::class)->create()->id;
    },
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
    ];
});

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory('App\User')->create()->id;
        } ,
        'thread_id' => function(){
            return factory('App\Thread')->create()->id;
        } ,
        'body' => $faker->paragraph,
    ];
});
