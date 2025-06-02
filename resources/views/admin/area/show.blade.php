{{-- resources/views/admin/area/show.blade.php --}}
@include('layouts.template.header_admin')
@include('layouts.template.nav_admin')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="bi bi-grid fs-4"></i>
                Detalle de Área — Tienda Femaza
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="bi bi-house-door fs-6"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.areas.index') }}">Áreas</a>
            </li>
            <li class="breadcrumb-item">
                Ver
            </li>
        </ul>
    </div>

    @php
        // $area es un arreglo simulado con: id, nombre, descripcion, estado, created_at.
    @endphp

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Información del área #{{ $area['id'] }}</h5>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-4">Nombre:</dt>
                        <dd class="col-sm-8">{{ $area['nombre'] }}</dd>

                        <dt class="col-sm-4">Descripción:</dt>
                        <dd class="col-sm-8">{{ $area['descripcion'] }}</dd>

                        <dt class="col-sm-4">Estado:</dt>
                        <dd class="col-sm-8">
                            @if ($area['estado'] === 'Activo')
                                <span class="badge bg-success">Activo</span>
                            @else
                                <span class="badge bg-secondary">Inactivo</span>
                            @endif
                        </dd>

                        <dt class="col-sm-4">Fecha Creación:</dt>
                        <dd class="col-sm-8">{{ $area['created_at'] }}</dd>
                    </dl>
                </div>
                <div class="card-footer text-end">
                    <a 
                        href="{{ route('admin.areas.index') }}" 
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
