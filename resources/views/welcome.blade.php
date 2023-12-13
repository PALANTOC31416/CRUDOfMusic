<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Musica</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
      <header class="w-100 bg-black p-5" style="text-align: center">
        <h1 class="text-light">Mi lista de Reproducción</h1>
      </header>

      <section>
        <nav class="navbar navbar-expand-lg w-50 m-auto" style="background-color: #e3f2fd;">
          <div class="container-fluid">
            <a class="navbar-brand">Musica</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav m-auto contendMenu">
                <li class="nav-item mx-3">
                  <a class="nav-link active registerMusic" aria-current="page" href="#">Registrar musica</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link registerGenres" href="#">Agregar genero</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </section>

      @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
      @endif

      @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

      <form action="{{ route('addAlbum') }}" method="post" class="add-music w-50 m-auto my-5">
        @csrf
        <h3>Agregar musica a mi lista de Reproducción</h3>
        <div class="mb-3">
          <label for="author" class="form-label">Autor</label>
          <input type="text" class="form-control" name="author" id="autor">
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="name" id="nombre">
        </div>
        <div class="mb-3">
          <label class="form-label">Genero</label>
          <select name="genres" id="genres">
            @foreach ($genres as $genre)
              <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="flex items-center justify-end mt-4">
          <button class="ml-4 bg-sky-600 btn btn-primary" type="submit">Agregar</button>
        </div>
      </form>

      <form action="{{ route('addGenres') }}" method="POST" class="add-genres w-50 m-auto my-5">
          @csrf
        <h3>Agregar nuevo genero</h3>
        <div class="mb-3">
          <label for="name" class="form-label">Nombre</label>
          <input type="text" class="form-control" name="name" id="nombre">
        </div>
          <button type="submit" class="btn btn-primary">Agregar</button>
      </form>

      <div class="row w-75 m-auto">
        @foreach ($albums as $album)
          <div class="col-sm-4">
            <div class="card my-3" style="width: 18rem;">
              <img src="{{ asset('img/imgPrinsipal.png') }}" class="w-50 m-auto" alt="fondoMusica.png">
              <div class="card-body" style="text-align: center">
                <h5 class="card-title">{{ $album->name }}</h5>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item" style="text-align: center">{{ $album->author }}</li>
                <li class="list-group-item" style="text-align: center">
                  <img src="{{ asset('img/stars.png') }}" class="w-25 m-auto btn" alt="play.png">
                  <img src="{{ asset('img/stars.png') }}" class="w-25 m-auto btn" alt="play.png">
                  <img src="{{ asset('img/stars.png') }}" class="w-25 m-auto btn" alt="play.png">
                </li>
              </ul>
              <div class="card-body" style="text-align: center">
                <img src="{{ asset('img/play.png') }}" class="w-25 m-auto btn" alt="play.png">
                  <br>
                  <a href="{{ route('deleteOfAlbum', ['id' => $album->id]) }}" class="btn btn-sm btn-danger">x</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
