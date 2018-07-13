<?php

namespace OrgTabajara;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['nome', 'apelido'];
    
    public function departamento() {
			return $this->belogsTo('OrgTabajara\Departamento');    
    }
    
    public function caixasaida() {
			return $this->hasMany('OrgTabajara\Mensagem', 'remetente_id');    
    }
    
    public function caixaentrada() {
			return $this->hasMany('OrgTabajara\Mensagem', 'destinatario_id');    
    }
}
