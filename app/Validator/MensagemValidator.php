<?php

namespace OrgTabajara\Validator;

class MensagemValidator
{
	const MIN = 10;
	const MAX = 200;
    public function validate($titulo, $texto, $remetente, $destinatario)
    {
        if(strlen($texto) < self::MIN)
        		throw new \InvalidArgumentException("O texto deve ter ". self::MIN ." caracteres");
        if(strlen($texto) > self::MAX)
        		throw new \InvalidArgumentException("O texto deve ter ". self::MAX ." caracteres");
        if($remetente == $destinatario)
        		throw new \InvalidArgumentException("Remetente diferente do destinatario");
        if($titulo == "")
        		throw new \InvalidArgumentException("Titulo vazio");        		
    }
}
