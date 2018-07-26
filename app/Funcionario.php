<?php

namespace OrgTabajara;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Funcionario extends Authenticatable
{
    protected $fillable = ['nome', 'apelido', 'password', 'departamento_id'];
    protected $hidden = ['password', 'remember_token'];
    
    public static $rules = [
    	'departamento_id' => 'required',
    	'nome' => 'required|min:10',
    	'apelido' => 'required|unique:funcionarios',
    	'password' => 'required|string|min:6|confirmed',
    ];
    
    public static $messages = [
    	'required' => 'O campo :attribute é obrigatório',
    	'nome.min' => 'O campo nome deve ter ao menos 10 letras',
    ];
    
    public function departamento() {
			return $this->belongsTo('OrgTabajara\Departamento');    
    }
    
    public function caixasaida() {
			return $this->hasMany('OrgTabajara\Mensagem', 'remetente_id');    
    }
    
    public function caixaentrada() {
			return $this->hasMany('OrgTabajara\Mensagem', 'destinatario_id');    
    }
    
    public function enviarMensagemPara($funcionario, $titulo, $texto){
    	$mensagem = new Mensagem;
    	$mensagem->titulo = $titulo;
    	$mensagem->texto = $texto;
    	$mensagem->destinatario()->associate($funcionario);
    	$this->caixasaida()->save($mensagem);
    }
}
