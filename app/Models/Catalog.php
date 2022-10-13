<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'article',
        'type',
        'name',
        'meta_title',
        'meta_descriptions',
        'configurations',
        'options',
        'image',
        'file',
        'price',
        'delivery_price',
        'delivery_day',
        'installation_price',
        'status',
    ];

}
