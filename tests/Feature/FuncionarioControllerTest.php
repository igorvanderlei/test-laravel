<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use OrgTabajara\Funcionario;
use OrgTabajara\Validator\FuncionarioValidator;


class FuncionarioControllerTest extends TestCase
{
    
    public function tearDown() {
    	\Mockery::close();
    } 
    
    public function testeCadastrarComDadosCorretos()
    {
    	$f = new Funcionario([
				'nome' => "Igor Medeiros",
				'apelido' => "Igor"    	
    	]);
    	$f->departamento = 1;
    	
    	$funcionarioMock = \Mockery::mock('OrgTabajara\Funcionario');
    	$funcionarioMock->shouldReceive('save')->once();
    	$funcionarioMock->shouldReceive('fill')->once();
    	
    	$this->app->instance('OrgTabajara\Funcionario', $funcionarioMock);
    	
    	$response = $this->call('POST', 'funcionario/store', $f->toarray());
      $response->assertSee("ok");
    }
    
    public function testeCadastrarComErro() {
    	$f = new Funcionario([
				'nome' => "",
				'apelido' => "Igor"    	
    	]);
    	$f->departamento = 1;
    	
    	$funcionarioMock = \Mockery::mock('OrgTabajara\Funcionario');
    	$funcionarioMock->shouldNotReceive('save');
    	$this->app->instance('OrgTabajara\Funcionario', $funcionarioMock);
    	
    	$response = $this->call('POST', 'funcionario/store', $f->toarray());
      $response->assertSee("exception");    	
    }
}
