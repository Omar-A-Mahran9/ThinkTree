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
            'parents_experiment' => +$this->Parents_experiment,
            'training_hours' => +$this->Traning_houres, // Ensure numeric formatting
            'our_heroes' => +$this->Our_heroes,
            'heroes_rate' => +$this->Heroes_rate,
        ];

    }
}
