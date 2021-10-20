<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $progress = Progress::where('project_id',$id)->get();
        return response()->json(['progress' => $progress]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $progress = new Progress();
        $progress->name = $request->name;
        $progress->project_id = $request->project_id;
        if ($progress->save()) {
            return response()->json([ 'message' => "Data Successfully Added"]);
        } else {
            return response()->json([ 'message' => "Failed"]);
        }
    }
    public function updateProgress($id){
        $progress = Progress::where("progress_id",$id)->update([
            'isChecked' => true
        ]);
        if ($progress){
            return response()->json(['message' => "Data Successfully Updated"]);
        } else {
            return response()->json(['message' => "Failed"]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function show(Progress $progress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Progress $progress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Progress $progress)
    {
        //
    }
}
