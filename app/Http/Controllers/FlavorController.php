<?php

namespace App\Http\Controllers;

use App\Models\Flavor;
use App\Models\StockHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlavorController extends Controller
{
    public function index()
    {
        $flavors = Flavor::all();
        return view('flavors.index', compact('flavors'));
    }

    public function create()
    {
        return view('flavors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
        ]);

        Flavor::create($request->all());
        return redirect()->route('flavors.index')->with('success', 'Flavor created successfully.');
    }

    public function edit(Flavor $flavor)
    {
        return view('flavors.edit', compact('flavor'));
    }

    public function update(Request $request, Flavor $flavor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $flavor->update($request->all());
        return redirect()->route('flavors.index')->with('success', 'Flavor updated successfully.');
    }

    public function addStockForm(Flavor $flavor)
    {
        return view('flavors.addStock', compact('flavor'));
    }

    public function addStock(Request $request, Flavor $flavor)
    {
        $request->validate([
            'stock' => 'required|integer|min:1',
        ]);

        $user_id = Auth::check() ? Auth::id() : null; // Obtener el ID del usuario autenticado si está disponible

        $flavor->increment('stock', $request->stock);

        StockHistory::create([
            'flavor_id' => $flavor->id,
            'user_id' => $user_id,
            'change' => $request->stock,
            'type' => 'add',
        ]);

        return redirect()->route('flavors.index')->with('success', 'Stock added successfully.');
    }

    public function removeStock(Request $request, Flavor $flavor)
    {
        $request->validate([
            'stock' => 'required|integer|min:1|max:' . $flavor->stock,
        ]);

        $user_id = Auth::check() ? Auth::id() : null; // Obtener el ID del usuario autenticado si está disponible

        $flavor->decrement('stock', $request->stock);

        StockHistory::create([
            'flavor_id' => $flavor->id,
            'user_id' => $user_id,
            'change' => -$request->stock,
            'type' => 'remove',
        ]);

        return redirect()->route('flavors.index')->with('success', 'Stock removed successfully.');
    }

    public function history()
    {
        $history = StockHistory::with('flavor')->orderBy('created_at', 'desc')->get();
        return view('flavors.history', compact('history'));
    }
}
