<?php

use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dep = OrgTabajara\Departamento::find(1);
        $f = new OrgTabajara\Funcionario(['nome' => 'José da Silva', 'apelido' => 'ze']);
        $dep->funcionarios()->save($f);
        $f = new OrgTabajara\Funcionario(['nome' => 'Maria Aparecida', 'apelido' => 'maria']);
        $dep->funcionarios()->save($f);
        
        $dep = OrgTabajara\Departamento::find(2);
		  $f = new OrgTabajara\Funcionario(['nome' => 'João Mamão', 'apelido' => 'mamao']);
        $dep->funcionarios()->save($f);
        $f = new OrgTabajara\Funcionario(['nome' => 'Ana Beatriz', 'apelido' => 'bia']);
        $dep->funcionarios()->save($f);                
        
        
        
        
    }
}
