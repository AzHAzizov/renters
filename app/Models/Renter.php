<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Renter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function car(): HasOne
    {
        return $this->hasOne(Car::class, 'renter_id'); // get foreign_key of Car to Renter
    }
}
