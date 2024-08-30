@extends('base')
@section('conteudo')
@section('titulo', 'Cadastrar Animais para Adoção')
@php
    if (!empty($dado->id)) {
        $route = route('doacao.update', $dado->id);
    } else {
        $route = route('doacao.store');
    }
@endphp

<h3>Cadastrar Animais para Adoção</h3>
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

    <label for="">Raça do Animal</label><br>
    <input type="text" name="raca" class="form-control"
        value="@if (!empty($dado->raca)) {{ $dado->raca }}@elseif (!empty(old('raca'))){{ old('raca') }}@else{{ '' }} @endif"><br>

    <label for="">Sexo</label><br>
    <input type="text" name="sexo" class="form-control"
        value="@if (!empty($dado->sexo)) {{ $dado->sexo }}@elseif (!empty(old('sexo'))){{ old('sexo') }}@else{{ '' }} @endif"><br>


    <label for="">Características do Animal</label><br>
    <input type="text" name="caracteristicas" class="form-control"
        value="@if (!empty($dado->caracteristicas)) {{ $dado->caracteristicas }}@elseif (!empty(old('caracteristicas'))){{ old('caracteristicas') }}@else{{ '' }} @endif"><br>

    <label for="">História do Animal</label><br>
    <input type="text" name="historia" class="form-control"
        value="@if (!empty($dado->historia)) {{ $dado->historia }}@elseif (!empty(old('historia'))){{ old('historia') }}@else{{ '' }} @endif"><br>

    <label for="">Saude do Animal</label><br>
    <input type="text" name="saude" class="form-control"
        value="@if (!empty($dado->saude)) {{ $dado->saude }}@elseif (!empty(old('saude'))){{ old('saude') }}@else{{ '' }} @endif"><br>

    <label for="">Observações</label><br>
    <input type="text" name="observacao" class="form-control"
        value="@if (!empty($dado->observacao)) {{ $dado->observacao }}@elseif (!empty(old('observacao'))){{ old('observacao') }}@else{{ '' }} @endif"><br>

    <label for="">Nome do Responsável</label><br>
    <input type="text" name="responsavel" class="form-control"
        value="@if (!empty($dado->responsavel)) {{ $dado->responsavel }}@elseif (!empty(old('responsavel'))){{ old('responsavel') }}@else{{ '' }} @endif"><br>


    <label for="">Telefone do Responsável</label><br>
    <input type="text" name="telefone" class="form-control"
        value="@if (!empty($dado->telefone)) {{ $dado->telefone }}@elseif (!empty(old('telefone'))){{ old('telefone') }}@else{{ '' }} @endif"><br>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ url('doacao') }}" class="btn btn-primary">Voltar</a>
</form>

@stop
