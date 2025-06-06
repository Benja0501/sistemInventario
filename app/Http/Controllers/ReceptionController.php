<?php

namespace App\Http\Controllers;

use App\Models\Reception;
use App\Models\ReceptionItem;
use App\Models\PurchaseOrder;
use App\Models\Batch;
use App\Models\Product;
use App\Http\Requests\StoreReceptionRequest;
use App\Http\Requests\UpdateReceptionRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReceptionController extends Controller
{
    public function index()
    {
        $receptions = Reception::with(['purchaseOrder', 'receiver'])
            ->orderBy('received_at', 'desc')
            ->paginate(15);

        return view('receptions.index', compact('receptions'));
    }

    public function create()
    {
        $orders = PurchaseOrder::whereIn('status', ['approved', 'sent'])
            ->orderBy('order_date', 'desc')
            ->get();

        return view('receptions.create', compact('orders'));
    }

    public function store(StoreReceptionRequest $request)
    {
        $data = $request->validated();
        $order = PurchaseOrder::findOrFail($data['purchase_order_id']);

        $reception = Reception::create([
            'purchase_order_id' => $order->id,
            'received_by_user_id' => Auth::id(),
            'received_at' => Carbon::now(),
            'status' => 'pending',
        ]);

        $allReceived = true;
        foreach ($data['items'] as $item) {
            ReceptionItem::create([
                'reception_id' => $reception->id,
                'product_id' => $item['product_id'],
                'quantity_received' => $item['quantity_received'],
                'quantity_missing' => $item['quantity_missing'] ?? 0,
                'quantity_damaged' => $item['quantity_damaged'] ?? 0,
            ]);

            $product = Product::find($item['product_id']);
            $product->current_stock += $item['quantity_received'];
            $product->save();

            Batch::create([
                'product_id' => $item['product_id'],
                'batch_number' => $item['batch_number'] ?? null,
                'expiration_date' => $item['expiration_date'] ?? null,
                'quantity' => $item['quantity_received'],
            ]);

            if (($item['quantity_missing'] ?? 0) > 0 || ($item['quantity_damaged'] ?? 0) > 0) {
                $allReceived = false;
            }
        }

        $reception->update([
            'status' => $allReceived ? 'completed' : 'partial',
        ]);

        if ($allReceived) {
            $order->update(['status' => 'completed']);
        } else {
            $order->update(['status' => 'partial_received']);
        }

        return redirect()->route('receptions.index')
            ->with('success', 'Recepción registrada correctamente.');
    }

    public function show(Reception $reception)
    {
        $reception->load(['purchaseOrder', 'receiver', 'items.product']);
        return view('receptions.show', compact('reception'));
    }

    public function edit(Reception $reception)
    {
        if ($reception->status === 'completed') {
            return redirect()->route('receptions.index')
                ->with('error', 'No se puede editar una recepción completada.');
        }

        $orders = PurchaseOrder::whereIn('status', ['approved', 'sent'])->get();
        return view('receptions.edit', compact('reception', 'orders'));
    }

    public function update(UpdateReceptionRequest $request, Reception $reception)
    {
        $data = $request->validated();

        // Opcional: revertir stock y lotes anteriores antes de regrabar
        $reception->items()->delete();

        $allReceived = true;
        foreach ($data['items'] as $item) {
            ReceptionItem::create([
                'reception_id' => $reception->id,
                'product_id' => $item['product_id'],
                'quantity_received' => $item['quantity_received'],
                'quantity_missing' => $item['quantity_missing'] ?? 0,
                'quantity_damaged' => $item['quantity_damaged'] ?? 0,
            ]);

            $product = Product::find($item['product_id']);
            $product->current_stock += $item['quantity_received'];
            $product->save();

            Batch::create([
                'product_id' => $item['product_id'],
                'batch_number' => $item['batch_number'] ?? null,
                'expiration_date' => $item['expiration_date'] ?? null,
                'quantity' => $item['quantity_received'],
            ]);

            if (($item['quantity_missing'] ?? 0) > 0 || ($item['quantity_damaged'] ?? 0) > 0) {
                $allReceived = false;
            }
        }

        $reception->update([
            'status' => $allReceived ? 'completed' : 'partial',
            'received_at' => Carbon::parse($data['received_at']),
        ]);

        $order = $reception->purchaseOrder;
        if ($allReceived) {
            $order->update(['status' => 'completed']);
        } else {
            $order->update(['status' => 'partial_received']);
        }

        return redirect()->route('receptions.index')
            ->with('success', 'Recepción actualizada correctamente.');
    }

    public function destroy(Reception $reception)
    {
        if ($reception->status === 'completed') {
            return redirect()->route('receptions.index')
                ->with('error', 'No se puede eliminar una recepción completada.');
        }

        $reception->items()->delete();
        $reception->delete();

        return redirect()->route('receptions.index')
            ->with('success', 'Recepción eliminada.');
    }
}
