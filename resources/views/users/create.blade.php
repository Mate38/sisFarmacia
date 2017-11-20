@extends('adminlte::page')

@section('content_header')
    <section class="content-header">
      <h1>
        Cadastro de usuários
      </h1>
    </section>
@stop

@section('content')

{!! Form::open(['/users' => 'foo/bar']) !!}
//
{!! Form::close() !!}
  
@endsection