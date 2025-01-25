<?php

namespace App\Http\Resources\Api;

use App\Models\Order;
use Carbon\Carbon;
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

'groups' => $this->groups->filter(function ($group) {
    $today = Carbon::today(); // Get today's date
    
    // Check if the group's day is today or in the future
    $isGroupFutureOrToday = Carbon::parse($group->day->date)->gt($today); // Greater than today

    // Check if the group exceeds the student limit
    $studentsInGroup = Order::where('group_id', $group->id)->count();
    $isGroupFull = $studentsInGroup >= $group->student_limit_per_group;

    // Only return groups that are either today or in the future and are not full
    return $isGroupFutureOrToday && !$isGroupFull;
})->map(function ($group) {
    return [
        'id' => $group->id,
        'name' => $group->name,
        'day' => [
            'id' => $group->day->id,
            'name' => $group->day->name,
            'date' => $group->day->date
        ],
    ];
}),
      
        ];
        
        }
}
