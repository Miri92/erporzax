<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index(Request $request)
    {

        //dd($request->all());

        // Fetch all manufacturers
        $manufacturers = Manufacturer::all();
        return view('panel.manufacturers.index', compact('manufacturers'));
    }

    public function create()
    {
        // Show form to create a new manufacturer
        return view('panel.manufacturers.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new manufacturer
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Manufacturer::create($validated);
        return redirect()->route('panel.manufacturers.index')->with('success', 'Manufacturer created successfully.');
    }

    public function edit(Manufacturer $manufacturer)
    {
        // Show form to edit an existing manufacturer
        return view('panel.manufacturers.edit', compact('manufacturer'));
    }

    public function update(Request $request, Manufacturer $manufacturer)
    {
        // Validate and update the manufacturer
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $manufacturer->update($validated);
        return redirect()->route('panel.manufacturers.index')->with('success', 'Manufacturer updated successfully.');
    }

    public function destroy(Manufacturer $manufacturer)
    {
        // Delete the manufacturer
        $manufacturer->delete();
        return redirect()->route('panel.manufacturers.index')->with('success', 'Manufacturer deleted successfully.');
    }
}
