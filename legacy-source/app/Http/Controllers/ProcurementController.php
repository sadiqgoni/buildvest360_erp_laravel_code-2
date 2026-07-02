<?php
namespace App\Http\Controllers;
use App\Models\ProcurementItem; use App\Models\Project; use App\Models\Supplier; use Illuminate\Http\Request;
class ProcurementController extends Controller {
 public function index(){ $items=ProcurementItem::with('project.client','supplier')->latest()->paginate(20); return view('procurement.index',compact('items')); }
 public function create(){ $projects=Project::with('client')->get(); $suppliers=Supplier::orderBy('supplier_name')->get(); return view('procurement.create',compact('projects','suppliers')); }
 public function store(Request $request){ $d=$request->all(); $d['total_price']=($d['quantity']??0)*($d['unit_price']??0); ProcurementItem::create($d); return redirect()->route('procurement.index')->with('success','Procurement item saved.'); }
}
