@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $project->title }}</h1>
        <p><strong>Descrizione:</strong> {{ $project->description }}</p>

        @if($project->cover_image)
            <img src="{{ asset('storage/' . $project->cover_image) }}" alt="Cover Image" class="cover-image">
        @endif

        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary mt-2">Torna alla lista dei progetti</a>
    </div>
@endsection
