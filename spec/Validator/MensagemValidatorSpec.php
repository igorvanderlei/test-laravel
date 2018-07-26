<?php

namespace spec\OrgTabajara\Validator;

use OrgTabajara\Validator\MensagemValidator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use PhpSpec\Laravel\LaravelObjectBehavior;
use OrgTabajara\Mensagem;

class MensagemValidatorSpec extends LaravelObjectBehavior
{
	

    function it_is_initializable()
    {
        $this->shouldHaveType(MensagemValidator::class);
    }
    
    function let() {
    	 \Artisan::call("migrate:refresh");
    	 \Artisan::call("db:seed");	
	 }
	
    function its_funcionario_nao_pode_enviar_uma_mensagem_para_si_mesmo() {
 
   	$mensagem = factory(\OrgTabajara\Mensagem::class)->make();
		$mensagem->destinatario_id = $mensagem->remetente_id;

		$this->shouldThrow('OrgTabajara\Validator\ValidationException')
			->duringValidate($mensagem->toArray()); 
    }
    
    function its_texto_deve_ter_o_minimo_de_caracteres(){

    	$mensagem = factory(\OrgTabajara\Mensagem::class)->make();
    	$mensagem->texto = "teste";	
    		 
		$this->shouldThrow('OrgTabajara\Validator\ValidationException')
			->duringValidate($mensagem->toArray()); 
    }
}
