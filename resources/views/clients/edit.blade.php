<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Edit Client Form -->
                    <form action="{{ route('clients.update', $client->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Editable Fields -->
                        <div class="mb-4">
                            <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom:</label>
                            <input type="text" name="nom" id="nom" value="{{ $client->nom }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4">
                        </div>
                        <div class="mb-4">
                            <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">Prenom:</label>
                            <input type="text" name="prenom" id="prenom" value="{{ $client->prenom }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4">
                        </div>
                        <div class="mb-4">
                            <label for="societe" class="block text-gray-700 text-sm font-bold mb-2">Societe:</label>
                            <input type="text" name="societe" id="societe" value="{{ $client->societe }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4">
                        </div>
                        <div class="mb-4">
                            <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2">Telephone:</label>
                            <input type="text" name="telephone" id="telephone" value="{{ $client->telephone }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4">
                        </div>
                        <div class="mb-4">
                            <label for="fax" class="block text-gray-700 text-sm font-bold mb-2">Fax:</label>
                            <input type="text" name="fax" id="fax" value="{{ $client->fax }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="email" name="email" id="email" value="{{ $client->email }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4">
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address:</label>
                            <input type="text" name="address" id="address" value="{{ $client->address }}" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-1/4">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
