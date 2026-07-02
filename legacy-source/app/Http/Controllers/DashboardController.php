<?php
namespace App\Http\Controllers;
use App\Models\Client; use App\Models\Project; use App\Models\Investment; use App\Models\Payment; use App\Models\ProcurementItem; use App\Models\LegalDocument;
class DashboardController extends Controller {
 public function index(){
  return view('dashboard.index',[
   'totalClients'=>Client::count(),'totalProjects'=>Project::count(),'totalInvestment'=>Investment::sum('contractor_investment'),
   'expectedProfit'=>Investment::sum('profit_amount'),'totalPaid'=>Payment::sum('amount_paid'),
   'procurementValue'=>ProcurementItem::sum('total_price'),'pendingLegal'=>LegalDocument::where('legal_status','!=','Approved')->count(),
   'recentProjects'=>Project::with('client','investment')->latest()->take(10)->get()
  ]);
 }
}
