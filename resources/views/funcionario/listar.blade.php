@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('funcionario.cadastrar') }}</div>

                <div class="card-body">
                <table class="tini table table table-hover table-striped table-bordered" id="predio-table"  >
						 <thead>
						   <td>Nome</td>
						   <td>Apelido</td>
						   <td>Departamento</td>
						   <td></td>
						   <td></td>
						   <td></td>
						 </thead>
						
						</thead>
						
						@foreach ($funcionarios as $funcionario)
						<tbody>
						  <tr >
						    <td> {{$funcionario->nome}}  </td>
						    <td> {{$funcionario->apelido}}  </td>
						    <td> {{$funcionario->departamento->descricao}}  </td>
						    <td>
						     <a href="{{action('FuncionarioController@delete')}}"><span class="glyphicon glyphicon-search"></span></a>
						
						   </td>
						   <td> <a href="{{action('FuncionarioController@create', $funcionario->id)}}"><span class="glyphicon glyphicon-trash"></span></a>
						
						   </td>
						   <td>  <a href="{{action('FuncionarioController@create', $funcionario->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
						   </td>
						
						 </tr>
						
						
						 @endforeach
						</tbody>
						</table>
                                             
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
