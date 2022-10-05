<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function listProducts($id)
    {
        $products = DB::table('products')->where('id',$id)->get();
        /**
         * массив данных для заполнения карточек с размерами
         *
         */
        $arrayParametrsForkitchen = [
            [
                'id'=>'1',
                'titleCard'=>'Общая длинна кухни',
                'placeholderInput'=>'Длинна, мм',
                'initPrice'=>'25000',
            ],
            [
                'id'=>'2',
                'titleCard'=>'Общая высота кухни',
                'placeholderInput'=>'Высота, мм',
                'initPrice'=>'25000',
            ],

        ];


        return view('calculate',
            ['parametrs' => $arrayParametrsForkitchen,
            'products'=>[
                'type'=>'1',
                'name'=>'1',
                'initalizePrice'=>'1',
                ]
            ]

        );
    }
}
