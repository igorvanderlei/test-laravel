<?php

use Faker\Generator as Faker;
use OrgTabajara\Mensagem;
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

$factory->define(Mensagem::class, function (Faker $faker) {
	$id2 = $id1 = $faker->numberBetween(1,4);
	while($id2 == $id1) {
		$id2 = $faker->numberBetween(1,4);	
	}
    return [
        'titulo' => $faker->realText(rand(10, 20)),
        'texto' => $faker->realText(rand(100, 200)),
        'remetente_id' => $id1,
        'destinatario_id' => $id2,
    ];
});

/*
$factory->afterMaking(OrgTabajara\Mensagem::class, function ($mensagem, Faker $faker) {
	
//	$remetente = OrgTabajara\Funcionario::find($id1);
	//$destinatario = OrgTabajara\Funcionario::find($id2);
//	$mensagem->remetente()->associate($remetente);
//	$mensagem->destinatario()->associate($destinatario);
	//$mensagem->save();			
});*/