<?php

namespace OrgTabajara;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['nome', 'apelido'];
    public static $rules = [
    	'departamento' => 'required',
    	'nome' => 'required|min:10',
    	'apelido' => 'required'
    ];
    
    public static $messages = [
    	'required' => 'O campo :attribute é obrigatório',
    	'nome.min' => 'O campo nome deve ter ao menos 10 letras',
    ];
    
    public function departamento() {
			return $this->belogsTo('OrgTabajara\Departamento');    
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
