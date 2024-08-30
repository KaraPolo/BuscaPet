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
          <h1>Animais Encontrados na Rua</h1>
          <p>Página dedicada a busca dos donos de animais encontrados na rua.</p>
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
          <p class="card-text custom-card-text">1º poste foto de um pet encontrado na rua</p>
        </div>
      </div>
    </div>
    <div class="col-3 d-flex justify-content-center">
      <div class="card custom-card" style="width: 200px; height: 100px;">
        <div class="card-body text-center">
          <img src="https://images.vexels.com/content/144068/preview/cookie-bone-b94361.png" alt="Ícone" style="width: 30px; height: 30px;" class="mr-2">
          <p class="card-text custom-card-text">2º deixe seu contato e outras informações</p>
        </div>
      </div>
    </div>
    <div class="col-3 d-flex justify-content-center">
      <div class="card custom-card" style="width: 200px; height: 100px;">
        <div class="card-body text-center">
          <img src="https://images.vexels.com/content/144068/preview/cookie-bone-b94361.png" alt="Ícone" style="width: 30px; height: 30px;" class="mr-2">
          <p class="card-text custom-card-text">3º o tutor verá e lhe contatará</p>
        </div>
      </div>
    </div>
  </div>
  <br><br>
</div>


<div class="container mt-4" style="background-color: #f59342; padding: 20px; border-radius: 8px;">
  <form action="{{ route('encontrado.search') }}" method="post">
      <div class="row">
          @csrf
          <div class="col-4">
              <input type="text" name="caracteristicas" class="form-control"><br>
          </div>
          <div class="col-6" style="margin-top: 22px;">
              <button type="submit" class="btn custom-btn"> <i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
              <a href="{{ url('encontrado/create') }}" class="btn custom-btn"><i class="fa-solid fa-plus"></i> Novo</a>
              <a href="{{ url('encontrado/report') }}" class="btn custom-btn"><i class="fa-solid fa-file-pdf"></i> PDF</a>

          </div>
      </div>
  </form>

  <hr>

  <div class="row mt-4">
    @foreach ($dados as $item)
    <div class="col-md-4 mb-3">
      <div class="card" style="width: 100%; height: 500px;">
        <img src="/storage/{{ $item->imagem ?? 'sem_imagem.jpg' }}" class="card-img-top" alt="Imagem do Animal" style="object-fit: cover; height: 200px;">
        <div class="card-body">
          <p class="card-text"><strong>Características do Animal:</strong> {{ $item->caracteristicas }}</p>
          <p class="card-text"><strong>Estado de Saúde:</strong> {{ $item->saude }}</p>
          <p class="card-text"><strong>Telefone do Responsável:</strong> {{ $item->telefone }}</p>
          <a href="{{ route('encontrado.edit', $item->id) }}" class="btn btn-outline-primary" title="Editar"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
          <form action="{{ route('encontrado.destroy', $item) }}" method="post" style="display: inline;">
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
