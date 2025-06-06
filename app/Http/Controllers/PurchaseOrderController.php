<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\User;
use App\Http\Requests\StorePurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $orders = PurchaseOrder::with(['supplier', 'creator'])
            ->orderBy('order_date', 'desc')
            ->paginate(15);

        return view('purchase_orders.index', compact('orders'));
    }

    public function create()
    {
        $suppliers = Supplier::where('status', 'active')->get();
        $products = Product::where('status', 'active')->get();
        return view('purchase_orders.create', compact('suppliers', 'products'));
    }

    public function store(StorePurchaseOrderRequest $request)
    {
        $data = $request->validated();

        $order = PurchaseOrder::create([
            'order_number' => 'OC-' . Str::upper(Str::random(6)),
            'created_by_user_id' => Auth::id(),
            'supplier_id' => $data['supplier_id'],
            'order_date' => now(),
            'expected_delivery_date' => $data['expected_delivery_date'] ?? null,
            'total_amount' => 0,
            'status' => 'pending',
        ]);

        $total = 0;
        foreach ($data['items'] as $item) {
            $lineTotal = $item['quantity'] * $item['unit_price'];
            PurchaseOrderItem::create([
                'purchase_order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
            ]);
            $total += $lineTotal;
        }

        $order->update(['total_amount' => $total]);

        return redirect()->route('purchase_orders.index')
            ->with('success', 'Orden de compra creada correctamente.');
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->load(['supplier', 'creator', 'items.product', 'receptions']);
        return view('purchase_orders.show', compact('purchaseOrder'));
    }
    public function edit(PurchaseOrder $purchaseOrder)
    {
        if ($purchaseOrder->status !== 'pending') {
            return redirect()->route('purchase_orders.index')
                ->with('error', 'Solo se pueden editar órdenes en estado Pendiente.');
        }

        $suppliers = Supplier::where('status', 'active')->get();
        $products = Product::where('status', 'active')->get();
        return view('purchase_orders.edit', compact('purchaseOrder', 'suppliers', 'products'));
    }

    public function update(UpdatePurchaseOrderRequest $request, PurchaseOrder $purchaseOrder)
    {
        if ($purchaseOrder->status !== 'pending') {
            return redirect()->route('purchase_orders.index')
                ->with('error', 'Solo se pueden actualizar órdenes en estado Pendiente.');
        }

        $data = $request->validated();

        $purchaseOrder->update([
            'supplier_id' => $data['supplier_id'],
            'expected_delivery_date' => $data['expected_delivery_date'] ?? null,
        ]);

        $purchaseOrder->items()->delete();

        $total = 0;
        foreach ($data['items'] as $item) {
            $lineTotal = $item['quantity'] * $item['unit_price'];
            PurchaseOrderItem::create([
                'purchase_order_id' => $purchaseOrder->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
            ]);
            $total += $lineTotal;
        }

        $purchaseOrder->update(['total_amount' => $total]);

        return redirect()->route('purchase_orders.index')
            ->with('success', 'Orden de compra actualizada correctamente.');
    }

    public function destroy(PurchaseOrder $purchaseOrder)
    {
        if (in_array($purchaseOrder->status, ['approved', 'sent', 'partial_received', 'completed'])) {
            return redirect()->route('purchase_orders.index')
                ->with('error', 'No se puede eliminar una orden en estado ' . $purchaseOrder->status);
        }
        $purchaseOrder->delete();
        return redirect()->route('purchase_orders.index')
            ->with('success', 'Orden de compra eliminada.');
    }
    public function approve(PurchaseOrder $purchaseOrder)
    {
        if ($purchaseOrder->status !== 'pending') {
            return redirect()->back()->with('error', 'Solo se pueden aprobar órdenes en estado Pendiente.');
        }

        $purchaseOrder->update(['status' => 'approved']);

        $creator = $purchaseOrder->creator;
        $almacenero = User::where('role_id', Role::where('name', 'Almacenero')->first()->id)->first();
        if ($creator) {
            $creator->notify(new \App\Notifications\OrderApprovedNotification($purchaseOrder));
        }
        if ($almacenero) {
            $almacenero->notify(new \App\Notifications\OrderApprovedNotification($purchaseOrder));
        }

        return redirect()->route('purchase_orders.show', $purchaseOrder->id)
            ->with('success', 'Orden de compra aprobada.');
    }

    public function reject(UpdatePurchaseOrderRequest $request, PurchaseOrder $purchaseOrder)
    {
        if ($purchaseOrder->status !== 'pending') {
            return redirect()->back()->with('error', 'Solo se pueden rechazar órdenes en estado Pendiente.');
        }

        $data = $request->validated();
        $purchaseOrder->update(['status' => 'rejected']);

        $creator = $purchaseOrder->creator;
        if ($creator) {
            $creator->notify(new \App\Notifications\OrderRejectedNotification($purchaseOrder, $data['reason']));
        }

        return redirect()->route('purchase_orders.show', $purchaseOrder->id)
            ->with('success', 'Orden de compra rechazada.');
    }
}
