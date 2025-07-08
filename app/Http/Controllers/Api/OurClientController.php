<?php

namespace App\Http\Controllers\Api;

use App\Models\OurClient;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OurClientResource;

class OurClientController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $ourClients = OurClient::get();
        
        if ($ourClients->count() > 0) {
            return ApiResponse::sendResponse(
                200,
                'Retrieve our clients data successfully',
                OurClientResource::collection($ourClients)
            );
        }
        
        return ApiResponse::sendResponse(200, 'No clients found', []);
    }
}
