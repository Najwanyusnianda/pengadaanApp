<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    //
    public function index(){
        return view('Project.project_view');
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
        return view('Project.project_enrollment');
    }

    public function store_Enrollment(){

    }

    public function store_Project(Request $request){

        $project=Project::create([
            'nama'=>$request->nama_project,
            'deskripsi'=>$request->deskripsi
        ]);


        return response()->json($project);
    }






}
