@extends('layouts.admin')

@section('content')
    <h1>Elenco Progetti</h1>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.projects.create') }}">Crea Nuovo Progetto</a>

    <table>
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>
                        <a href="{{ route('admin.projects.show', $project->id) }}">Visualizza</a>
                        <a href="{{ route('admin.projects.edit', $project->id) }}">Modifica</a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
