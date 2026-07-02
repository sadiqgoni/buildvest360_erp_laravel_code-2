<?php
namespace App\Http\Controllers;
use App\Models\LegalDocument; use App\Models\Project; use Illuminate\Http\Request;
class LegalController extends Controller {
 public function index(){ $documents=LegalDocument::with('project.client')->latest()->paginate(20); return view('legal.index',compact('documents')); }
 public function create(){ $projects=Project::with('client')->get(); return view('legal.create',compact('projects')); }
 public function store(Request $request){ LegalDocument::create($request->all()); return redirect()->route('legal.index')->with('success','Legal document saved.'); }
}
