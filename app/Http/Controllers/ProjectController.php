<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::get();
        return response()->json(['project' => $project]);
    }

    public function getProjectUser()
    {
        $project = Project::with('user:id,first_name,last_name')->whereHas('proposal', function ($query) {
            return $query->where([
                ['user_id', '=', Auth::user()->id],
                ['status', '=', 'Approved']
            ]);
        })->orWhere('user_id',Auth::user()->id)->get();
        return response()->json(['project' => $project]);
    }
    public function getDetail($id)
    {
        $project = Project::with('proposal.user','requirements')->find($id);
        return response()->json(['project' => $project]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->scale = $request->scale;
        $project->deadline = $request->deadline;
        $project->visibility = $request->visibility;
        $project->user_id = Auth::user()->id;
        $requirements = $request->requirement;
        $data = [];
        if ($project->save()) {
            foreach($requirements as $name){
                $data[] = [
                    'name' => $name,
                    'project_id' => $project->project_id,
                    "created_at" =>  date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ];
            }
            Requirement::insert($data);
            return response()->json([ 'message' => "Data Successfully Added"]);
        } else {
            return response()->json([ 'message' => "Failed"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function find(Request $request){
        $requirements = $request->role;
        $project = Project::with('requirements');
        if ($request->has('title')){
            $project->orWhere('title', 'like', '%' . $request->title . '%');
        }
        if($request->has('role')){
            $project->whereHas('requirements', function($requirement) use ($requirements)  {
                $requirement->where('name', 'like', '%' . $requirements . '%' );
            });
        }
        $project->where([
            ['visibility','=','Public'],
            ['user_id', '!=', Auth::user()->id]
        ]);
        return response()->json($project->get());
    }
    public function show(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
