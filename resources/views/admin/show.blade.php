@extends('layouts.admin')

@section('content')
    <h1>Dettagli del Progetto: {{ $project->title }}</h1>

    <p>{{ $project->description }}</p>

    @if ($project->cover_image)
    <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->name }}" style="max-width: 300px;">
    @endif


    <a href="{{ route('admin.projects.index') }}">Torna all'elenco progetti</a>
@endsection
