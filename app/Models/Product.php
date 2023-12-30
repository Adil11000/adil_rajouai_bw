<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        // Add other fields as needed
    ];

    protected $dates = ['created_at'];


    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
