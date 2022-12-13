<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descryptions extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'title',
        'descryption',
        'h1',
    ];
}
