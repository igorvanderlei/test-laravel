@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('funcionario.cadastrar') }}</div>

                <div class="card-body">
                    <form method="POST" action="/funcionario/store" >
                        @csrf

							<div class="form-group row">
                            <label for="departamento" class="col-md-4 col-form-label text-md-right">{{ __('funcionario.departamento') }}</label>

                            <div class="col-md-6">
                                <select id="departamento"  class="form-control{{ $errors->has('departamento_id') ? ' is-invalid' : '' }}" name="departamento_id" autofocus>
                                <option value="">Selecione o Departamento</option>
                                @foreach($departamentos as $departamento)
                                	<option value="{{ $departamento->id }}" {{ old('departamento') == $departamento->id ? 'selected' : '' }}>{{$departamento->descricao}}</option>
                                @endforeach
                                </select>                                

                                @if ($errors->has('departamento_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('funcionario.nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required autofocus>

                                @if ($errors->has('nome'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apelido" class="col-md-4 col-form-label text-md-right">{{ __('funcionario.apelido') }}</label>

                            <div class="col-md-6">
                                <input id="apelido" type="text" class="form-control{{ $errors->has('apelido') ? ' is-invalid' : '' }}" name="apelido" value="{{ old('apelido') }}" required>

                                @if ($errors->has('apelido'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apelido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('funcionario.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('funcionario.password_confirmation') }}</label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('funcionario.cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
