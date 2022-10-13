<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\File\File;

class CatalogController extends Controller
{

    public function index()
    {
        $catalog = Catalog::all();

        return view('main', ['catalog' => $catalog]);
    }
    public function store($article)
    {
        $offers = Catalog::all();
        return view('catalog/catalog', ['offer'=>Catalog::where('article', $article)->get(), 'offers'=>$offers]);
    }

    public function create(Request $request)
    {
        if($request->hasFile('image'))
        {
            $paths =[];

            foreach ($request->file('image') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move('images/projects/'.$request->article, $name);
                $paths[] = 'images/projects/'.$request->article. '/' . $name;
            }

        }

        $pathFile = '';
        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $file->move('prices/'. $request->article, $request->article . '.pdf');
            $pathFile = $request->article . '.pdf';
        }

            $offer = new Catalog();
            $offer->category = $request->category;
            $offer->article= $request->article;
            $offer->type= $request->type;
            $offer->name= $request->name;
            $offer->meta_title= $request->meta_title;
            $offer->meta_descriptions= $request->meta_descriptions;
            $offer->configurations= $request->configurations;
            $offer->options= $request->options;
            $offer->image= json_encode($paths);
            $offer->file= $pathFile;
            $offer->price= $request->price;
            $offer->delivery_price= $request->delivery_price;
            $offer->delivery_day= $request->delivery_day;
            $offer->installation_price= $request->installation_price;
            $offer->status= $request->status;
            $offer->save();
        return \redirect('/admin/offers/edit/');

    }

    public function deleteOffer(Request $request)
    {
        $path = Catalog::where('id',$request->id)
            ->get();
        $delPath = 'images/projects/'.$path[0]['article'];

        $delPathPrices = 'prices/'.$path[0]['article'];
        \Illuminate\Support\Facades\File::deleteDirectory($delPath);
        \Illuminate\Support\Facades\File::deleteDirectory($delPathPrices);
        Catalog::find($request->id)->delete();
        return [$path[0]['article']];
    }

    public function updateOffer(Request $request)
    {
        $offer=Catalog::where('article',$request->article)
            ->get();
        if($request->hasFile('image'))
        {
            $paths =[];
            $delPath = 'images/projects/'.$request->article;
            \Illuminate\Support\Facades\File::deleteDirectory($delPath);

            foreach ($request->file('image') as $file)
            {

                $name = $file->getClientOriginalName();
                $file->move('images/projects/'.$request->article, $name);
                $paths[]= 'images/projects/'.$request->article. '/' . $name;
            }

        }else{

            $paths=$offer[0]['image'];
        }

        $pathFile = '';
        if($request->hasFile('file'))
        {
            $delPathPrices = 'prices/'.$request->article;
            \Illuminate\Support\Facades\File::deleteDirectory($delPathPrices);
            $file = $request->file('file');
            $file->move('prices/'. $request->article, $request->article . '.pdf');
            $pathFile = $request->article . '.pdf';
        }else{

            $paths=$offer[0]['file'];
        }

        $affected = DB::table('catalogs')
            ->where('article', $request->article)
            ->update([
                'category' => $request->category,
                'article' =>$request->article,
                'type' => $request->type,
                'name' => $request->name,
                'meta_title' => $request->meta_title,
                'meta_descriptions' => $request->meta_descriptions,
                'configurations'=> $request->configurations,
                'options'=> $request->options,
                'image'=> json_encode($paths),
                'file'=> $pathFile,
                'price'=> $request->price,
                'delivery_price'=> $request->delivery_price,
                'delivery_day'=> $request->delivery_day,
                'installation_price'=> $request->installation_price,
               'status'=> $request->status,
                ]);

        return \redirect('/admin/offers/edit/');
    }

    public function listOffers()
    {
        return view('admin/adminOffers', ['offers'=>Catalog::all()]);
    }

    public function formAddOffer()
    {

        return view('admin/offers/adminFormAdd');
    }

    public function formUpdateOffer($article)
    {
        return view('admin/offers/adminFormUpdate',['catalog'=>Catalog::where('article', $article)->get()]);
    }
}
