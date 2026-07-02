<?php
namespace App\Http\Controllers;
use App\Models\AuditLog;
class AuditLogController extends Controller { public function index(){ $logs=AuditLog::latest()->paginate(50); return view('audit_logs.index',compact('logs')); } }
