<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Create Client Button -->
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Liste des clients
                    </a>

                    <!-- Client Table -->
                    <table class="table-auto mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Nom</th>
                                <th class="px-4 py-2">Prenom</th>
                                <th class="px-4 py-2">Societe</th>
                                <th class="px-4 py-2">Telephone</th>
                                <th class="px-4 py-2">Fax</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Address</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <td class="border px-4 py-2">{{ $client->id }}</td>
                                <td class="border px-4 py-2">{{ $client->nom }}</td>
                                <td class="border px-4 py-2">{{ $client->prenom }}</td>
                                <td class="border px-4 py-2">{{ $client->societe }}</td>
                                <td class="border px-4 py-2">{{ $client->telephone }}</td>
                                <td class="border px-4 py-2">{{ $client->fax }}</td>
                                <td class="border px-4 py-2">{{ $client->email }}</td>
                                <td class="border px-4 py-2">{{ $client->address }}</td>
                                <td class="border px-4 py-2">
            <!-- Lien pour éditer le client -->
            <a href="{{ route('clients.edit', $client->id) }}" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
            
            <!-- Formulaire de suppression du client -->
            <form id="deleteForm{{ $client->id }}" action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmDelete({{ $client->id }}, {{ $client->projects()->exists() ? 'true' : 'false' }})" class="text-red-600 hover:text-red-900 ml-2">Supprimer</button>
            </form>
        </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                    <!-- Client Creation Form -->
                    <form action="{{ route('clients.store') }}" method="POST" class="mt-8">
                        @csrf
                        <div class="mb-4">
                            <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">
                                Nom<span class="text-red-500">*</span>:
                            </label>
                            <input type="text" name="nom" id="nom" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4" required>
                        </div>
                        <div class="mb-4">
                            <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">
                                Prenom<span class="text-red-500">*</span>:
                            </label>
                            <input type="text" name="prenom" id="prenom" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4" required>
                        </div>
                        <div class="mb-4">
                            <label for="societe" class="block text-gray-700 text-sm font-bold mb-2">Societe:</label>
                            <input type="text" name="societe" id="societe" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4">
                        </div>
                        <div class="mb-4">
                            <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2">
                                Telephone<span class="text-red-500">*</span>:
                            </label>
                            <input type="text" name="telephone" id="telephone" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4" required>
                        </div>
                        <div class="mb-4">
                            <label for="fax" class="block text-gray-700 text-sm font-bold mb-2">Fax:</label>
                            <input type="text" name="fax" id="fax" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                Email<span class="text-red-500">*</span>:
                            </label>
                            <input type="email" name="email" id="email" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4" required>
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block text-gray-700 text-sm font-bold mb-2">
                                Address<span class="text-red-500">*</span>:
                            </label>
                            <input type="text" name="address" id="address" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4" required>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create</button>
                            
                        </div>
                    </form>
                    
        <script>
            function confirmDelete(clientId, hasProjects) {
                if (hasProjects) {
                    if (confirm('Ce client a des projets liés à lui. Vous ne pouvez pas le supprimer avant de supprimer ses projets.')) {
                        document.getElementById('deleteForm' + clientId).submit();
                    }
                } else {
                    if (confirm('Êtes-vous sûr de vouloir supprimer ce client?')) {
                        document.getElementById('deleteForm' + clientId).submit();
                    }
                }
            }
        </script>
                </div>
            </div>
        </div>
    </div>
    
    

</x-app-layout>
