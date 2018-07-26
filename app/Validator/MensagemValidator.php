<?php

namespace OrgTabajara\Validator;
use OrgTabajara\Mensagem;
use OrgTabajara\Validator\ValidationException;
use Illuminate\Support\Facades\Validator;

class MensagemValidator
{
    public static function validate($dados)
    {
    	$validator = Validator::make($dados, 
    										  Mensagem::$rules, 
    										  Mensagem::$message);
    	if($dados['remetente_id'] == $dados['destinatario_id']) {
    		$validator->errors()->add('destinatario', 
    									'O destinatario deve ser diferente do remetente');
      }
      if(!$validator->errors()->isEmpty())
      	throw new ValidationException($validator, "Erro ao validar a mensagem");
     }
}

