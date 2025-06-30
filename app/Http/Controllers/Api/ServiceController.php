<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;

class ServiceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $services = Service::all();
        
        if ($services->count() > 0) {
            return ApiResponse::sendResponse(
                200,
                'Retrieve services data successfully',
                ServiceResource::collection($services)
            );
        }
        
        return ApiResponse::sendResponse(200, 'No services found', []);
    }
} 