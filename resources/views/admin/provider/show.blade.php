{{-- resources/views/admin/provider/show.blade.php --}}
@include('layouts.template.header_admin')
@include('layouts.template.nav_admin')

@php
    // Datos de ejemplo (después los traerás desde el controlador)
    $proveedor = [
        'id' => $id,
        'nombre' => 'Proveedor Ejemplo #' . $id,
        'ruc' => '20123456789',
        'telefono' => '924000' . $id,
        'direccion' => 'Av. Ejemplo 123, Ciudad',
        'correo' => 'contacto' . $id . '@ejemplo.com',
        'estado' => $id % 2 ? 'Activo' : 'Inactivo',
        'fecha_creacion' => '2025-05-'. str_pad($id, 2, '0', STR_PAD_LEFT),
    ];

    // Lista de productos asignados (datos ficticios)
    $productosAsignados = [
        ['id' => 101, 'nombre' => 'Producto A', 'precio' => '$10.00'],
        ['id' => 102, 'nombre' => 'Producto B', 'precio' => '$15.50'],
        ['id' => 103, 'nombre' => 'Producto C', 'precio' => '$7.25'],
    ];
@endphp

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="bi bi-truck"></i>
                Detalles del proveedor
                <small>Tienda Femaza</small>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="bi bi-house-door fs-6"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.providers.index') }}">Proveedores</a>
            </li>
            <li class="breadcrumb-item">
                Ver
            </li>
        </ul>
    </div>

    {{-- Tarjeta con información del proveedor --}}
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile mb-4">
                <h5 class="tile-title">Información de proveedor</h5>
                <div class="tile-body">
                    <dl class="row">
                        <dt class="col-sm-4"><i class="bi bi-building"></i> Nombre:</dt>
                        <dd class="col-sm-8">{{ $proveedor['nombre'] }}</dd>

                        <dt class="col-sm-4"><i class="bi bi-card-text"></i> RUC:</dt>
                        <dd class="col-sm-8">{{ $proveedor['ruc'] }}</dd>

                        <dt class="col-sm-4"><i class="bi bi-telephone"></i> Teléfono:</dt>
                        <dd class="col-sm-8">{{ $proveedor['telefono'] }}</dd>

                        <dt class="col-sm-4"><i class="bi bi-geo-alt"></i> Dirección:</dt>
                        <dd class="col-sm-8">{{ $proveedor['direccion'] }}</dd>

                        <dt class="col-sm-4"><i class="bi bi-envelope"></i> Correo:</dt>
                        <dd class="col-sm-8">{{ $proveedor['correo'] }}</dd>

                        <dt class="col-sm-4"><i class="bi bi-info-circle"></i> Estado:</dt>
                        <dd class="col-sm-8">{{ $proveedor['estado'] }}</dd>

                        <dt class="col-sm-4"><i class="bi bi-calendar-check"></i> Fecha creación:</dt>
                        <dd class="col-sm-8">{{ $proveedor['fecha_creacion'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    {{-- Sección de productos asignados --}}
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h5 class="tile-title">
                    <i class="bi bi-box-seam"></i> Productos asignados
                </h5>
                <div class="tile-body">
                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productosAsignados as $prod)
                                <tr>
                                    <td>{{ $prod['id'] }}</td>
                                    <td>{{ $prod['nombre'] }}</td>
                                    <td>{{ $prod['precio'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tile-footer">
                    <a 
                        href="{{ route('admin.providers.index') }}" 
                        class="btn btn-secondary"
                    >
                        <i class="bi bi-arrow-left"></i> Regresar
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

@include('layouts.template.footer_admin')
