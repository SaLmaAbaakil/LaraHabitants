@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold mb-6">Modifier un habitant</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 border-l-4 border-red-500 p-4 mb-6">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('habitants.update', $habitant) }}" 
          method="POST" 
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="cin" class="block text-sm font-medium text-gray-700">CIN</label>
            <input type="text" 
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                   id="cin" 
                   name="cin" 
                   value="{{ old('cin', $habitant->cin) }}" 
                   required>
        </div>

        <div class="mb-4">
            <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" 
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                   id="nom" 
                   name="nom" 
                   value="{{ old('nom', $habitant->nom) }}" 
                   required>
        </div>

        <div class="mb-4">
            <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom</label>
            <input type="text" 
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                   id="prenom" 
                   name="prenom" 
                   value="{{ old('prenom', $habitant->prenom) }}" 
                   required>
        </div>

        <div class="mb-4">
            <label for="ville_id" class="block text-sm font-medium text-gray-700">Ville</label>
            <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                    id="ville_id" 
                    name="ville_id" 
                    required>
                <option value="">Sélectionner une ville</option>
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}" 
                            {{ old('ville_id', $habitant->ville_id) == $ville->id ? 'selected' : '' }}>
                        {{ $ville->ville }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="photo" class="block text-sm font-medium text-gray-700">Photo actuelle</label>
            <img src="{{ asset('storage/' . $habitant->photo) }}" 
                 alt="Photo actuelle" 
                 class="w-24 h-24 object-cover rounded-full">
            <input type="file" 
                   class="mt-2 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" 
                   id="photo" 
                   name="photo">
            <small class="text-gray-500 mt-1">Laissez vide pour garder la photo actuelle</small>
        </div>

        <div class="flex space-x-4">
            <button type="submit" 
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 focus:outline-none">
                Mettre à jour
            </button>
            <a href="{{ route('habitants.index') }}" 
               class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 focus:outline-none">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection
