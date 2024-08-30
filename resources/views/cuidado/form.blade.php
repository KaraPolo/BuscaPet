@extends('base')
@section('conteudo')
@section('titulo', 'Cadastrar Dica de Cuidado')
@php
    if (!empty($dado->id)) {
        $route = route('cuidado.update', $dado->id);
    } else {
        $route = route('cuidado.store');
    }
@endphp
<div>
<br><br>
<center>
<h3>Cadastrar Dica de Cuidado</h3>
</center>

<form action="{{ $route }}" method="post" enctype="multipart/form-data">

    @csrf

    @if (!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id"
        value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

    <label for="">Título da Dica</label><br>
    <input type="text" name="titulo" class="form-control"
        value="@if (!empty($dado->titulo)) {{ $dado->titulo }}@elseif (!empty(old('titulo'))){{ old('titulo') }}@else{{ '' }} @endif"><br>

    <label for="">Descrição</label><br>
    <input type="text" name="descricao" class="form-control"
        value="@if (!empty($dado->descricao)) {{ $dado->descricao }}@elseif (!empty(old('descricao'))){{ old('descricao') }}@else{{ '' }} @endif"><br>

    <label for="">Valor Estimado</label><br>
    <input type="text" name="valor" class="form-control"
        value="@if (!empty($dado->valor)) {{ $dado->valor }}@elseif (!empty(old('valor'))){{ old('valor') }}@else{{ '' }} @endif"><br>



    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ url('cuidado') }}" class="btn btn-primary">Voltar</a>
</form>
<br><br><br>

</div>

@stop
