<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Resources\Json\JsonResource;

trait HttpResponses
{
    public function response(string $message, string|int $status, array|Model|JsonResource $data=[]): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            "status"=> $status,
            "message"=> $message,
            "data"=> $data
        ], $status);
    }

    public function error(string $message, string|int $status, array|MessageBag $errors = [], array $data = []): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'message' => $message,
            'status' => $status,
            'errors' => $errors,
            'data' => $data
        ], $status);
    }
}