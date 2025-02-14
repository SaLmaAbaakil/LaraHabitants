@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold mb-6">Liste des habitants</h1>
    <a href="{{ route('habitants.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 mb-3 inline-block">Ajouter un habitant</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 border-l-4 border-green-500 p-4 mb-6">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">CIN</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nom</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Prénom</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Ville</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Photo</th>
                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($habitants as $habitant)
            <tr class="border-b">
                <td class="px-4 py-2 text-sm text-gray-700">{{ $habitant->cin }}</td>
                <td class="px-4 py-2 text-sm text-gray-700">{{ $habitant->nom }}</td>
                <td class="px-4 py-2 text-sm text-gray-700">{{ $habitant->prenom }}</td>
                <td class="px-4 py-2 text-sm text-gray-700">{{ $habitant->ville->ville }}</td>
                <td class="px-4 py-2 text-sm text-gray-700">
                    <img src="{{ asset($habitant->photo) }}" alt="Photo de {{ $habitant->nom }}" class="w-12 h-12 rounded-full">
                </td>
                <td class="px-4 py-2 text-sm text-gray-700">
                    <a href="{{ route('habitants.edit', $habitant) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 mr-2">Modifier</a>

                    <form action="{{ route('habitants.destroy', $habitant) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700" onclick="return confirm('Êtes-vous sûr?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
