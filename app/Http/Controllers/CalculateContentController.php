<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;

class CalculateContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function showKitchen($model)
    {
        $arr = [
            [   'nameClassBox'=>'BottleMaker',
                'nameBoxBottom'=>'Бутылошница',
                'placeholder'=>'кол-во, шт',
                'typeBox'=>'parallelogram',
                'defaultLen'=>[150,200],
                'defaultNum'=>'0',
                'price'=>'5400',

            ],
            [   'nameClassBox'=>'BoxOven',
                'nameBoxBottom'=>'Шкаф для Духовки',
                'placeholder'=>'кол-во, шт',
                'typeBox'=>'parallelogram',
                'defaultLen'=>[600,800],
                'defaultNum'=>'0',
                'price'=>'12400',

            ],
            [   'nameClassBox'=>'BoxShelves',
                'nameBoxBottom'=>'Шкаф с ящиками',
                'placeholder'=>'кол-во, шт',
                'typeBox'=>'parallelogram',
                'defaultLen'=>[450, 600, 800],
                'defaultNum'=>'0',
                'price'=>'23400',

            ],
            [   'nameClassBox'=>'BoxDishwasher',
                'nameBoxBottom'=>'Ширина посудомойки',
                'placeholder'=>'кол-во, шт',
                'typeBox'=>'parallelogram',
                'defaultLen'=>[450,600],
                'defaultNum'=>'0',
                'price'=>'6400',

            ],
            [   'nameClassBox'=>'BoxWashing',
                'nameBoxBottom'=>'Шкаф для мойки',
                'placeholder'=>'кол-во, шт',
                'typeBox'=>'parallelogram',
                'defaultLen'=>[450,600,800],
                'defaultNum'=>'0',
                'price'=>'12400',

            ],

            [   'nameClassBox'=>'BoxDown',
                'nameBoxBottom'=>'Фальшфасад для нижнего модуля',
                'placeholder'=>'кол-во, шт',
                'typeBox'=>'modules',
                'defaultLen'=>[600],
                'defaultNum'=>'0',
                'price'=>'25400',
            ],
            [   'nameClassBox'=>'BoxDownFf',
                'nameBoxBottom'=>'Фальшфасад для пенала',
                'placeholder'=>'кол-во, шт',
                'typeBox'=>'modules',
                'defaultLen'=>[600],
                'defaultNum'=>'0',
                'price'=>'25400',
            ],

            [   'nameClassBox'=>'HTotal',
                'nameBoxBottom'=>'Высота кухни',
                'placeholder'=>'нет',
                'typeBox'=>'parallelogram',
                'defaultLen'=>[],
                'defaultNum'=>'0',
                'price'=>'12400',

            ],

            [   'nameClassBox'=>'BoxMiddle',
                'nameBoxBottom'=>'Верхние мод',
                'placeholder'=>'общая длинна, мм',
                'typeBox'=>'parallelogram',
                'defaultLen'=>[],
                'defaultNum'=>'0',
                'price'=>'25400',

            ],
            [   'nameClassBox'=>'BoxTop',
                'nameBoxBottom'=>'Антресоли',
                'placeholder'=>'общая длинна, мм',
                'typeBox'=>'parallelogram',
                'defaultLen'=>[],
                'defaultNum'=>'0',
                'price'=>'25400',

            ],
            [   'nameClassBox'=>'PenalFridge',
                'nameBoxBottom'=>'Пенал холодильник',
                'placeholder'=>'кол-во, шт',
                'typeBox'=>'parallelogram',
                'defaultLen'=>[600],
                'defaultNum'=>'0',
                'price'=>'19500',

            ],
            [   'nameClassBox'=>'PenalMicrowave',
                'nameBoxBottom'=>'Пенал микроволновка',
                'placeholder'=>'кол-во, шт',
                'typeBox'=>'parallelogram',
                'defaultLen'=>[600],
                'defaultNum'=>'0',
                'price'=>'19500',

            ],
            [   'nameClassBox'=>'PenalShelves',
                'nameBoxBottom'=>'Пенал полки',
                'placeholder'=>'кол-во, шт',
                'typeBox'=>'parallelogram',
                'defaultLen'=>[600],
                'defaultNum'=>'0',
                'price'=>'19500',

            ],

        ];
        $facades = [
                        [
                            'name' => 'Фрезеровка',
                            'image' => 'images/frez.png',
                            'type'=>
                                [
                                    [   'nameFacades' => 'Пленка',
                                        'priceFacades'=>'16250',
                                    ],
                                    [   'nameFacades' => 'Эмаль',
                                        'priceFacades'=>'17250',
                                    ],
                                ]
                        ],
                        [
                            'name' => '3D Фрезеровка',
                            'image' => 'images/3dfrez.png',
                            'type'=>
                                [
                                    [   'nameFacades' => 'Пленка',
                                        'priceFacades'=>'18250',
                                    ],
                                    [   'nameFacades' => 'Эмаль',
                                        'priceFacades'=>'19250',
                                    ],
                                ]
                        ],
                        [
                            'name' => 'Прямой',
                            'image' => 'images/prjam.png',
                            'type'=>
                                [
                                    [   'nameFacades' => 'Пленка',
                                        'priceFacades'=>'20250',
                                    ],
                                    [   'nameFacades' => 'Эмаль',
                                        'priceFacades'=>'21250',
                                    ],
                                    [   'nameFacades' => 'Пластик',
                                        'priceFacades'=>'22250',
                                    ],
                                ]
                        ],

        ];

        $newArr = DB::table('products')->where('productName', $model)->orderByRaw('color ASC')->get();
        $facades = DB::table('price_kitchens')->where('nameProject', 'kitchen')->get();
        return view('/calculator/calcForm', ['items' => json_decode($newArr,true), 'facades'=> json_decode($facades, true)]);

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {
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
        return view('calculate',['parametrs' => $arrayParametrsForkitchen]);
    }

    public function ajaxDataResp(Request $request)
    {

            // Store Data in DATABASE from HERE
        $arr = [
            'priceBox' => 8750,
            'priceFacade' => 16250,
            'heightKitchenTotal'=> 2050,
            'heightKitchenBoxDown' => 820,
            'kitchenDepth' => 600,
            'kitchenPriceAprons' => 6500,
            'kitchenPriceStol' => 9500,
            'kitchenLengthTypeA' => 0,
            'kitchenLengthTypeB' => 800,
            'kitchenLengthTypeC' => 0,
            'pencilCaseForTheKitchenFridgeLength' => 600,
            'pencilCaseForTheKitchenMicrowaveLength' => 600,
            'pencilCaseForTheKitchenShelvesLength'=> 600,
            'pricePencilCaseForTheKitchenFridge'=> 600,
            'pricePencilCaseForTheKitchenMicrowave'=> 600,
            'pricePencilCaseForTheKitchenShelves'=> 600,
            'kitchenBoxTopLength'=> 600,
            'kitchenBoxMiddleLength'=> 600,
            'kitchenBoxWashingLength'=> 600,
            'kitchenBoxDishwasherLength'=> 450,
            'kitchenBoxOvenLength'=>600,
            'kitchenBoxShelvesLength'=> 500,
            'kitchenBoxShelvesOptionsPrice'=>7500,
            'kitchenBottleMakerLength'=> 200,
            'kitchenBottleMakerOptionsPrice'=> 6500,
            'FalseFacadeHiLength'=> 600,
            'FalseFacade1LowLength'=> 600,
            'lengthAprons'=>3000,
            'lengthStol'=>3000,
        ];
        $kitchen = new Kitchen($arr);
        $kitchen->initializeKitchen();

        $kitchen->setPriceFacade($request->facadesPrice);

        switch ($request->type)
        {
            case strpos($request->type,'ottleMaker') > 0:
                $kitchen->setKitchenBottleMakerLength($request->length);
                $count = $request->count;
                //$price = $kitchen->getCostBottleMaker() * $count;
                $price = $count*($kitchen->getCostPLH($request->facadesPrice, $request->length, $arr['heightKitchenBoxDown']) + 6500);
                break;
            case strpos($request->type,'oxOven') > 0:
                $kitchen->setKitchenBoxOvenLength($request->length);
                $count = $request->count;
                //$price = $kitchen->getCostOven() * $count;
                $price = $count*($kitchen->getCostPLH($request->facadesPrice, $request->length, $arr['heightKitchenBoxDown']) + 3500);
                break;
            case strpos($request->type,'oxShelves') > 0:
                $kitchen->setKitchenBoxShelvesLength($request->length);
                $count = $request->count;
                //$price = $kitchen->getCostBoxShelves() * $count;
                $price = $count*($kitchen->getCostPLH($request->facadesPrice, $request->length, $arr['heightKitchenBoxDown']) + 12500);
                break;
            case strpos($request->type,'oxDishwasher') > 0:
                $kitchen->setKitchenBoxDishwasherLength($request->length);
                $count = $request->count;
                //$price = $kitchen->getCostBoxDishwasher() * $count;
                $price = $count*($kitchen->getCostPLH($request->facadesPrice, $request->length, $arr['heightKitchenBoxDown']) + 3500);
                break;
            case strpos($request->type,'oxWashing') > 0:
                $kitchen->setKitchenBoxWashingLength($request->length);
                $count = $request->count;
                //$price = $kitchen->getCostBoxWashing() * $count;
                $price = $count*($kitchen->getCostPLH($request->facadesPrice, $request->length, $arr['heightKitchenBoxDown']) + 3500);
                break;
            case strpos($request->type,'oxTop') > 0 &&  strlen($request->type) == 6:
                $kitchen->setKitchenBoxTopLength($request->length);
                $count = $request->count;
                $price = $kitchen->getCostBoxTop() * $count;
                break;
            case strpos($request->type,'oxMiddle') > 0 :
                $kitchen->setKitchenLengthTypeB($request->length);
                $count = $request->count;
                $price = $kitchen->getCostBoxMiddle() * $count;
                break;
            case strpos($request->type,'oxDown') == 1 &&  strlen($request->type) == 7:
                $count = $request->count;
                $price = 4500 * $count;
                break;
            case strpos($request->type,'Ff') == 7:
                $count = $request->count;
                $price = 9000 * $count;
                break;
            case strpos($request->type,'enal') > 0:
                $count = $request->count;
                //$price = 19000 * $count;
                $price = $count*($kitchen->getCostPLH($request->facadesPrice, $request->length, $arr['heightKitchenBoxDown']) + 11300);
                break;
            case strpos($request->type,'tolB') > 0:
                $kitchen->setLengthStol($request->length);
                $count = $request->count;
                $price = $kitchen->getCostStol();
                break;
            case strpos($request->type,'Apr') >0;
                $kitchen->setLengthAprons($request->length);
                $price = $kitchen->getCostAprons();
                break;
                case strpos($request->type,'olBox') > 0:
                    $count = $request->count;
                    $price = 0 * $count;
                    break;
        }
        /*$priceBox = $kitchen->getCostPLH($arr['priceBox'], $request->length, $arr['heightKitchenBoxDown']);
        $priceFacades = $kitchen->getCostPLH($request->facadesPrice, $request->length, $arr['heightKitchenBoxDown']);
        $price = ($priceBox + $priceFacades) * $request->count;*/
        return response()->json([ceil($price)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
