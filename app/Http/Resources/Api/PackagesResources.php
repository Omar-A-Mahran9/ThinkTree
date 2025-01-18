<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackagesResources extends JsonResource
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
            'icon' => $this->full_image_path,
            'name' => $this->name,
            'featured'=>$this->featured,
            'price'=>$this->FinalPrice,
            'old_price'=>$this->have_discount==1?$this->price:null,
            'price_per_session'=>$this->price_per_session,
            'duration_monthelly'=>$this->duration_monthly,
            'number_of_session_per_week'=>$this->number_of_session_per_week,
            'number_of_levels'=>$this->number_of_levels,
            'number_of_sessions'=>$this->number_of_sessions,
            'description' => $this->description,
            'outcomes' => $this->features->map(function ($feature) {
                return [
                    'name' => $feature->name, // Assuming the `Feature` model has a `name` attribute
                    'full_image_path' => $feature->full_image_path, // Assuming `full_image_path` is an accessor in the `Feature` model
                ];
            }),
           'features' => $this->features->map(function ($feature) {
                return [
                    'name' => $feature->name, // Assuming the `Feature` model has a `name` attribute
                    'full_image_path' => $feature->full_image_path, // Assuming `full_image_path` is an accessor in the `Feature` model
                ];
            }),

            'groups' => $this->groups->map(function ($group) {
                return [
                    'id' => $group->id, // Assuming `full_image_path` is an accessor in the `Feature` model
                    'name' => $group->name, // Assuming the `Feature` model has a `name` attribute
                    'day' => [
                        'id' => $group->day->id, // Assuming `full_image_path` is an accessor in the `Feature` model

                    'name' => $group->day->name, // Assuming `day` is a related model with a `name` attribute
                    'date' => $group->day->date // Assuming `day` is a related model with a `date` attribute
                ],


                ];
            }),

      
        ];
        
        }
}
