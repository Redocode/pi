<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all(); // Assuming you have a Client model

        return view('clients.index', ['clients' => $clients]);
    }
    public function create()
    {
        return view('clients.create');
    }
    /**
     * Store a newly created client in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'societe' => 'nullable|string|max:255',
            'telephone' => 'required|string|max:255',
            'fax' => 'nullable|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'address' => 'required|string|max:255',

            // Add validation rules for other fields as needed
        ]);

        $validatedData['societe'] = $validatedData['societe'] ?? 'NONE';
        $validatedData['fax'] = $validatedData['fax'] ?? 'NONE';
        // Create the client using the validated data
        $client = Client::create($validatedData);

        // Redirect to a relevant page (e.g., index) or return a response
        return redirect()->route('clients.index')->with('success', 'Client created successfully!');
    }
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'societe' => 'nullable|string|max:255',
            'telephone' => 'required|string|max:255',
            'fax' => 'nullable|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $id, // Ignore unique constraint for current client
            'address' => 'required|string|max:255',
        ]);
        $validatedData['societe'] = $validatedData['societe'] ?? 'NONE';
        $validatedData['fax'] = $validatedData['fax'] ?? 'NONE';

        // Find the client by ID
        $client = Client::findOrFail($id);

        // Update the client using the validated data
        $client->update($validatedData);

        // Redirect to a relevant page or return a response
        return redirect()->route('clients.index')->with('success', 'Client updated successfully!');
    }

    public function destroy($id)
    {
        // Find the client by id
        $client = Client::findOrFail($id);

        // Check if the client has any related projects
        if ($client->projects->isNotEmpty()) {
            // If the client has related projects, show a confirmation message
            return redirect()->back();
        }

        // If the client has no related projects, delete the client
        $client->delete();

        // Redirect back to the index page or any other relevant page
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully!');
    }

}
