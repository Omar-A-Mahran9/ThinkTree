<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = [ ];
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];

    public function package()
    {
        return $this->belongsTo(Packages::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

   

}
