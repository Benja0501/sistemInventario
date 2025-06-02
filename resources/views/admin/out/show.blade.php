{{-- resources/views/admin/out/show.blade.php --}}
@include('layouts.template.header_admin')
@include('layouts.template.nav_admin')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="bi bi-box-arrow-right fs-4"></i>
                Detalle de Salida — Tienda Femaza
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="bi bi-house-door fs-6"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.outs.index') }}">Salidas</a>
            </li>
            <li class="breadcrumb-item">
                Ver
            </li>
        </ul>
    </div>

    @php
        // $salida es un array simulado con: id, area (id/nombre), created_at y detalles (productos+cantidad).
    @endphp

    {{-- Información general de la salida --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Información de Salida #{{ $salida['id'] }}</h5>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Área:</dt>
                        <dd class="col-sm-8">
                            <a href="#" class="text-decoration-none">
                                {{ $salida['area']['nombre'] }}
                            </a>
                        </dd>

                        <dt class="col-sm-4">Fecha:</dt>
                        <dd class="col-sm-8">{{ $salida['created_at'] }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    {{-- Detalle de Productos en la Salida --}}
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Productos enviados</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($salida['detalles'] as $index => $det)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $det['producto_nombre'] }}</td>
                                        <td>{{ $det['cantidad'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a 
                        href="{{ route('admin.outs.index') }}" 
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
