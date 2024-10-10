<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }


    public function create()
    {
        return view('admin.projects.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('cover_images', 'public');
            
            $validated['cover_image'] = $imagePath;
        }

        // Crea il progetto con i dati validati
        $project = Project::create($validated);

        // Reindirizza con un messaggio di successo
        return redirect()->route('admin.projects.index')->with('success', 'Progetto creato con successo');
    }


    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }


    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }


    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {

            if ($project->cover_image) {
                Storage::disk('public')->delete($project->cover_image);
            }

            $imagePath = $request->file('image')->store('cover_images', 'public');
            
            $validated['cover_image'] = $imagePath;
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Progetto aggiornato con successo');
    }


    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato con successo');
    }

}

