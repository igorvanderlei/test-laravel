<?php

namespace OrgTabajara;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['descricao'];
    
    public function funcionarios() {
			return $this->hasMany('OrgTabajara\Funcionario'); 
    }
}
