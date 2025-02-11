<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AchievemntResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'lessons' => number_format($this->Lessons),
        'puzzles' => number_format($this->Puzzles),
        'stars' => number_format($this->Stars),
        'online' => number_format($this->Online),
        'kids_played' => number_format($this->Kids_Played),
        'games' => number_format($this->Games),
        ];

    }
}
