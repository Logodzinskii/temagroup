<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompleteProject extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'article',
        'type',
        'name',
        'meta_title',
        'meta_descriptions',
        'image',
        'price',
        'chpu_complite',
    ];
}
