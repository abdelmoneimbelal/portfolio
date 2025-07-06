<?php

namespace App\Http\Controllers\Api;

use App\Models\AboutUs;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AboutUsResource;

class AboutUsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $aboutUs = AboutUs::find(1);
        
        if ($aboutUs) {
            return ApiResponse::sendResponse(
                200,
                'Retrieve about us data successfully',
                new AboutUsResource($aboutUs)
            );
        }
        
        return ApiResponse::sendResponse(200, 'About us not found', []);
    }
} 