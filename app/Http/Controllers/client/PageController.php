<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        return redirect()->route('client.profile');
    }
    public function profile()
    {
        $client = auth()->user();
        return view('client.profile.index', compact('client'));
    }
}
