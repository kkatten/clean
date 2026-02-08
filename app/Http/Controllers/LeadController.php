<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'nullable|email',
            'message' => 'nullable|string|max:2000',
            'source' => 'nullable|string|max:50',
            'service_id' => 'nullable|exists:services,id',
        ]);

        Lead::create($validated);

        if ($request->expectsJson()) {
            return response()->json(['success' => true]);
        }

        return back()->with('lead_sent', true);
    }
}
