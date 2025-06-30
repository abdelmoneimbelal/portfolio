<?php

namespace App\Http\Controllers\Api;

use App\Models\Slider;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;

class SliderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $sliders = Slider::active()->get();
        
        if ($sliders->count() > 0) {
            return ApiResponse::sendResponse(
                200,
                'Retrieve sliders data successfully',
                SliderResource::collection($sliders)
            );
        }
        
        return ApiResponse::sendResponse(200, 'No active sliders found', []);
    }
} 