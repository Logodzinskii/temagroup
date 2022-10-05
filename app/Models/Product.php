<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'productType',
        'productName',
        'price',
        'initializePrice',
        'nameClassBox',
        'nameBoxBottom',
        'placeholder',
        'typeBox',
        'defaultLen',
        'defaultNum',
        'priceDopOptions',
    ];
}
