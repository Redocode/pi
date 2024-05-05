<!-- resources/views/projects/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Edit Project Form -->
                    <form action="{{ route('projects.update', $project->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Client ID Field -->
                        <div class="mb-4">
                            <label for="client_id" class="block text-gray-700 text-sm font-bold mb-2">Client:</label>
                            <select name="client_id" id="client_id" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/6">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ $client->id == $project->client_id ? 'selected' : '' }}>{{ $client->nom }} {{ $client->prenom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Numero Projet Field -->
                        <div class="mb-4">
                            <label for="numero_projet" class="block text-gray-700 text-sm font-bold mb-2">Numero Projet:</label>
                            <input type="text" name="numero_projet" id="numero_projet" value="{{ $project->numero_projet }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/6">
                        </div>

                        <!-- Createur ID Field (Hidden) -->
                        <input type="hidden" name="createur_id" value="{{ $project->createur_id }}">

                        <!-- Date Creation Field -->
                        <div class="mb-4">
                            <label for="date_creation" class="block text-gray-700 text-sm font-bold mb-2">Date Creation:</label>
                            <input type="date" name="date_creation" id="date_creation" value="{{ $project->date_creation }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/6">
                        </div>

                        <!-- Nom Projet Field -->
                        <div class="mb-4">
                            <label for="nom_projet" class="block text-gray-700 text-sm font-bold mb-2">Nom Projet:</label>
                            <input type="text" name="nom_projet" id="nom_projet" value="{{ $project->nom_projet }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/6">
                        </div>

                        <!-- Description Field -->
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea name="description" id="description" class="shadow appearance-none border rounded py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/6">{{ $project->description }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
