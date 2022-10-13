<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\pageContent;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Routing\UrlGenerator;

class PageController extends Controller
{
    protected $url;
    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }
    public function methodName()
    {
        $this->url->to('/');
    }

    public function index()
    {
        $page = pageContent::all();
        return view('admin/admineditmainpage', ['pagesContent' => $page]);
    }
    /**
     * CRUD
     */

    public function showPage()
    {
        /**
         * $url string получу путь /main/
         */
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $url = $url[0];

        $pages = pageContent::where('rout_name',$url)
            ->get();
        foreach ($pages as $page)
        {

        }

        return view($pages[0]->view, ['pagesContent' => $pages]);
    }

    /**
     * @param Request $request
     * @return array
     * Удалим запись из таблицы page_content по id
     */
    public function deleteContent(Request $request)
    {
        pageContent::find($request->id)->delete();
        return [$request->id];
    }

    public function createContent(Request $request)
    {


        if ($request->hasFile('file')) {
            return [$request->file('file')->getSize()];
            file_put_contents('t.txt',$request->file('file')->getSize());
        }else{
            file_put_contents('t.txt',$request->file('file')->getSize());
            return [$request->file('file')->getSize()];
        }


        /*$page_content = new pageContent();
        $page_content->rout_name = $request->rout_name;
        $page_content->name = $request->name;
        $page_content->meta_name = $request->meta_name;
        $page_content->meta_descriptions = $request->meta_descriptions;
        $page_content->view = $request->view;
        $page_content->tag = $request->tag;
        $page_content->page_status = $request->page_status;
        $page_content->tag_content = $request->tag_content;

        $page_content->save();
        $id = $page_content->id;*/

    }
}
