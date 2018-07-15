<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <title>Hello</title>

    </head>
    <body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    	<h1>Adicionar Produto</h1>
    	
    	<form action="/store" method="post"> 
    		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
    			Titulo: <input type="text" name="titulo" ><br/>
    			Texto: <input type="text" name="texto" ><br/>
    			Remetente: <input type="text" name="remetente" ><br/>
    			Destinatário: <input type="text" name="destinatario" ><br/>
    			<input  type="submit" value="cadastrar" />
    	</form>
 
    </body>
</html>