<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'rout_name',
        'name',
        'meta_name',
        'meta_descriptions',
        'view',
        'tag',
        'tag_content',
        'page_status',
    ];

}
