<?php
namespace App\Http\Controllers;
use App\Models\Investment; use App\Models\Project; use Illuminate\Http\Request;
class InvestmentController extends Controller {
 public function index(){ $investments=Investment::with('project.client')->latest()->paginate(20); return view('investments.index',compact('investments')); }
 public function create(){ $projects=Project::with('client')->get(); return view('investments.create',compact('projects')); }
 public function store(Request $request){ $d=$request->all(); $margin=$d['client_proposed_profit_margin']; $profit=$d['contractor_investment']*($margin/100); $d['profit_amount']=$profit; $d['total_amount_payable']=$d['contractor_investment']+$profit; $d['monthly_contribution']=$d['total_amount_payable']/$d['repayment_duration_months']; $d['profit_margin_status']='pending'; Investment::create($d); return redirect()->route('investments.index')->with('success','Investment proposal submitted.'); }
 public function approveProfit(Request $request, Investment $investment){ return $this->setMargin($investment,$investment->client_proposed_profit_margin,'approved',$request->admin_profit_note); }
 public function counterProfit(Request $request, Investment $investment){ return $this->setMargin($investment,$request->admin_approved_profit_margin,'countered',$request->admin_profit_note); }
 public function rejectProfit(Request $request, Investment $investment){ $investment->update(['profit_margin_status'=>'rejected','admin_profit_note'=>$request->admin_profit_note]); return back()->with('success','Rejected.'); }
 private function setMargin($investment,$margin,$status,$note){ $profit=$investment->contractor_investment*($margin/100); $total=$investment->contractor_investment+$profit; $investment->update(['admin_approved_profit_margin'=>$margin,'profit_margin_status'=>$status,'admin_profit_note'=>$note,'profit_amount'=>$profit,'total_amount_payable'=>$total,'monthly_contribution'=>$total/$investment->repayment_duration_months]); return back()->with('success','Profit margin updated.'); }
}
