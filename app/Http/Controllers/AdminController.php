<?php

namespace App\Http\Controllers;
use App\Models\PriceKitchen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Orders;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected string $status;

    protected function isAdmin()
    {
        $user = Auth::user();

        if($user['status'] === 'admin')
        {

            $this->status = $user['status'];

        }else{

            $this->status = 'none';
        }
    }
    public function index()
    {
            self::isAdmin();
            if ($this->status === 'admin' )
            {
                $orders = DB::table('orders')->paginate(10);
                //var_dump((json_encode($orders)));
                return view('admin/admin', ['orders'=>json_decode(json_encode($orders),true)]);
            }else
            {
                return view('404');
            }



    }
    public function editFacadesPrice()
    {
        self::isAdmin();
        if ($this->status === 'admin' )
        {
        $facades = DB::table('price_kitchens')->where('nameProject', 'kitchen')->get();

        return view('admin/adminedit', ['facades'=> json_decode($facades, true)]);
        }else
        {
            return view('404');
        }
    }

    /**
     * CRUD для изменения цен на фасады
     */

    public function addFacadesPrice(Request $request)
    {
        self::isAdmin();
        if ($this->status === 'admin' )
        {
        $facadPrice = new PriceKitchen();
        $facadPrice->nameProject = $request->nameProject;
        $facadPrice->nameFacades = $request->nameFacades;

        $facadPrice->imageFacades = $request->imageFacades;
        $facadPrice->typeFacades = $request->typeFacades;

        $facadPrice->save();
        $id = $facadPrice->id;
        return response()->json([$id]);
        }else
        {
            return view('404');
        }
    }

    public function deleteFacadesPrice($id)
    {
        self::isAdmin();
        if ($this->status === 'admin' )
        {
        $id = explode('=',$id,);
        DB::table('price_kitchens')->where('id',$id[1])->delete();
        }else
        {
            return view('404');
        }

    }
    public function updateFacadesPrice(Request $request)
    {
        self::isAdmin();
        if ($this->status === 'admin' )
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
        }else
        {
            return view('404');
        }
    }
}
