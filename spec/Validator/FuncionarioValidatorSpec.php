<?php

namespace spec\OrgTabajara\Validator;

use OrgTabajara\Validator\FuncionarioValidator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use OrgTabajara\Funcionario;
use PhpSpec\Laravel\LaravelObjectBehavior;

class FuncionarioValidatorSpec extends LaravelObjectBehavior
{
	
	
    function it_is_initializable()
    {
        $this->shouldHaveType(FuncionarioValidator::class);
    }
    
    function let() {
    	 \Artisan::call("migrate");
    	 //\Artisan::call("db:seed");	
	 }
	     
    function it_o_nome_do_funcionario_eh_obrigatorio() {
			$funcionario = new Funcionario;
			$funcionario->nome = "";
			$funcionario->apelido = "ze";
			$funcionario->departamento_id = 1;
			
			$this->shouldThrow('OrgTabajara\Validator\ValidationException')
				  ->duringValidate($funcionario->toArray());    
    }
    
    function it_o_apelido_do_funcionario_eh_obrigatorio() {
			$funcionario = new Funcionario;
			$funcionario->nome = "Igor Medeiros Vanderlei";
			$funcionario->apelido = "";
			$funcionario->departamento_id = 1;
			
			$this->shouldThrow('OrgTabajara\Validator\ValidationException')
				  ->duringValidate($funcionario->toArray());    
    }
}
