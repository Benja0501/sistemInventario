{{-- resources/views/admin/purchase/show.blade.php --}}
@include('layouts.template.header_admin')
@include('layouts.template.nav_admin')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="bi bi-cart-check fs-4"></i>
                Detalles de la compra — Tienda Femaza
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="bi bi-house-door fs-6"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.purchases.index') }}">Compras</a>
            </li>
            <li class="breadcrumb-item">
                Ver
            </li>
        </ul>
    </div>

    @php
        // $compra se definió en routes/web.php
    @endphp

    {{-- Información general de la compra --}}
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Información de la compra #{{ $compra['id'] }}</h5>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Proveedor:</dt>
                        <dd class="col-sm-8">
                            <a href="#" class="text-decoration-none">
                                {{ $compra['proveedor']['nombre'] }}
                            </a>
                        </dd>

                        <dt class="col-sm-4">Impuesto:</dt>
                        <dd class="col-sm-8">{{ $compra['impuesto'] }}%</dd>

                        <dt class="col-sm-4">Fecha de registro:</dt>
                        <dd class="col-sm-8">{{ $compra['created_at'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    {{-- Detalles de productos comprados --}}
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Detalle de productos</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Precio de compra (PEN)</th>
                                    <th>Cantidad</th>
                                    <th>Sub-Total (PEN)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($compra['detalles'] as $index => $det)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $det['producto_nombre'] }}</td>
                                        <td>${{ number_format($det['precio_compra'], 2) }}</td>
                                        <td>{{ $det['cantidad'] }}</td>
                                        <td>${{ number_format($det['subtotal'], 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>SUBTOTAL:</strong></td>
                                    <td>${{ number_format($compra['total_subtotal'], 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end">
                                        <strong>
                                            TOTAL IMPUESTO ({{ number_format($compra['impuesto'], 2) }}%):
                                        </strong>
                                    </td>
                                    <td>${{ number_format($compra['total_impuesto'], 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>TOTAL A PAGAR:</strong></td>
                                    <td>${{ number_format($compra['total_pagar'], 2) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('admin.purchases.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Regresar
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

@include('layouts.template.footer_admin')
