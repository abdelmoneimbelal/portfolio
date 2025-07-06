<?php

namespace App\Http\Controllers\Api;

use App\Models\Message;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;

class MessageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(MessageRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $validatedData['status'] = 0; // 0 = unread, 1 = read
            
            $message = Message::create($validatedData);

            return ApiResponse::sendResponse(
                201,
                'Message sent successfully',
                new MessageResource($message)
            );
        } catch (\Exception $e) {
            return ApiResponse::sendResponse(
                500,
                'Failed to send message',
                []
            );
        }
    }
} 