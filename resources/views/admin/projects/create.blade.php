@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea Nuovo Progetto</h1>

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="name">Nome Progetto:</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Descrizione:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="image">Immagine di copertura:</label>
            <input type="file" id="image" name="image">

            <button type="submit" class="btn">Crea Progetto</button>
        </form>

        <a href="{{ route('admin.projects.index') }}" class="btn">Torna alla lista dei progetti</a>
    </div>
@endsection
