<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ProjectDetailsResource;

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
        $project = Project::with(['category', 'images'])->find($id);
        
        if ($project) {
            return ApiResponse::sendResponse(200, 'Retrieve project data successfully', new ProjectDetailsResource($project));
        }
        
        return ApiResponse::sendResponse(404, 'Project not found', null);
    }

    //get project images by project id
    public function images($id)
    {
        $project = Project::with('images')->find($id);
        
        if ($project) {
            return ApiResponse::sendResponse(
                200, 
                'Retrieve project images successfully', 
                $project->images->map(function ($image) {
                    return [
                        'id' => $image->id,
                        'image' => $image->image,
                        'sort_order' => $image->sort_order,
                        'created_at' => $image->created_at->format('d-m-Y H:i:s'),
                    ];
                })
            );
        }
        
        return ApiResponse::sendResponse(404, 'Project not found', null);
    }
} 