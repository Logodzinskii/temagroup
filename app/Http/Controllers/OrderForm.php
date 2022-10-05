<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderForm extends Controller
{
    public function index()
    {
        return view('calculate');
    }
    public function listOrders()
    {
        $orders = Orders::all();
        return response()->json($orders);
    }
    public function orderUserStore(Request $request)
    {

        $order = new Orders();

        $order->userEmail = $request->email;
        $order->name = $request->firstname . '|' . $request->tel;

        $order->totalPrice = $request->sumForm;
        $order->status = 'new';

        /**

         * Все выбранные параметры кухни, внесем в таблицу orders в колонку в виде json
         */

         $parametrs = [];
          foreach ($request->input() as $key => $value)
          {
              $parametrs[] = [$key => $value];
          }
          $order->kitchenConfigurations = json_encode($parametrs);

      //601768998
      //645879928
      $text ='💬 заказ от ' . $request->firstname . ' 📱 '.  $request->tel .' 💳 ' . $request->sumForm;
      $response = array(
          'chat_id' => 601768998,
          'text' => $text
      );
        $token = config('conftelegram.telegram.token');
      $ch = curl_init('https://api.telegram.org/bot'.$token.'/sendMessage');
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $response);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_exec($ch);
      curl_close($ch);


        $order->save();

        return response()->json(['success'=>'ok']);
    }

    public function showDetailOrder($id)
    {
        $arrForm=[];

        $order = DB::table('orders')->where('id',$id)->get();

        $arr = [
            'facadesPrice'=>'Цена фасадов',
            'lengthBottleMaker'=>'Длинна Бутылошницы',
            'countBottleMaker'=>'количество бутылошниц',
            'lengthBoxOven'=>'Шкаф для Духовки',
            'countBoxOven' => 'Шкафов для духовки',
            'lengthBoxShelves' => 'Нижний модуль с полками',
            'countBoxShelves' => 'Количество нижних модулей с полками',
            'lengthBoxDishwasher' => 'Шкаф для посудомойки',
            'countBoxDishwasher' => 'Количество шкафов для посудомойки',
            'lengthBoxWashing' => 'Шкаф для мойки',
            'countBoxWashing' => 'Количество шкафов для мойки',
            'lengthBoxDown'=>'Фальшфасад для нижнего модуля',
            'countBoxDown'=>'Количество фальшфасадов для нижнего модуля',
            'lengthBoxDownFf'=>'Фальшфасад для пенала',
            'countBoxDownFf'=>'Количество фальшфасадов для пенала',
            'lengthBoxMiddle'=>'Верхние модули',
            'countBoxMiddle'=>'Количество верхних модулей',
            'lengthBoxTop'=>'Антресоли',
            'lengthPenalFridge'=>'Пенал холодильник',
            'countPenalFridge'=>'Пенал холодильник',
            'lengthPenalMicrowave'=>'Пенал микроволновка',
            'countPenalMicrowave'=>'Количество Пеналов для микроволновки',
            'lengthPenalShelves'=>'Пенал полки',
            'countPenalShelves'=>'Количествой Пеналов с полками',
            'lengthStolBoxTop'=> 'Столешница',
            'countStolBoxTop'=> 'Количество Столешниц',
            'body'=>'Дополнительно',
            'sumForm' => 'Итоговая цена за заказ',
        ];
        $res =[];


        foreach ($order as $ord)
        {
            $arrIn =json_decode($ord->kitchenConfigurations, true);

            foreach ($arrIn as $item)
            {
                $key = array_keys($item)[0];

                if(array_key_exists($key,$arr))
                {
                    $res[] =  [$arr[$key] .' - '. array_values($item)[0]];
                }

            }
        }
        //file_put_contents('test.log', print_r($arr));

        return view('details/details', ['details' => $order , 'parametrs' => $res]);
    }
}
