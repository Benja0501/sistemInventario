{{-- resources/views/admin/provider/create.blade.php --}}
@include('layouts.template.header_admin')
@include('layouts.template.nav_admin')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="bi bi-truck fs-4"></i>
                Nuevo Proveedor
            </h1>
            <small>Registrar un nuevo proveedor</small>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="bi bi-house-door fs-6"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.providers.index') }}">Proveedores</a>
            </li>
            <li class="breadcrumb-item">
                Crear
            </li>
        </ul>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="tile">
                <h5 class="tile-title">Formulario de Proveedor</h5>
                <div class="tile-body">
                    <form action="#" method="POST">
                        @csrf

                        {{-- Nombre --}}
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input
                                type="text"
                                id="nombre"
                                name="nombre"
                                class="form-control"
                                placeholder="Ingrese nombre del proveedor"
                            >
                        </div>

                        {{-- RUC --}}
                        <div class="mb-3">
                            <label for="ruc" class="form-label">RUC</label>
                            <input
                                type="text"
                                id="ruc"
                                name="ruc"
                                class="form-control"
                                placeholder="Ingrese RUC (sin guiones)"
                            >
                        </div>

                        {{-- Teléfono --}}
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input
                                type="text"
                                id="telefono"
                                name="telefono"
                                class="form-control"
                                placeholder="Ingrese teléfono de contacto"
                            >
                        </div>

                        {{-- Dirección --}}
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <textarea
                                id="direccion"
                                name="direccion"
                                class="form-control"
                                rows="2"
                                placeholder="Ingrese dirección del proveedor"
                            ></textarea>
                        </div>

                        {{-- Estado --}}
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <select
                                id="estado"
                                name="estado"
                                class="form-select"
                            >
                                <option value="">-- Seleccione estado --</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>

                        {{-- Fecha de creación --}}
                        <div class="mb-3">
                            <label for="fecha_creacion" class="form-label">Fecha de creación</label>
                            <input
                                type="date"
                                id="fecha_creacion"
                                name="fecha_creacion"
                                class="form-control"
                            >
                        </div>

                        {{-- Botones de acción --}}
                        <div class="mt-4">
                            <a 
                                href="{{ route('admin.providers.index') }}" 
                                class="btn btn-secondary"
                            >
                                <i class="bi bi-arrow-left"></i> Regresar
                            </a>
                            <button 
                                type="submit" 
                                class="btn btn-primary ms-2"
                            >
                                <i class="bi bi-save"></i> Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@include('layouts.template.footer_admin')
