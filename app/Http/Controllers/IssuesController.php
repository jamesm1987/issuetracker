<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Project;

class IssuesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {  
        $projects = auth()->user()->projects()->get();
        return view('projects.issues.create', ['projects' => $projects, 'current_project' => $project ]);
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
    public function show(String $project_id, String $issue_number)
    {

        $issue = Issue::where('project_id', $project_id)->where('issue_number', $issue_number)->firstOrFail();
        
        
        return view('projects.issues.show', ['issue' => $issue]);
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
