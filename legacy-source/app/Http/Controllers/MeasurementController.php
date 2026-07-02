<?php
namespace App\Http\Controllers;
use App\Models\Measurement; use App\Models\Project; use Illuminate\Http\Request;
class MeasurementController extends Controller {
 public function index(){ $measurements=Measurement::with('project.client')->latest()->paginate(20); return view('measurements.index',compact('measurements')); }
 public function create(){ $projects=Project::with('client')->get(); return view('measurements.create',compact('projects')); }
 public function store(Request $request){ $d=$request->all(); $ct=($d['client_ground_floor_sqm']??0)+($d['client_first_floor_sqm']??0)+($d['client_other_floor_sqm']??0); $et=($d['engineer_ground_floor_sqm']??0)+($d['engineer_first_floor_sqm']??0)+($d['engineer_other_floor_sqm']??0); $d['client_total_sqm']=$ct; $d['engineer_total_sqm']=$et; $d['measurement_difference_sqm']=$et-$ct; $d['measurement_difference_percent']=$ct>0?(($et-$ct)/$ct)*100:0; Measurement::updateOrCreate(['project_id'=>$d['project_id']],$d); return redirect()->route('measurements.index')->with('success','Measurement saved.'); }
}
