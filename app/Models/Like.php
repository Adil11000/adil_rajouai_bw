<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    // Relatie met het 'User' model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relatie met het 'Product' model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
