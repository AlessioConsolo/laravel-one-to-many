@extends('layouts.admin')

@section('content')
    <h1>Modifica Progetto: {{ $project->title }}</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Titolo</label>
            <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}">
        </div>

        <div>
            <label for="description">Descrizione</label>
            <textarea id="description" name="description">{{ old('description', $project->description) }}</textarea>
        </div>

        <div>
            <label for="image">Immagine</label>
            <input type="file" id="image" name="image">
            @if ($project->image)
                <div>
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" style="width:150px;">
                </div>
            @endif
        </div>

        <button type="submit">Aggiorna Progetto</button>
    </form>
@endsection
