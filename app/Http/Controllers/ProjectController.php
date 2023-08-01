<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'projects' => Project::all(),
        ]);
    }

    public function show(Request $request, Project $project): \Illuminate\Http\RedirectResponse
    {
        cache()->put('log_viewer_file_paths', $project->filePaths);

        return redirect('log-viewer');
    }


    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'path' => 'required|string|max:255',
        ]);

        $project = Project::create([
            'name' => $request->name,
            'path' => $request->path,
        ]);

        return response()->json([
            'message' => 'Project created successfully',
            'project' => $project,
        ]);
    }

    public function destroy(Project $project): JsonResponse
    {
        $project->delete();

        return response()->json([
            'message' => 'Project deleted successfully',
        ]);
    }
}
