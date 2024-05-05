<!-- resources/views/projects/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Create Project Button -->
                    <a href="{{ route('projects.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create Project
                    </a>

                    <!-- Project Table -->
                    <table class="table-auto mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Numero Projet</th>
                                <th class="px-4 py-2">Createur ID</th>
                                <th class="px-4 py-2">Date Creation</th>
                                <th class="px-4 py-2">Nom Projet</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <td class="border px-4 py-2">{{ $project->id }}</td>
                                <td class="border px-4 py-2">{{ $project->numero_projet }}</td>
                                <td class="border px-4 py-2">{{ $project->createur_id }}</td>
                                <td class="border px-4 py-2">{{ $project->date_creation }}</td>
                                <td class="border px-4 py-2">{{ $project->nom_projet }}</td>
                                <td class="border px-4 py-2">{{ $project->description }}</td>
                                <td class="border px-4 py-2">
                                    <!-- Edit Project Link -->
                                    <a href="{{ route('projects.edit', $project->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    
                                    <!-- Delete Project Form -->
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
