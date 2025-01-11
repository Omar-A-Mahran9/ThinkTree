<?php

namespace App\Http\Resources\Api;

use App\Enums\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HeroesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'image' => $this->full_image_path,
            'city' => [
                'id' => $this->city->id,
                'name' => $this->city->name, // You can use name_en or name_ar based on the locale
                'full_image_path' => $this->city->full_image_path,
            ],

           
        ];
    }
}
