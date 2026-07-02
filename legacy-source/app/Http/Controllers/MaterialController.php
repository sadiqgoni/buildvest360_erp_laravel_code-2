<?php
namespace App\Http\Controllers;
use App\Models\Material; use App\Models\Project; use Illuminate\Http\Request;
class MaterialController extends Controller {
 public function index(){ $materials=Material::with('project.client')->latest()->paginate(30); return view('materials.index',compact('materials')); }
 public function create(){ $projects=Project::with('client')->get(); return view('materials.create',compact('projects')); }
 public function store(Request $request){ Material::create($request->all()); return redirect()->route('materials.index')->with('success','Material responsibility saved.'); }
}
