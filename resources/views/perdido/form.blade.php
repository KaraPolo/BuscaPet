@extends('base')
@section('conteudo')
@section('titulo', 'Cadastrar Animal Perdido')
@php
    if (!empty($dado->id)) {
        $route = route('perdido.update', $dado->id);
    } else {
        $route = route('perdido.store');
    }
@endphp

<h3>Cadastrar Animal Perdido</h3>
<form action="{{ $route }}" method="post" enctype="multipart/form-data">

    @csrf

    @if (!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id"
        value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

    @php
        $nome_imagem = !empty($dado->imagem) ? $dado->imagem : 'sem_imagem.jpg';
        //dd($nome_imagem);
    @endphp
    <label for="">Imagem</label><br>
    <img src="/storage/{{ $nome_imagem }}" width="300px" alt="imagem" />
    <input type="file" name="imagem" class="form-control"
        value="@if (!empty($dado->imagem)) {{ $dado->imagem }}@elseif (!empty(old('imagem'))){{ old('imagem') }}@else{{ '' }} @endif"><br>
 
    <label for="">Nome do Animal</label><br>
    <input type="text" name="nome" class="form-control"
        value="@if (!empty($dado->nome)) {{ $dado->nome }}@elseif (!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif"><br>

    <label for="">Idade</label><br>
    <input type="text" name="idade" class="form-control"
        value="@if (!empty($dado->idade)) {{ $dado->idade }}@elseif (!empty(old('idade'))){{ old('idade') }}@else{{ '' }} @endif"><br>


    <label for="">Espécie do Animal (ex: gato, cachorro, pássaro, etc.)</label><br>
    <input type="text" name="especie" class="form-control"
        value="@if (!empty($dado->especie)) {{ $dado->especie }}@elseif (!empty(old('especie'))){{ old('especie') }}@else{{ '' }} @endif"><br>


    <label for="">Raça do Animal</label><br>
    <input type="text" name="raca" class="form-control"
        value="@if (!empty($dado->raca)) {{ $dado->raca }}@elseif (!empty(old('raca'))){{ old('raca') }}@else{{ '' }} @endif"><br>

    <label for="">Sexo</label><br>
    <select name="categoria_id" class="form-select">
        @foreach ($categorias as $item)
            <option value="{{ $item->id }}">{{ $item->nome }}</option>
        @endforeach
    </select><br>

    <label for="">Características do Animal</label><br>
    <input type="text" name="caracteristicas" class="form-control"
        value="@if (!empty($dado->caracteristicas)) {{ $dado->caracteristicas }}@elseif (!empty(old('caracteristicas'))){{ old('caracteristicas') }}@else{{ '' }} @endif"><br>

    <label for="">Porte do Animal</label><br>
    <input type="text" name="porte" class="form-control"
        value="@if (!empty($dado->porte)) {{ $dado->porte }}@elseif (!empty(old('porte'))){{ old('porte') }}@else{{ '' }} @endif"><br>

    <label for="">Data do Desaparecimento</label><br>
    <input type="date" name="data" class="form-control"
        value="@if (!empty($dado->data)) {{ $dado->data }}@elseif (!empty(old('data'))){{ old('data') }}@else{{ '' }} @endif"><br>

    <label for="">Local do Deaparecimeto</label><br>
    <input type="text" name="local" class="form-control"
        value="@if (!empty($dado->local)) {{ $dado->local }}@elseif (!empty(old('local'))){{ old('local') }}@else{{ '' }} @endif"><br>

    <label for="">Nome do Responsável</label><br>
    <input type="text" name="responsavel" class="form-control"
        value="@if (!empty($dado->responsavel)) {{ $dado->responsavel }}@elseif (!empty(old('responsavel'))){{ old('responsavel') }}@else{{ '' }} @endif"><br>


    <label for="">Telefone do Responsável</label><br>
    <input type="text" name="telefone" class="form-control"
        value="@if (!empty($dado->telefone)) {{ $dado->telefone }}@elseif (!empty(old('telefone'))){{ old('telefone') }}@else{{ '' }} @endif"><br>

    <label for="">Recompensa Oferecida</label><br>
    <input type="text" name="recompensa" class="form-control"
        value="@if (!empty($dado->recompensa)) {{ $dado->recompensa }}@elseif (!empty(old('recompensa'))){{ old('recompensa') }}@else{{ '' }} @endif"><br>


    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ url('perdido') }}" class="btn btn-primary">Voltar</a>
</form>

@stop
