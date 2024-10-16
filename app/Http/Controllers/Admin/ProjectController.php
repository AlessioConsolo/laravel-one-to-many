<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
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
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'type_id' => 'nullable|exists:types,id'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cover_images', 'public');
            $validated['cover_image'] = $imagePath;
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Progetto creato con successo');
    }


    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }


    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }



    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'type_id' => 'nullable|exists:types,id'
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

