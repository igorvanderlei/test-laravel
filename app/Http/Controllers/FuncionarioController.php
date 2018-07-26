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
		//$this->middleware('autorizacao');
		//$this->middleware('auth', ['only' => ['create', 'store']]);
	}
	
	public function create() {
		$this->authorize('create', \OrgTabajara\Funcionario::class);		
		
		$departamentos = \OrgTabajara\Departamento::all();
		return view('funcionario.cadastrar', [
			'departamentos' => $departamentos
				]);		
	}
   
    public function store(Request $request) {
    		try {    		
			  //$this->authorize('create', $this->funcionario);
    			FuncionarioValidator::validate($request->all());
    			
    			$this->funcionario->fill($request->all());
    			$this->funcionario->save();
    			return redirect("/");
    		} catch(ValidationException $e) {
    			return redirect("/funcionario/create")
							->withErrors($e->getValidator())
							->withInput();
    		}
    }
    
    public function all() {
			$funcionarios = $this->funcionario->paginate(2);
			return view('funcionario.listar', ['funcionarios' => $funcionarios]);   
    }
    
    public function show($id) {
    }
    
    public function edit($id) {
    }
    
    public function delete($id) {
    }
}
