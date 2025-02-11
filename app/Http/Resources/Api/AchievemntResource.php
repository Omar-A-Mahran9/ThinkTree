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
            'lessons' => $this->Lessons,
            'puzzles' => $this->Puzzles,
            'stars' => $this->Stars,
            'online' => $this->Online,
            'kids_played' => $this->Kids_Played,
            'games' => $this->Games,
        ];

    }
}
