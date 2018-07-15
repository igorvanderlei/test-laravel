<?php

namespace OrgTabajara\Http\Controllers;


use Illuminate\Http\Request;
use OrgTabajara\Http\Requests\MensagemRequest;
use OrgTabajara\Repository\MensagemRepository;

class MensagemController extends Controller
{
	
    public function store(Request $request){
    	$repository = new MensagemRepository();
    	$repository->store($request->all());
    		return "ok";
    }
}
