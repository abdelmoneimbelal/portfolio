<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;

class ProjectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $projects = Project::with('category')->get();
        
        if ($projects->count() > 0) {
            return ApiResponse::sendResponse(
                200,
                'Retrieve projects data successfully',
                ProjectResource::collection($projects)
            );
        }
        
        return ApiResponse::sendResponse(200, 'No projects found', []);
    }

    //show project by id
    public function show($id)
    {
        $project = Project::find($id);
        
        if ($project) {
            return ApiResponse::sendResponse(200, 'Retrieve project data successfully', new ProjectResource($project));
        }
    }
} 