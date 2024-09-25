{{-- questa view estende il file main.blade.php che è dentro la cartella view/layouts --}}
@extends('layouts.app')



@section('content')
<div class="container my-5">

    {{-- se ci sono gli errori stampa un messaggi con gli errori --}}
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <form class="row g-3" action="{{route('admin.projects.store')}}" method="POST">
        @csrf
        <div class="col-md-6">
          <label for="title" class="form-label">Titolo del progetto (*)</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Scrivi il titolo del progetto" value="{{old('title')}}">
            {{-- se esiste l'errore title stampa un messaggio anche sotto l'input --}}
            @error('title')
                <small class="text-danger"> {{$message}} </small>
            @enderror

        </div>
        <div class="col-md-6">
            <label for="img" class="form-label">URL immagine(*)</label>
            <input type="text" class="form-control @error('img') is-invalid @enderror" id="img" name="img" placeholder="Inserisci l'URL dell'immagine" value="{{old('img')}}">

            @error('img')
                <small class="text-danger"> {{$message}} </small>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="start_date" class="form-label">Inizio del progetto (*)</label>
            <input type="text" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" placeholder="2024/07/31" value="{{old('start_date')}}">

            @error('start_date')
                <small class="text-danger"> {{$message}} </small>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="end_date" class="form-label">Fine prevista (*)</label>
            <input type="text" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" placeholder="2024/07/31" value="{{old('end_date')}}">

            @error('end_date')
                <small class="text-danger"> {{$message}} </small>
            @enderror
        </div>
        {{-- select per le tipologia di progetto --}}
        <div class="col-md-6">
            <label for="type" class="form-label">Tipologia di progetto (*)</label>
            <select name="type_id" class="form-select" aria-label="Default select example" id="type">
                <option value="">-- seleziona la tipologia --</option>
                @foreach ($types as $type )
                    <option value="{{$type->id}}" @if(old('type_id') == $type->id) selected @endif>{{$type->name}}</option>
                @endforeach
            </select>
        </div>

        {{-- chechbox per le tecnologie --}}
        <label for="technologies" class="form-label">Tecnologie: (*)</label>
        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($technologies as $technology)

                <input type="checkbox" class="btn-check" id="tech-{{$technology->id}}" autocomplete="off">
                <label class="btn btn-outline-primary" for="tech-{{$technology->id}}">{{$technology->name}}</label>

            @endforeach

        </div>

        <div class="col-12">
            <label for="description" class="form-label">Descrizione del progetto</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Descrizione del progetto">{{old('description')}}</textarea>

        </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary">Invia</button>
        </div>
        <div class="col-12">
          <button type="reset" class="btn btn-primary">Cancella</button>
        </div>
      </form>
</div>

@endsection
