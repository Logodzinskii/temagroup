<?php

namespace App\Http\Controllers;

use App\Models\Descryptions;
use Illuminate\Http\Request;

class Offers extends Controller
{
    public function index($type){

        $descryptions = Descryptions::where('page','=','/offers/'.$type.'/')->get();
        $arr = [
            'kitchen'=>[
                [
                    'titleOffer'=>'Прямые кухни',
                    'optionsOffer'=>'Фасады пластик
                            Фурнитура blum
                            Интегрированная ручка
                            LED подсветка',
                    'priceOffers'=>'300 000',
                    'imagesOffers'=>[],
                ],
                [
                    'titleOffer'=>'Г - образные кухни',
                    'optionsOffer'=>'Фасады пластик
                            Фурнитура blum
                            Интегрированная ручка
                            LED подсветка',
                    'priceOffers'=>'300 000',
                    'imagesOffers'=>[],
                ],
                [
                    'titleOffer'=>'П - образные кухни',
                    'optionsOffer'=>'Фасады пластик
                            Фурнитура blum
                            Интегрированная ручка
                            LED подсветка',
                    'priceOffers'=>'300 000',
                    'imagesOffers'=>[],
                ],
            ],
            'wardrobe'=>[
                [
                    'titleOffer'=>'Прямые кухни',
                    'optionsOffer'=>'Фасады пластик
                            Фурнитура blum
                            Интегрированная ручка
                            LED подсветка',
                    'priceOffers'=>'300 000',
                    'imagesOffers'=>[],
                ],
                [
                    'titleOffer'=>'Г - образные кухни',
                    'optionsOffer'=>'Фасады пластик
                            Фурнитура blum
                            Интегрированная ручка
                            LED подсветка',
                    'priceOffers'=>'300 000',
                    'imagesOffers'=>[],
                ],
                [
                    'titleOffer'=>'П - образные кухни',
                    'optionsOffer'=>'Фасады пластик
                            Фурнитура blum
                            Интегрированная ручка
                            LED подсветка',
                    'priceOffers'=>'300 000',
                    'imagesOffers'=>[],
                ],
            ]

        ];
        return view('/offers/offers',['descryptions'=>$descryptions,'type'=>$arr[$type]]);
    }
}
