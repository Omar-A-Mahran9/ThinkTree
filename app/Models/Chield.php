<?php

namespace App\Models;

use App\Models\Scopes\SortingScope;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
 use Laravel\Sanctum\HasApiTokens;

class Chield extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $appends = [  'full_image_path'];
    protected $guarded = [];
    protected $casts   = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d', 'otp' => 'string'];
 
    protected static function booted(): void
    {
        static::addGlobalScope(new SortingScope);
    }
 
    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function getFullImagePathAttribute()
    {
        return asset(getImagePathFromDirectory($this->image, 'chields', "default.svg"));
    }
}
