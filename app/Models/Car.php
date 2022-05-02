<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'user_id'
    ];


    public function renter(): BelongsTo
    {
        return $this->belongsTo(Renter::class, 'renter_id'); // get foreign_key of Car to Renter
    }
}
