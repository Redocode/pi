<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Client;

class ProjectController extends Controller
{
    public function index()
    {
        // Récupérer tous les projets et les passer à la vue
        $projects = Project::all();
        return view('projects.index', ['projects' => $projects]);
    }

    public function create()
    {
        // Récupérer tous les clients et les passer à la vue
        $clients = Client::all();

        return view('projects.create', ['clients' => $clients]);
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'client_id' => 'required|integer',
            'numero_projet' => 'required|string|max:255',
            'createur_id' => 'required|integer',
            'date_creation' => 'required|date',
            'nom_projet' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Créer un nouveau projet
        Project::create($validatedData);

        // Rediriger vers la page index des projets
        return redirect()->route('projects.index')->with('success', 'Projet créé avec succès!');
    }

    public function edit($id)
    {
        // Récupérer le projet à modifier
        $project = Project::findOrFail($id);

        // Récupérer tous les clients pour le formulaire de modification
        $clients = Client::all();

        // Passer les données du projet et des clients à la vue d'édition
        return view('projects.edit', compact('project', 'clients'));
    }

    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'client_id' => 'required|integer',
            'numero_projet' => 'required|string|max:255',
            'createur_id' => 'required|integer',
            'date_creation' => 'required|date',
            'nom_projet' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Mettre à jour le projet correspondant à l'ID donné
        Project::findOrFail($id)->update($validatedData);

        // Rediriger vers la page index des projets
        return redirect()->route('projects.index')->with('success', 'Projet mis à jour avec succès!');
    }

    public function destroy($id)
    {
        // Trouver le projet à supprimer
        $project = Project::findOrFail($id);

        // Supprimer le projet
        $project->delete();

        // Rediriger vers la page index des projets
        return redirect()->route('projects.index')->with('success', 'Projet supprimé avec succès!');
    }


}
