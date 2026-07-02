<?php
namespace App\Http\Controllers;
use App\Models\Project; use App\Models\Client; use Illuminate\Http\Request;
class ProjectController extends Controller {
 public function index(){ $projects=Project::with('client')->latest()->paginate(20); return view('projects.index',compact('projects')); }
 public function create(){ $clients=Client::orderBy('full_name')->get(); return view('projects.create',compact('clients')); }
 public function store(Request $request){ $data=$request->all(); $data['project_id']='PRJ-'.date('Y').'-'.str_pad(Project::count()+1,4,'0',STR_PAD_LEFT); Project::create($data); return redirect()->route('projects.index')->with('success','Project saved.'); }
}
