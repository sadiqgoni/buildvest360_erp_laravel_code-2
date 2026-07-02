<?php
namespace App\Http\Controllers;
use App\Models\Client; use Illuminate\Http\Request;
class ClientController extends Controller {
 public function index(){ $clients=Client::latest()->paginate(20); return view('clients.index',compact('clients')); }
 public function create(){ return view('clients.create'); }
 public function store(Request $request){ $data=$request->all(); $data['client_id']='CLI-'.date('Y').'-'.str_pad(Client::count()+1,4,'0',STR_PAD_LEFT); Client::create($data); return redirect()->route('clients.index')->with('success','Client saved.'); }
}
