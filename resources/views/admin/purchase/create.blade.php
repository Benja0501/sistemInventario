{{-- resources/views/admin/purchase/create.blade.php --}}
@include('layouts.template.header_admin')
@include('layouts.template.nav_admin')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="bi bi-cart-plus fs-4"></i>
                Registro de compra
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
                Registro de compra
            </li>
        </ul>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tile">
                <div class="tile-body">
                    <form action="#" method="POST">
                        @csrf

                        {{-- Fila superior: Proveedor e Impuesto --}}
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="proveedor_id" class="form-label">Proveedor</label>
                                <select id="proveedor_id" name="proveedor_id" class="form-select">
                                    <option value="">-- Elige proveedor --</option>
                                    <option value="1">Mandonglas S.A.</option>
                                    <option value="2">Julio González Import</option>
                                    <option value="3">Lácteos del Norte</option>
                                    {{-- ... más proveedores ... --}}
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="impuesto" class="form-label">Impuesto (%)</label>
                                <input type="number" id="impuesto" name="impuesto" class="form-control" value="18"
                                    step="0.01">
                            </div>
                        </div>

                        {{-- Detalles de compra: tabla dinámica (vista estática) --}}
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered" id="purchaseDetails">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 40px;">#</th>
                                        <th>Producto</th>
                                        <th style="width: 150px;">Precio de compra (PEN)</th>
                                        <th style="width: 120px;">Cantidad</th>
                                        <th style="width: 150px;">Sub-Total (PEN)</th>
                                        <th style="width: 40px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Fila de ejemplo #1 --}}
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <select name="detalles[0][producto_id]" class="form-select form-select-sm">
                                                <option value="">-- elegir producto --</option>
                                                <option value="101">Producto A</option>
                                                <option value="102">Producto B</option>
                                                <option value="103">Producto C</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="detalles[0][precio_compra]"
                                                class="form-control form-control-sm" step="0.01" value="0.00">
                                        </td>
                                        <td>
                                            <input type="number" name="detalles[0][cantidad]"
                                                class="form-control form-control-sm" value="0">
                                        </td>
                                        <td>
                                            <input type="text" name="detalles[0][subtotal]"
                                                class="form-control form-control-sm" value="0.00" readonly>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-danger">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-end"><strong>SUBTOTAL:</strong></td>
                                        <td>
                                            <input type="text" name="subtotal_general"
                                                class="form-control form-control-sm fw-bold" value="0.00" readonly>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end">
                                            <strong>
                                                TOTAL IMPUESTO (<span id="impuestoText">18.00%</span>):
                                            </strong>
                                        </td>
                                        <td>
                                            <input type="text" name="total_impuesto"
                                                class="form-control form-control-sm fw-bold" value="0.00" readonly>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end"><strong>TOTAL A PAGAR:</strong></td>
                                        <td>
                                            <input type="text" name="total_pagar"
                                                class="form-control form-control-sm fw-bold" value="0.00" readonly>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        {{-- Botón para agregar otra fila de producto (vista estática) --}}
                        <div class="mb-4">
                            <button type="button" class="btn btn-sm btn-success">
                                <i class="bi bi-plus-circle"></i> Agregar producto
                            </button>
                        </div>

                        {{-- Botones de acción al final del formulario --}}
                        <div class="text-end">
                            <a href="{{ route('admin.purchases.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-lg"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary ms-2">
                                <i class="bi bi-check-lg"></i> Registrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@include('layouts.template.footer_admin')
