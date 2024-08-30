@extends('base')
@section('conteudo')
@section('titulo', 'Cadastrar Animal Encontrado')
@php
    if (!empty($dado->id)) {
        $route = route('encontrado.update', $dado->id);
    } else {
        $route = route('encontrado.store');
    }
@endphp
<div>
<br><br>
<center>
<h3>Cadastrar Animais Encontrados na Rua</h3>
</center>

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


    <label for="">Características</label><br>
    <input type="text" name="caracteristicas" class="form-control"
        value="@if (!empty($dado->caracteristicas)) {{ $dado->caracteristicas }}@elseif (!empty(old('caracteristicas'))){{ old('caracteristicas') }}@else{{ '' }} @endif"><br>

        

    <label for="">Estado de Saúde</label><br>
    <input type="text" name="saude" class="form-control"
        value="@if (!empty($dado->saude)) {{ $dado->saude }}@elseif (!empty(old('saude'))){{ old('saude') }}@else{{ '' }} @endif"><br>

    <label for="">Telefone do Responsável</label><br>
    <input type="text" name="telefone" class="form-control"
        value="@if (!empty($dado->telefone)) {{ $dado->telefone }}@elseif (!empty(old('telefone'))){{ old('telefone') }}@else{{ '' }} @endif"><br>



    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ url('encontrado') }}" class="btn btn-primary">Voltar</a>
</form>
<br><br><br>

</div>

@stop
