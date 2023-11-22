<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class ProjectsController extends Controller
{

    public function index()
    {
        if (auth()->user()->can('view-all-projects')) {

            $projects = Project::all();

            return view('livewire.pages.projects.index', ['projects' => $projects]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = auth()->user();
        $project = Project::findOrFail($id);

        $belongsToProject = Project::whereHas('users', function ($query) use ($user){
            $query->where('users.id', $user->id);
        })->where('id', $project->id)->exists();

        if ( $user->can('view-all-projects') || $belongsToProject) {

        //     $issues = $project->issues;
            return view('projects.show', ['project' => $project]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
