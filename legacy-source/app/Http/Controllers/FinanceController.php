<?php
namespace App\Http\Controllers;
use App\Models\Investment; use App\Models\Payment;
class FinanceController extends Controller {
 public function index(){ $totalPayable=Investment::sum('total_amount_payable'); $totalPaid=Payment::sum('amount_paid'); $outstanding=$totalPayable-$totalPaid; $investments=Investment::with('project.client')->get(); return view('finance.index',compact('totalPayable','totalPaid','outstanding','investments')); }
}
