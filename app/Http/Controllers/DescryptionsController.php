<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Descryptions;
use Illuminate\Support\Facades\DB;
class DescryptionsController extends Controller
{
    /**
     * CRUD
     */

    public function indexDescryptions($id=null)
    {
        $descryptions = new Descryptions();
        if(isset($id)){

            $descryptions::find($id);

        }else{

            $descryptions = new Descryptions();
            $descryptions::all();

        }

        return $descryptions;
    }

    public function createDescryption(Request $request)
    {
        $descryptions = new Descryptions();
        $descryptions->page = $request->page;
        $descryptions->descryption = $request->descryption;
        $descryptions->title = $request->title;
        $descryptions->h1 = $request->h1;
        $descryptions->save();
    }

    public function updateDescryption(Request $request)
    {
        $descryptions = DB::table('descryption')
            ->where('id', $request->id)
            ->update([
                'page'=>$request->page,
                'descryption'=>$request->descryption,
                'title'=>$request->title,
                'h1'=>$request->h1,
            ]);
    }

    public function deleteDescryption(Request $request)
    {
        Descryptions::find($request->id)->delete();

    }
}
