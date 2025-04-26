<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pest;
use Illuminate\Http\Request;

class PestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pests = Pest::all();
        return view('admin.pests.index', compact('pests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        Pest::create($request->all());
        return redirect()->route('pests.index')->with('success', 'Pest added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pest $pest)
    { 
        return view('admin.pests.show', compact('pest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pest $pest)
    {
        return view('admin.pests.edit', compact('pest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pest $pest)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        $pest->update($request->all());
        return redirect()->route('pests.index')->with('success', 'Pest updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pest $pest)
    {
        $pest->delete();
        return redirect()->route('pests.index')->with('success', 'Pest deleted successfully.');
    }
}
