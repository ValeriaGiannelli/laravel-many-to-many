@extends('layouts.app')

@section('content')
<div class="container my-5">

    @if(session('edit'))
        <div class="alert alert-success">
            {{session('edit')}}
        </div>
    @endif

    <a class="btn btn-warning" href="{{route('admin.projects.edit', $project)}}">
        <i class="fa-solid fa-pencil"></i>
    </a>
    @include('admin.partials.formDelete', [
        'route' => route('admin.projects.destroy', $project),
        'message' => "Sei sicuro di voler eliminare il progetto: $project->title?"
    ])

    <h1>{{$project->id}}# {{$project->title}}</h1>
    <img src="{{$project->img}}" alt="immagine di {{$project->title}}">
    <h3>Categoria: {{$project->type? $project->type->name : 'Nessuna Categoria'}}</h3>
    <p>Descrizione: {{$project->description}}</p>
    <h3>Data di inizio: {{$project->start_date}}</h3>



</div>
@endsection
