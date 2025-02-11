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
        return[
            "id" => $this->id,
            "chield" =>
                [
                    'name' => $this->child->name,
                    'image' => $this->child->full_image_path,
                    'age' => $this->child->birthdate ? \Carbon\Carbon::parse($this->child->birthdate)->age : null, // Calculate age if birthdate is provided
                ],
            "comment" => $this->comment,
            "rate" => $this->rate,

            "status" => $this->status,
            // "truncatedText" => "",
            // 'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
