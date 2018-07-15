<?php

namespace OrgTabajara;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $fillable = ['titulo', 'texto'];
	 public static $rules = [
	 	'titulo' => 'required',
	 	'texto' => 'required|min:10|max:200',
	 ]; 
	 public static $message = [
	 	'required' => 'O campo :attribute é obrigatório'
	 ];   
    
    public function remetente() {
			return $this->belongsTo('OrgTabajara\Funcionario', 'remetente_id');    
    }
    
    public function destinatario() {
			return $this->belongsTo('OrgTabajara\Funcionario', 'destinatario_id');    
    }
}
