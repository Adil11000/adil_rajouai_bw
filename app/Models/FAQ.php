<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = 'faq_table'; 
    protected $fillable = ['question', 'answer', 'category'];
}