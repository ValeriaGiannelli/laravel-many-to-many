@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="table-responsive">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Inizio</th>
                <th scope="col">Fine</th>
                <th scope="col">Categoria</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>
            <tbody>
                @foreach ( $projects as $project )
                    <tr>
                            <td class="col-auto"> {{$project->id}}</td>
                            <td class="col-auto"> {{$project->title}} </td>
                            <td class="col-auto">{{($project->start_date)->format('d-m-Y')}}</td>
                            <td class="col-auto">{{($project->end_date)->format('d-m-Y')}}</td>
                            <td class="col-auto"><span class="badge text-bg-info">{{$project->type?->name}}</span></td>

                            <td class="col-auto">
                                <a class="btn btn-primary" href="{{route('admin.projects.show', $project)}}">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a class="btn btn-warning" href="{{route('admin.projects.edit', $project)}}">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                @include('admin.partials.formDelete', [
                                    'route' => route('admin.projects.destroy', $project),
                                    'message' => "Sei sicuro di voler eliminare il progetto: $project->title?"
                                ])

                            </td>
                    </tr>
                @endforeach

            </tbody>
          </table>
    </div>

</div>
@endsection
