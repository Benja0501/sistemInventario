{{-- resources/views/admin/purchase/index.blade.php --}}
@include('layouts.template.header_admin')
@include('layouts.template.nav_admin')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="bi bi-cart4 fs-4"></i>
                Compras
                <a href="{{ route('admin.purchases.create') }}" class="btn btn-sm btn-primary ms-3">
                    <i class="bi bi-plus-lg"></i> Registrar compra
                </a>
            </h1>
            <small>Listado de compras realizadas</small>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="bi bi-house-door fs-6"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                Compras
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table id="purchaseTable" class="table table-striped table-bordered" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Proveedor</th>
                                    <th>Fecha</th>
                                    <th>Subtotal</th>
                                    <th>Impuesto</th>
                                    <th>Total a Pagar</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Cinco registros de ejemplo --}}
                                @for ($i = 1; $i <= 5; $i++)
                                    @php
                                        $subtotal = 50 * $i; // ejemplo: 50, 100, 150, ...
                                        $impuesto = round($subtotal * 0.18, 2);
                                        $totalPagar = $subtotal + $impuesto;
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>Proveedor Ejemplo {{ $i }}</td>
                                        <td>2025-06-0{{ $i }} 10:0{{ $i }}</td>
                                        <td>${{ number_format($subtotal, 2) }}</td>
                                        <td>${{ number_format($impuesto, 2) }}</td>
                                        <td>${{ number_format($totalPagar, 2) }}</td>
                                        <td>
                                            <a href="{{ route('admin.purchases.show', $i) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('layouts.template.footer_admin')

{{-- Script para inicializar DataTables --}}
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#purchaseTable').DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
                }
            });
        });
    </script>
@endpush
