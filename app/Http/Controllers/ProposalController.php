<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    public function index(){
        $proposal = Proposal::where("user_id",Auth::user()->id)->get();
        return response()->json($proposal);
    }
    public function store(Request $request)
    {
        $proposal = new Proposal();
        $proposal->role = $request->role;
        $proposal->coverletter = $request->coverletter;
        $proposal->project_id = $request->project_id;
        $proposal->user_id = Auth::user()->id;
        if ($proposal->save()) {
            return response()->json([
                'message' => "Data Successfully Added",
                'data' => $proposal
            ]);
        } else {
            return response()->json([ 'message' => "Failed"]);
        }
    }
    public function updateProposal(Request $request,$id){
        $proposal = Proposal::where("proposal_id",$id)->update([
            'status' => $request->status
        ]);
        if ($proposal){
            return response()->json(['message' => "Data Successfully Updated"]);
        } else {
            return response()->json(['message' => "Failed"]);
        }
    }
}
