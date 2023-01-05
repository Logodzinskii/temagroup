<?php

namespace App\Http\Controllers;

use App\Models\CompleteProject;
use App\View\Components\header;
use Illuminate\Http\Request;
use App\Models\Descryptions;

class CompleteProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category=null)
    {
        if(is_null($category)){
            $allProject = CompleteProject::all();
        }else{
            $allProject = CompleteProject::where('category', $category)->get();
        }

        if(!$allProject)
        {
            $images = [
                '/images/icons/defimg.jpg',
            ];
            $allProject[] = [
                'meta_title'=>'Готовые проекты',
                'meta_descriptions'=>'Посмотрите примеры наших работ',
                'image'=>json_encode($images),
                'chpu_complite'=>'#',
            ];
        }

        return view('compliteProject/compliteProject', ['complete'=> $allProject, 'page' => Descryptions::firstWhere('page','=','/complete/')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $paths = [];
        if($request->hasFile('files'))
        {
            foreach ($request->file('files') as $files) {
                $names = $files->getClientOriginalName();
                $date = new \DateTime('now');
                $files->move('images/completeProject/', md5($date->format('dd-MM-YYY:i:s')) . $names);
                $paths[] = 'images/completeProject/' . md5($date->format('dd-MM-YYY:i:s')) . $names;
            }
        }
        print_r($paths);
        $chpu=ChpuController::chpuGenerate($request->nameProject);
        $project = new CompleteProject();
        $project->category = $request->selectCategory;
        $project->article = 0;
        $project->type = $request->selectCategory;
        $project->meta_title = $request->nameProject;
        $project->meta_descriptions = $request->metaDescriptions;
        $project->image = json_encode($paths);
        $project->chpu_complite = $chpu;
        $project->price = $request->priceProject;
        $project->save();
        return \redirect('/complete/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($chpu)
    {
        return view('/compliteProject/compliteProjectDetails', ['project'=>CompleteProject::where('chpu_complite', $chpu)->get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompleteProject  $completeProject
     * @return \Illuminate\Http\Response
     */
    public function show(CompleteProject $completeProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompleteProject  $completeProject
     * @return \Illuminate\Http\Response
     */
    public function edit(CompleteProject $completeProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompleteProject  $completeProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompleteProject $completeProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompleteProject  $completeProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompleteProject $completeProject)
    {
        //
    }
}
