@extends('layouts.admin')

@section('content')
    <h1>Crea Nuovo Progetto</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Titolo</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
        </div>

        <div>
            <label for="description">Descrizione</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="image">Immagine</label>
            <input type="file" id="image" name="image">
        </div>

        <button type="submit">Salva Progetto</button>
    </form>
@endsection
