<?php

namespace App\Http\Controllers;
use App\Models\PriceKitchen;
use Illuminate\Support\Facades\DB;
use App\Models\Orders;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')->paginate(10);
        //var_dump((json_encode($orders)));
        return view('admin/admin', ['orders'=>json_decode(json_encode($orders),true)]);

    }
    public function editFacadesPrice()
    {
        $facades = DB::table('price_kitchens')->where('nameProject', 'kitchen')->get();

        return view('admin/adminedit', ['facades'=> json_decode($facades, true)]);
    }

    /**
     * CRUD для изменения цен на фасады
     */

    public function addFacadesPrice(Request $request)
    {
        $facadPrice = new PriceKitchen();
        $facadPrice->nameProject = $request->nameProject;
        $facadPrice->nameFacades = $request->nameFacades;

        $facadPrice->imageFacades = $request->imageFacades;
        $facadPrice->typeFacades = $request->typeFacades;

        $facadPrice->save();
        $id = $facadPrice->id;
        return response()->json([$id]);
    }

    public function deleteFacadesPrice($id)
    {
        $id = explode('=',$id,);
        DB::table('price_kitchens')->where('id',$id[1])->delete();

    }
    public function updateFacadesPrice(Request $request)
    {
        $id = $request->id;

        DB::table('price_kitchens')
            ->where('id', $id)
            ->update([
                'nameProject' => $request->nameProject,
                'nameFacades' => $request->nameFacades,
                'imageFacades'=>$request->imageFacades,
                'typeFacades'=>$request->typeFacades
                ]);
    }
}
