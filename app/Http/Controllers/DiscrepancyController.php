<?php

namespace App\Http\Controllers;

use App\Models\Discrepancy;
use App\Models\Product;
use App\Http\Requests\StoreDiscrepancyRequest;
use App\Http\Requests\UpdateDiscrepancyRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DiscrepancyController extends Controller
{
    public function index()
    {
        $discrepancies = Discrepancy::with(['product', 'reporter'])
            ->orderBy('reported_at', 'desc')
            ->paginate(15);

        return view('discrepancies.index', compact('discrepancies'));
    }

    public function create()
    {
        $products = Product::where('status', 'active')->get();
        return view('discrepancies.create', compact('products'));
    }

    public function store(StoreDiscrepancyRequest $request)
    {
        $data = $request->validated();

        Discrepancy::create([
            'product_id' => $data['product_id'],
            'system_quantity' => $data['system_quantity'],
            'physical_quantity' => $data['physical_quantity'],
            'discrepancy_type' => $data['discrepancy_type'],
            'note' => $data['note'] ?? null,
            'evidence_path' => $data['evidence_path'] ?? null,
            'reported_by_user_id' => Auth::id(),
            'reported_at' => Carbon::now(),
        ]);

        return redirect()->route('discrepancies.index')
            ->with('success', 'Discrepancia registrada correctamente.');
    }

    public function show(Discrepancy $discrepancy)
    {
        $discrepancy->load(['product', 'reporter']);
        return view('discrepancies.show', compact('discrepancy'));
    }

    public function edit(Discrepancy $discrepancy)
    {
        $products = Product::where('status', 'active')->get();
        return view('discrepancies.edit', compact('discrepancy', 'products'));
    }

    public function update(UpdateDiscrepancyRequest $request, Discrepancy $discrepancy)
    {
        $data = $request->validated();

        $discrepancy->update([
            'product_id' => $data['product_id'],
            'system_quantity' => $data['system_quantity'],
            'physical_quantity' => $data['physical_quantity'],
            'discrepancy_type' => $data['discrepancy_type'],
            'note' => $data['note'] ?? null,
            'evidence_path' => $data['evidence_path'] ?? null,
            'reported_at' => Carbon::parse($data['reported_at']),
        ]);

        return redirect()->route('discrepancies.index')
            ->with('success', 'Discrepancia actualizada correctamente.');
    }

    public function destroy(Discrepancy $discrepancy)
    {
        $discrepancy->delete();
        return redirect()->route('discrepancies.index')
            ->with('success', 'Discrepancia eliminada.');
    }
}
