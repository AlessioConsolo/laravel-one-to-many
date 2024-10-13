@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $project->title }}</h1>
        <p>{{ $project->description }}</p>

        @if ($project->type)
            <p><strong>Tipologia:</strong> {{ $project->type->name }}</p>
        @endif

        <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}">
    </div>
@endsection
