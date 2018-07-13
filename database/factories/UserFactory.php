<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(OrgTabajara\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(OrgTabajara\Mensagem::class, function (Faker $faker) {
    return [
        'titulo' => $faker->realText(rand(10, 20)),
        'texto' => $faker->realText(rand(100, 200))
    ];
});

$factory->afterMaking(OrgTabajara\Mensagem::class, function ($mensagem, Faker $faker) {
	$remetente = OrgTabajara\Funcionario::find($faker->numberBetween(1,4));
	$destinatario = OrgTabajara\Funcionario::find($faker->numberBetween(1,4));
	$mensagem->remetente()->associate($remetente);
	$mensagem->destinatario()->associate($destinatario);
	$mensagem->save();			
});