<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    public function index()
    {
        $supports = Support::all();
        return view('support.index', compact('supports'));
    }
}
