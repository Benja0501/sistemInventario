{{-- resources/views/admin/out/create.blade.php --}}
@include('layouts.template.header_admin')
@include('layouts.template.nav_admin')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="bi bi-box-arrow-in-left fs-4"></i>
                Registro de Salida
            </h1>
            <small>Registrar salida de productos desde un área</small>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="bi bi-house-door fs-6"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.outs.index') }}">Salidas</a>
            </li>
            <li class="breadcrumb-item">
                Registro de Salida
            </li>
        </ul>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tile">
                <div class="tile-body">
                    <form action="#" method="POST">
                        @csrf

                        {{-- Selección de Área --}}
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="area_id" class="form-label">Área</label>
                                <select 
                                    id="area_id" 
                                    name="area_id" 
                                    class="form-select"
                                >
                                    <option value="">-- Elige área --</option>
                                    <option value="1">Almacén Central</option>
                                    <option value="2">Vitrina Principal</option>
                                    <option value="3">Depósito Secundario</option>
                                </select>
                            </div>
                        </div>

                        {{-- Detalles de Salida: tabla dinámica (solo vista estática) --}}
                        <div class="table-responsive mb-3">
                            <table 
                                class="table table-bordered" 
                                id="outDetails"
                            >
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 40px;">#</th>
                                        <th>Producto</th>
                                        <th style="width: 120px;">Cantidad</th>
                                        <th style="width: 40px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Fila de ejemplo #1 --}}
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <select 
                                                name="detalles[0][producto_id]" 
                                                class="form-select form-select-sm"
                                            >
                                                <option value="">-- elegir producto --</option>
                                                <option value="101">Producto A</option>
                                                <option value="102">Producto B</option>
                                                <option value="103">Producto C</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input 
                                                type="number" 
                                                name="detalles[0][cantidad]" 
                                                class="form-control form-control-sm" 
                                                value="1" 
                                                min="1"
                                            >
                                        </td>
                                        <td class="text-center">
                                            <button 
                                                type="button" 
                                                class="btn btn-sm btn-danger"
                                            >
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        {{-- Botón “Agregar producto” (solo vista estática) --}}
                        <div class="mb-4">
                            <button 
                                type="button" 
                                class="btn btn-sm btn-success"
                            >
                                <i class="bi bi-plus-circle"></i> Agregar producto
                            </button>
                        </div>

                        {{-- Botones de acción --}}
                        <div class="text-end">
                            <a 
                                href="{{ route('admin.outs.index') }}" 
                                class="btn btn-secondary"
                            >
                                <i class="bi bi-x-lg"></i> Cancelar
                            </a>
                            <button 
                                type="submit" 
                                class="btn btn-primary ms-2"
                            >
                                <i class="bi bi-send"></i> Registrar
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@include('layouts.template.footer_admin')
