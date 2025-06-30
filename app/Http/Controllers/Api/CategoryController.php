<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $categories = Category::withCount('projects')->get();
        
        if ($categories->count() > 0) {
            return ApiResponse::sendResponse(
                200,
                'Retrieve categories data successfully',
                CategoryResource::collection($categories)
            );
        }
        
        return ApiResponse::sendResponse(200, 'No categories found', []);
    }
} 