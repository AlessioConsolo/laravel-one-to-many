@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Gestione Progetti</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Crea Nuovo Progetto</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered w-100">
                <thead>
                    <tr>
                        <th class=".table-width-5">ID</th>
                        <th class="table-width-25">Nome Progetto</th>
                        <th class="table-width-50">Descrizione</th>
                        <th class="table-width-20">Azione</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->description }}</td>
                            <td>
                                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-info btn-sm">Mostra</a>
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Modifica</a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Nessun progetto trovato.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
