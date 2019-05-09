<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\JabatanPpk;
use App\JabatanPp;
use App\Person;
use App\ProjectEnrollment;
use App\Pp;
use App\Ppk;
use DB;

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

    public function enroll($id){
        //$jabatan_pps=JabatanPp::all();
       // $jabatan_ppks=JabatanPpk::all();
        $project=Project::find($id);
        //$user_left=Person::where('role_id','=',100)->get();
        
        $project_enroll=DB::table('project_enrollments AS enroll')
        ->where('project_id',$id)
        ->join('people','enroll.person_id','people.id')
        ->join('roles','enroll.id_role','=','roles.id')
        ->leftJoin('jabatan_pps','enroll.jabatan_id','=','jabatan_pps.id')
        ->leftJoin('jabatan_ppks','enroll.jabatan_id','=','jabatan_ppks.id')
        ->select('enroll.*','people.*','roles.deskripsi','jabatan_pps.nama_jabatan AS jabatan_pp','jabatan_ppks.nama_jabatan AS jabatan_ppk')->get();
        
        for ($i=0; $i <count($project_enroll); $i++) { 
            if($project_enroll[$i]->id_role==2){
                $project_enroll[$i]->jabatan_ppk=null;
                //$project_enroll[$i]->save();
    
            }elseif ($project_enroll[$i]->id_role==3) {
                # code...
                $project_enroll[$i]->jabatan_pp=null;
               // $project_enroll[$i]->save();
            }


        }

        return view('Project.project_enrollment',compact('project_enroll','project'));
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

        //return response()->json($project);
    }

    public function update_Project(Request $request){
        $id_pro=$request->id_project;
        $project=Project::where('id',$id_pro)->update(['is_active' => 1]);
        $project=Project::where('id',$id_pro)->first();

        $project_other=Project::where('id','!=',$project->id)->update(['is_active' => 0]);

        $project_enroll_active=ProjectEnrollment::where('project_id',$project->id)->get();
        $person_default=Person::where('role_id','!=','1')->update(['role_id'=>'100']);
        for ($i=0; $i < count($project_enroll_active) ; $i++) { 
            $person=Person::where('id',$project_enroll_active[$i]->person_id)->update(['role_id'=>$project_enroll_active[$i]->id_role]);
        }
        //return redirect()->back();
    }


    public function add_user_Project(Request $request){
        $enroll=ProjectEnrollment::create([
            'project_id'=>$request->project_id,
            'person_id'=>$request->person_id,
            'id_role'=>$request->role_id
        ]);

        if($enroll->id_role==2 || $enroll->id_role==3){
            $enroll->update(['jabatan_id'=>$request->jabatan_id]);
        }

     

        $project=Project::find($enroll->project_id);
        if($project->is_active){
            $person=Person::find($enroll->person_id)->update(['role_id' => $enroll->id_role]);
        }

  
    }

    public function ppk_available($id){
        
        $project=Project::where('id',$id)->first();
        $enroll=ProjectEnrollment::where('project_id',$project->id)->where('jabatan_id','!=',null)->get();
    
        foreach($enroll as $roll){
            $data[]=$roll->jabatan_id;
        }
    
        $jabatan_ppks=JabatanPpk::whereNotIn('id',$data)->get();
        return view('Project._ppk_available',compact('jabatan_ppks'));
    }

    public function pp_available($id){
        $project=Project::where('id',$id)->first();
        $enroll=ProjectEnrollment::where('project_id',$project->id)->where('jabatan_id','!=',null)->get();
    
        foreach($enroll as $roll){
            $data[]=$roll->jabatan_id;
        }
        $jabatan_pps=JabatanPp::whereNotIn('id',$data)->get();
        return view('Project._pp_available',compact('jabatan_pps'));
    }






}
