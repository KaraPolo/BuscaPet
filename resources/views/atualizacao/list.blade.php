@extends('base')
@section('titulo', 'Atualização de Animais Perdidos')
@section('conteudo')

<style>
    .btn-custom {
        background-color: #f59342;
        border-color: #f59342;
        color: white;
    }
    .btn-custom:hover {
        background-color: #e4823a;
        border-color: #e4823a;
    }
</style>

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

<div class="container mt-4">    
<center>
    <div class="col-md-8 d-flex align-items-end">
      <a href="{{ url('atualizacao/create') }}" class="btn btn-custom me-2"><i class="fa-solid fa-plus"></i> Cadastrar nova Atualização</a>
    </div>
</center>
    <br>
</div>

    <hr>

    <div class="row">
        @foreach ($dados as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Animal: {{ $item->perdido->nome ?? '' }}</h5>
                        <p class="card-text"><strong>Status:</strong> {{ $item->status->nome ?? '' }}</p>
                        <p class="card-text"><strong>Atualização feita pelo Dono:</strong> {{ $item->dono->nome ?? '' }}</p>
                        <p class="card-text"><strong>Data da Atualização:</strong> {{ date('d/m/Y', strtotime($item->data_atualizacao)) ?? '' }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('atualizacao.detail', $item->id) }}" class="btn btn-custom" title="Detalhe">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                            <a href="{{ route('atualizacao.edit', $item->id) }}" class="btn btn-custom" title="Editar">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('atualizacao.destroy', $item) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-custom" title="Deletar"
                                    onclick="return confirm('Deseja realmente deletar esse registro?')">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $dados->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>
@stop
