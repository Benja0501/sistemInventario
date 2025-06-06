<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Product;
use App\Http\Requests\StoreBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use Illuminate\Support\Facades\Auth;

class BatchController extends Controller
{
    public function index()
    {
        $batches = Batch::with('product')
            ->orderBy('expiration_date')
            ->paginate(20);

        return view('batches.index', compact('batches'));
    }

    public function create()
    {
        $products = Product::where('status', 'active')->get();
        return view('batches.create', compact('products'));
    }

    public function store(StoreBatchRequest $request)
    {
        $data = $request->validated();
        Batch::create($data);

        return redirect()->route('batches.index')
            ->with('success', 'Lote creado correctamente.');
    }

    public function show(Batch $batch)
    {
        $batch->load('product');
        return view('batches.show', compact('batch'));
    }

    public function edit(Batch $batch)
    {
        $products = Product::where('status', 'active')->get();
        return view('batches.edit', compact('batch', 'products'));
    }

    public function update(UpdateBatchRequest $request, Batch $batch)
    {
        $data = $request->validated();
        $batch->update($data);

        return redirect()->route('batches.index')
            ->with('success', 'Lote actualizado correctamente.');
    }

    public function destroy(Batch $batch)
    {
        $batch->delete();
        return redirect()->route('batches.index')
            ->with('success', 'Lote eliminado correctamente.');
    }

    public function expiringSoon()
    {
        $days = request()->get('days', 30);
        $today = now()->startOfDay();
        $limit = $today->copy()->addDays($days);

        $batches = Batch::with('product')
            ->whereBetween('expiration_date', [$today, $limit])
            ->orderBy('expiration_date')
            ->get();

        return view('batches.expiring', compact('batches', 'days'));
    }
}
