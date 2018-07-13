<?php

use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	OrgTabajara\Departamento::create(['descricao' => 'financeiro']);
       	OrgTabajara\Departamento::create(['descricao' => 'rh']);
       	OrgTabajara\Departamento::create(['descricao' => 'vendas']);
       	OrgTabajara\Departamento::create(['descricao' => 'producao']);
    }
}
