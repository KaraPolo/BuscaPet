@extends('base')
@section('conteudo')
@section('titulo', 'Listagem de Animais Desaparecidos')

<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div style="position: relative;">
        <img src="https://img.freepik.com/fotos-gratis/proprietario-acariciando-gato-adoravel_23-2148740478.jpg?t=st=1724124367~exp=1724127967~hmac=8adad7c810c91815b325dc9cd35edb4e90cd45a5e9b6af792f965570106bd7eb&w=1380" 
             class="d-block w-100" alt="..." style="height: 400px; object-fit: cover;">
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4);"></div>
        <div class="carousel-caption d-none d-md-block" style="z-index: 2;">
          <h1>Animais Perdidos</h1>
          <p>Página dedicada ao cadastro de animais que estão desaparecidos.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-3 d-flex justify-content-center">
      <div class="card custom-card" style="width: 200px; height: 100px;">
        <div class="card-body text-center">
          <img src="https://images.vexels.com/content/144068/preview/cookie-bone-b94361.png" alt="Ícone" style="width: 30px; height: 30px;" class="mr-2">
          <p class="card-text custom-card-text">1º cadastre seu pet</p>
        </div>
      </div>
    </div>
    <div class="col-3 d-flex justify-content-center">
      <div class="card custom-card" style="width: 200px; height: 100px;">
        <div class="card-body text-center">
          <img src="https://images.vexels.com/content/144068/preview/cookie-bone-b94361.png" alt="Ícone" style="width: 30px; height: 30px;" class="mr-2">
          <p class="card-text custom-card-text">2º outras pessoas o verão</p>
        </div>
      </div>
    </div>
    <div class="col-3 d-flex justify-content-center">
      <div class="card custom-card" style="width: 200px; height: 100px;">
        <div class="card-body text-center">
          <img src="https://images.vexels.com/content/144068/preview/cookie-bone-b94361.png" alt="Ícone" style="width: 30px; height: 30px;" class="mr-2">
          <p class="card-text custom-card-text">3º quem o encontrar, lhe contata</p>
        </div>
      </div>
    </div>
  </div>
  <br><br>
</div>


<div class="container mt-4" style="background-color: #f59342; padding: 20px; border-radius: 8px;">
  <form action="{{ route('perdido.search') }}" method="post">
      <div class="row">
          @csrf
          <div class="col-4">
              <label for="">Nome</label><br>
              <input type="text" name="nome" class="form-control"><br>
          </div>
          <div class="col-6" style="margin-top: 22px;">
              <button type="submit" class="btn custom-btn"> <i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
              <a href="{{ url('perdido/create') }}" class="btn custom-btn"><i class="fa-solid fa-plus"></i> Novo</a>
              <a href="{{ url('perdido/chart') }}" class="btn custom-btn"><i class="fa-solid fa-chart-pie"></i> Gráfico</a>
              <a href="{{ url('perdido/report') }}" class="btn custom-btn"><i class="fa-solid fa-file-pdf"></i> PDF</a>
          </div>
      </div>
  </form>

  <hr>

  <div class="row mt-4">
    @foreach ($dados as $item)
    <div class="col-md-4 mb-3">
      <div class="card" style="width: 100%; height: 800px;">
        <img src="/storage/{{ $item->imagem ?? 'sem_imagem.jpg' }}" class="card-img-top" alt="Imagem do Animal" style="object-fit: cover; height: 200px;">
        <div class="card-body">
          <h5 class="card-title">{{ $item->nome }}</h5>
          <p class="card-text"><strong>Idade do Animal:</strong> {{ $item->idade }}</p>
          <p class="card-text"><strong>Espécie do Animal:</strong> {{ $item->especie }}</p>
          <p class="card-text"><strong>Raça do Animal:</strong> {{ $item->raca }}</p>
          <p class="card-text"><strong>Sexo:</strong> {{ $item->categoria->nome ?? '' }}</p>
          <p class="card-text"><strong>Características do Animal:</strong> {{ $item->caracteristicas }}</p>
          <p class="card-text"><strong>Porte do Animal:</strong> {{ $item->porte }}</p>
          <p class="card-text"><strong>Data do Desaparecimento:</strong> {{ $item->data }}</p>
          <p class="card-text"><strong>Local do Desaparecimento:</strong> {{ $item->local }}</p>
          <p class="card-text"><strong>Nome do Responsável:</strong> {{ $item->responsavel }}</p>
          <p class="card-text"><strong>Telefone do Responsável:</strong> {{ $item->telefone }}</p>
          <p class="card-text"><strong>Recompensa Oferecida:</strong> {{ $item->recompensa }}</p>
          <a href="{{ route('perdido.edit', $item->id) }}" class="btn btn-outline-primary" title="Editar"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
          <form action="{{ route('perdido.destroy', $item) }}" method="post" style="display: inline;">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-outline-danger" title="Deletar" onclick="return confirm('Deseja realmente deletar esse registro?')">
              <i class="fa-solid fa-trash-can"></i> Deletar
            </button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

{{ $dados->withQueryString()->links('pagination::bootstrap-5') }}
@stop

@push('styles')
<style>
    .custom-card-text {
        color: white;
        font-weight: bold;
        font-family: 'Arial', sans-serif;
    }
    .custom-btn {
        background-color: #f59342;
        color: white;
        border-color: #f59342;
    }
    .custom-btn:hover {
        background-color: #e57c32;
        border-color: #e57c32;
    }
</style>
@endpush
