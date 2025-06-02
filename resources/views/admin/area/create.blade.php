{{-- resources/views/admin/area/create.blade.php --}}
@include('layouts.template.header_admin')
@include('layouts.template.nav_admin')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="bi bi-grid-3x3-gap-fill fs-4"></i>
                Nueva Área
            </h1>
            <small>Registrar un área de la tienda</small>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="bi bi-house-door fs-6"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.areas.index') }}">Áreas</a>
            </li>
            <li class="breadcrumb-item">
                Crear
            </li>
        </ul>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="tile">
                <h5 class="tile-title">Formulario de Área</h5>
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
                                placeholder="Ingrese nombre del área"
                            >
                        </div>

                        {{-- Descripción --}}
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea
                                id="descripcion"
                                name="descripcion"
                                class="form-control"
                                rows="3"
                                placeholder="Ingrese descripción del área"
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
                                <option value="">-- Seleccione Estado --</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>

                        {{-- Botones de acción --}}
                        <div class="mt-4 d-flex justify-content-end">
                            <a 
                                href="{{ route('admin.areas.index') }}" 
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
