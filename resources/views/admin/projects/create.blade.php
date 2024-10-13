@extends('layouts.admin')

@section('content')
    <h1>Crea Nuovo Progetto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="type_id">Tipologia</label>
            <select name="type_id" class="form-control">
                <option value="">Seleziona una tipologia</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="cover_image">Immagine di Copertina</label>
            <input type="file" name="cover_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection
