<?php

namespace App\Http\Controllers\Api;

use App\Models\Setting;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResoures;

class SettingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $settings = Setting::find(1);
        if ($settings)
            return ApiResponse::sendResponse(
                200,
                'Retrieve settings data successfully',
                new SettingResoures($settings)
            );
            return ApiResponse::sendResponse(200, 'Settings not found', []);
    }
}
