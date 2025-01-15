<?php

namespace App\Models;

use App\Models\Scopes\SortingScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;


    protected $guarded = [];
    protected $appends = [];
    protected $casts = [
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

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_day_time');
    }

    public function days()
    {
        return $this->belongsToMany(Day::class, 'group_day_time');
    }
}
