<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\JabatanPpk;
use App\JabatanPp;
use App\Person;

class ProjectController extends Controller
{
    //
    public function index(){
        $project=Project::all();
        return view('Project.project_view',compact('project'));
    }

    public function form(){
        return view('Project.project_form');
    }

    public function tableProject(){

    }

    public function projectCard(){

        return view('Project.project_card');
    }

    public function enroll(){
        $ppk=Person::where('role_id',3)->get();
        $jabatans = JabatanPpk::all();
        return view('Project.project_enrollment',compact('jabatans','ppk'));
    }

    public function store_Enrollment($id,Request $request){
        dd($request);
    }

    public function store_Project(Request $request){

        $project=Project::create([
            'nama'=>$request->nama_project,
            'deskripsi'=>$request->deskripsi,
            'is_active'=>1
        ]);
        
        $project_other=Project::where('id','!=',$project->id)->update(['is_active' => 0]);

        return response()->json($project);
    }

    public function update_Project(Request $request){
        $id_pro=$request->id_project;
        $project=Project::where('id',$id_pro)->update(['is_active' => 1]);
        $project=Project::where('id',$id_pro)->first();

        $project_other=Project::where('id','!=',$project->id)->update(['is_active' => 0]);

        return redirect()->back();
    }






}
