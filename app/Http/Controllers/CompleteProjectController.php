<?php

namespace App\Http\Controllers;

use App\Models\CompleteProject;
use App\View\Components\header;
use Illuminate\Http\Request;

class CompleteProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allProject = CompleteProject::all();
        return view('compliteProject/compliteProject', ['complete'=> $allProject]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $chpu=ChpuController::chpuGenerate($request->metaTitle);
        $project = new CompleteProject();
        $project->category = $request->category;
        $project->article = $request->article;
        $project->type = $request->type;
        $project->meta_title = $request->metaTitle;
        $project->meta_desriptions = $request->metaDesriptions;
        $project->image = $request->image;
        $project->chpu_complite = $chpu;
        $project->save();
        return http_response_code(200);
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
