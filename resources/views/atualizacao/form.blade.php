@extends('base')
@section('conteudo')
@section('titulo', 'Cadastro de Atualização de Animais Perdidos')
@php
    if (!empty($dado->id)) {
        $route = route('atualizacao.update', $dado->id);
    } else {
        $route = route('atualizacao.store');
    }
@endphp
<div>
<br><br>

<h3>Cadastro de Atualização de Animais Perdidos</h3>
<form action="{{ $route }}" method="post" enctype="multipart/form-data">

    @csrf

    @if (!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id"
        value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

    <label for="">Status</label><br>
    <select name="status_id" class="form-select">
        @foreach ($statuss as $item)
            <option value="{{ $item->id }}">{{ $item->nome }}</option>
        @endforeach
    </select><br>

    <label for="">Atualização feita pelo Dono</label><br>
    <select name="dono_id" class="form-select">
        @foreach ($donos as $item)
            <option value="{{ $item->id }}">{{ $item->nome }}</option>
        @endforeach
    </select><br>

    <label for="">Nome do Animal Perdido</label><br>
    <select name="perdido_id" class="form-select">
        @foreach ($perdidos as $item)
            <option value="{{ $item->id }}">{{ $item->nome }}</option>
        @endforeach
    </select><br>

    <label for="">Data da Atualização</label><br>
    <input type="date" name="data_atualizacao" class="form-control"
        value="@if (!empty($dado->data_atualizacao)) {{ $dado->data_atualizacao }}@elseif (!empty(old('data_atualizacao'))){{ old('data_atualizacao') }}@else{{ '' }} @endif"><br>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ url('atualizacao') }}" class="btn btn-primary">Voltar</a>

</form>
</div>

@stop

