<?php

namespace spec\OrgTabajara\Validator;

use OrgTabajara\Validator\MensagemValidator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MensagemValidatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(MensagemValidator::class);
    }
    
    function its_texto_deve_ter_o_minimo_de_caracteres(){
		$texto = "Teste";
		$titulo = "Teste de Mensagem";
    	$remetente = "ze";
    	$destinatario = "mane";		
		
		$this->shouldThrow('\InvalidArgumentException')
			->duringValidate($titulo, $texto, $remetente, $destinatario);
    }
    
    function its_texto_deve_ter_o_maximo_de_caracteres(){
    	$faker = \Faker\Factory::create('pt_BR');
    	$texto = $faker->realText(rand(201, 300));
    	$titulo = "Teste de Mensagem";
    	$remetente = "ze";
    	$destinatario = "mane";		
    		 
		$this->shouldThrow('\InvalidArgumentException')
			->duringValidate($titulo, $texto, $remetente, $destinatario);    
    }
    function its_remetente_deve_ser_diferente_do_destinatario() {
    	$faker = \Faker\Factory::create('pt_BR');
    	$texto = $faker->realText(rand(11, 200));
    	$titulo = "Teste de Mensagem";
    	$remetente = 1;
    	$destinatario = 1;
    	
    	$this->shouldThrow('\InvalidArgumentException')
			->duringValidate($titulo, $texto, $remetente, $destinatario);    
    
    }
    
    function its_titulo_nao_nulo() {
      $faker = \Faker\Factory::create('pt_BR');
    	$texto = $faker->realText(rand(11, 200));
    	$titulo = "";
    	$remetente = 1;
    	$destinatario = 2;
    	
    	$this->shouldThrow('\InvalidArgumentException')
			->duringValidate($titulo, $texto, $remetente, $destinatario);
    }
}
