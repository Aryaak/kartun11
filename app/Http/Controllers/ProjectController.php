<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $search = request('search');
        $projects = Project::all();

        return view('pages.projects.index', compact('search', 'projects'));
    }

    public function create()
    {
        return view('pages.projects.create');
    }

    public function store()
    {

        $request = request()->all();

        $imagePath = request()->file('image')->store('images/projects', 'public');

        Project::create([
            'image' => $imagePath,
            'name' => $request['name'],
            'description' => $request['description'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
        ]);

        return redirect()->route('project.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('pages.projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $request = request()->all();

        if (request()->hasFile('image')) {
            Storage::disk('public')->delete($project->image);
            $imagePath = request()->file('image')->store('images/projects', 'public');
            $project->image = $imagePath;
        }

        $project->update($request);

        return redirect()->route('project.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        Storage::disk('public')->delete($project->image);
        $project->delete();

        return redirect()->route('project.index')->with('success', 'Project deleted successfully.');
    }
}
