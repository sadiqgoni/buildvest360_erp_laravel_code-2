<?php
namespace App\Http\Controllers;
use App\Models\Client;
class ClientPortalController extends Controller { public function show(Client $client){ $client->load('projects.measurement','projects.materials','projects.investment','projects.payments','projects.legalDocuments'); return view('client_portal.show',compact('client')); } }
