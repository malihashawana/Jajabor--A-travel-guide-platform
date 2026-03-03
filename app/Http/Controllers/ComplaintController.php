<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function create()
    {
        return view('complaint_form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'complaint' => 'required|min:10',
        ]);

        Complaint::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Complaint submitted successfully!');
    }
}
