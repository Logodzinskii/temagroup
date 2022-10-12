<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function store($article)
    {

        return view('catalog/catalog');
    }
}
