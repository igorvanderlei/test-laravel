<?php

namespace OrgTabajara\Http\Controllers;

use Illuminate\Http\Request;
use OrgTabajara\Funcionario;
use OrgTabajara\Validator\FuncionarioValidator;
use OrgTabajara\Validator\ValidationException;

class FuncionarioController extends Controller
{
	protected $funcionario;
	 
	public function __construct(Funcionario $funcionario) {
		$this->funcionario = $funcionario;
	}
	
    public function store(Request $request) {
			try {    		
    			FuncionarioValidator::validate($request->all());
    			$this->funcionario->fill($request->all());
    			$this->funcionario->save();
    			return "ok";
    		} catch(ValidationException $e) {
				return "exception";
    		}
    }
}
