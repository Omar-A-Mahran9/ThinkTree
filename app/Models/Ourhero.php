<?php

namespace App\Models;

use App\Models\Scopes\SortingScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ourhero extends Model
{
    use HasFactory;

    protected $fillable = [ 'image','name_ar','name_en','age','city_id' ]; // Add this array to allow mass assignment of the 'image' attribute
    protected $appends = ['name', 'full_image_path'];
    protected $casts   = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new SortingScope);
    }

    public function getNameAttribute()
    {
        return $this->attributes['name_' . app()->getLocale()];
    }


    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function getFullImagePathAttribute()
    {
        return asset(getImagePathFromDirectory($this->image, 'heroes', "default.svg"));
    }
}
