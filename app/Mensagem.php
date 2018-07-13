<?php

namespace OrgTabajara;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $fillable = ['titulo', 'texto'];
    
    public function remetente() {
			return $this->belongsTo('OrgTabajara\Funcionario', 'remetente_id');    
    }
    
    public function destinatario() {
			return $this->belongsTo('OrgTabajara\Funcionario', 'destinatario_id');    
    }
}
