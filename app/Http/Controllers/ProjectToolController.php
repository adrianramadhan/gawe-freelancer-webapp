<?php

namespace App\Http\Controllers;

use App\Models\ProjectTool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(ProjectTool $projectTool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectTool $projectTool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectTool $projectTool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectTool $projectTool)
    {
        DB::beginTransaction();

        try {
            // Get the project ID from the pivot table to redirect back to the tools page
            $project = $projectTool->project_id;

            // Delete the pivot record
            $projectTool->delete();

            DB::commit();

            return redirect()->route('admin.projects.tools', $project)
                ->with('success', 'Tool removed from the project successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('admin.projects.tools', $project)
                ->with('error', 'Failed to remove the tool from the project.');
        }
    }
}
