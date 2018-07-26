<?php

namespace OrgTabajara\Validator;
use OrgTabajara\Funcionario;

class FuncionarioValidator
{
    public static function validate($dados)
    {
        $validator = \Validator::make($dados, 
                                      Funcionario::$rules,
                                      Funcionario::$messages);
        if(!$validator->errors()->isEmpty()) {
      	throw new ValidationException($validator, "Erro ao validar o funcionario");
        }
    }
}

