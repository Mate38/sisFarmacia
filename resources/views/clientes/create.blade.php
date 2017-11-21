@extends('welcome')

<!-- Autores: jeferson, Jean -->

@section('content')
  <h2>Cadastro de Cliente<h2>
  <hr />

  {{ Form::model($cliente, array('route'=>array('clientes.store'))) }}
    
    {{Form::label('nome', 'Nome:')}}
    </br>
    {{Form::text('nome')}}
    </br>
    {{Form::label('cpf', 'CPF:')}} 
    </br>
    {{Form::text('cpf')}}
    </br>
    {{Form::label('endereco', 'Endereço:')}}
    </br>
    {{Form::text('endereco')}}
   

    {{Form::submit('Salvar', array('class' => 'btn btn-success'))}}

  {{Form::close()}}
@endsection