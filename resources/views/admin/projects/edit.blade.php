@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica Progetto</h1>

        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="name">Nome Progetto:</label>
            <input type="text" id="name" name="name" value="{{ $project->name }}" required>

            <label for="description">Descrizione:</label>
            <textarea id="description" name="description" required>{{ $project->description }}</textarea>

            <label for="image">Immagine di copertura:</label>
            <input type="file" id="image" name="image">

            <button type="submit" class="btn btn-secondary">Aggiorna Progetto</button>
        </form>

        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Torna alla lista dei progetti</a>
    </div>
@endsection
