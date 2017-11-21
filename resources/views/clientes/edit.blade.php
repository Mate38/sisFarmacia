@extends('welcome')

<!-- Autores: jeferson, Jean -->

@section('content')
  <h2>Edição de Cliente<h2>
  <hr />
  {{ Form::model($cliente, array('route'=>array('clientes.update', $cliente->idclientes), 'method' => 'PUT')) }}
<table class="table table-bordered">
  <tr>
  <th>{{Form::label('nome', 'Nome:')}}</th>
  <th>CPF</th>
  </tr>
    <tr>
      <td>{{Form::text('nome', null, array('class' => 'form=control'))}}</td>
      <td>{{Form::text('cpf', null, array('class' => 'form=control'))}}</td>
  </tr>
  <tr>
  <th>Endereço</th>
  <th>Saldo</th>
  </tr>
    
  <tr>
      <td>{{Form::text('endereco', null, array('class' => 'form=control'))}}</td>
      <td>{{Form::text('saldo', null, array('class' => 'form=control'))}}</td>
    </tr>
  </table>

    {{Form::submit('Salvar', array('class' => 'btn btn-success'))}}

  {{Form::close()}}
@endsection