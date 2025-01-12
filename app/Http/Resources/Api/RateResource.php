<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
             "chield" => $this->customer->chields->isEmpty() 
            ? null // If no chields, return null
            : $this->customer->chields->map(function ($chield) {
                return [
                    'name' => $chield->name,
                    'image' => $chield->full_image_path,
                    'age' => $chield->birthdate ? \Carbon\Carbon::parse($chield->birthdate)->age : null, // Calculate age if birthdate is provided
                ];
            }),
            "comment" => $this->comment,
            "status" => $this->status,
            // "truncatedText" => "",
            // 'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
