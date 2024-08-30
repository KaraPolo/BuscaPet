@extends('base')
@section('conteudo')
@section('titulo', 'Detalhes do Animal Perdido')

<div>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div style="position: relative;">
                    <img src="https://img.freepik.com/fotos-gratis/proprietario-acariciando-gato-adoravel_23-2148740478.jpg?t=st=1724124367~exp=1724127967~hmac=8adad7c810c91815b325dc9cd35edb4e90cd45a5e9b6af792f965570106bd7eb&w=1380" 
                         class="d-block w-100" alt="..." style="height: 400px; object-fit: cover;">
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4);"></div>
                    <div class="carousel-caption d-none d-md-block" style="z-index: 2;">
                        <h1>Atualização de Animais Perdidos</h1>
                        <p>Página dedicada a atualizações de animais que estão desaparecidos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $nome_imagem = !empty($perdido->imagem) ? $perdido->imagem : 'sem_imagem.jpg';
    @endphp

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <b>Imagem do Animal Perdido</b><br>
                <img src="/storage/{{ $nome_imagem }}" style="width: 100%; max-width: 400px; max-height: 280px;" alt="imagem" />
            </div>
            <div class="col-md-6">
                <b for="">Nome do Animal</b><br>
                <span>{{ $perdido->nome }}</span><br><br>

                <b>Status</b><br>
                <span>{{ $status->nome }}</span><br><br>

                <b for="">Características do Animal</b><br>
                <span>{{ $perdido->caracteristicas }}</span><br><br>

                <b for="">Telefone do Responsável</b><br>
                <span>{{ $perdido->telefone }}</span><br><br>

                <a href="{{ url('atualizacao') }}" class="btn btn-primary" style="width: 100px;">Voltar</a>
            </div>
        </div>
    </div>

@stop
</div>
