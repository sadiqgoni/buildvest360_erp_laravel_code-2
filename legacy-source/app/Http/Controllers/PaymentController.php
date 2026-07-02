<?php
namespace App\Http\Controllers;
use App\Models\Payment; use App\Models\Project; use Illuminate\Http\Request;
class PaymentController extends Controller {
 public function index(){ $payments=Payment::with('project.client')->latest()->paginate(20); return view('payments.index',compact('payments')); }
 public function create(){ $projects=Project::with('client')->get(); return view('payments.create',compact('projects')); }
 public function store(Request $request){ Payment::create($request->all()); return redirect()->route('payments.index')->with('success','Payment recorded.'); }
}
