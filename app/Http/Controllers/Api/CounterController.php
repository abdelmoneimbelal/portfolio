<?php

namespace App\Http\Controllers\Api;

use App\Models\Counter;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CounterResource;

class CounterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $counters = Counter::all();
        
        if ($counters->count() > 0) {
            return ApiResponse::sendResponse(
                200,
                'Retrieve counters data successfully',
                CounterResource::collection($counters)
            );
        }
        
        return ApiResponse::sendResponse(200, 'No counters found', []);
    }
} 