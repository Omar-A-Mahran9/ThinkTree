<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NumberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'parents_experiment' => $this->Parents_experiment,
            'training_hours' => number_format($this->Traning_houres), // Ensure numeric formatting
            'our_heroes' => number_format($this->Our_heroes),
            'heroes_rate' => number_format($this->Heroes_rate),
        ];

    }
}
