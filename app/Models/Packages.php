<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = [ 'name', 'full_image_path','FinalPrice' ];
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];

    public function getNameAttribute()
    {
        return $this->attributes['name_' . app()->getLocale()];
    }
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'package_feature', 'package_id', 'feature_id');
    }

    public function outcomes()
    {
        return $this->belongsToMany(Outcome::class, 'package_outcome', 'package_id', 'outcome_id');
    }
    public function getFullImagePathAttribute()
    {
        return asset(getImagePathFromDirectory($this->image, 'Packages', "default.svg"));
    }

    public function getFinalPriceAttribute()
    {
        if ($this->have_discount) {
            return $this->discount_price ?: $this->price;
        }

        return $this->price;
    }
}
