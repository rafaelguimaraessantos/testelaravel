<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'weight',
        'value',
        'quantity_available',
    ];

    public function interesteds()
    {
        return $this->hasMany(CakeInterested::class);
    }
}