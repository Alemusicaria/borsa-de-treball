<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    public function test(Request $request)
    {
        //return redirect()->back()->withInput()->with('error', 'Test');
        //return redirect()->back()->withInput()->with('success', 'Test');
        return view('emails.passwordRecovery');

    }
} 
  