{{-- resources/views/admin/category/create.blade.php --}}

@include('layouts.template.header_admin')
@include('layouts.template.nav_admin')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa-solid fa-folder-plus"></i>
                Crear Categoría
                -
                <small>Femaza</small>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="bi bi-house-door fs-6"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.categories.index') }}">Categorías</a>
            </li>
            <li class="breadcrumb-item">
                Crear
            </li>
        </ul>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="tile">
                <h5 class="tile-title">Formulario de Nueva Categoría</h5>
                <div class="tile-body">
                    <form action="#" method="POST">
                        @csrf

                        {{-- Nombre --}}
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control"
                                placeholder="Ingrese nombre de la categoría" required>
                        </div>

                        {{-- Descripción --}}
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea id="descripcion" name="descripcion" class="form-control" rows="3"
                                placeholder="Ingrese descripción de la categoría"></textarea>
                        </div>

                        {{-- Estado --}}
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <select id="estado" name="estado" class="form-select">
                                <option value="activo" selected>Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>

                        {{-- Fecha Creación --}}
                        <div class="mb-4">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" id="fecha" name="fecha" class="form-control"
                                value="{{ date('Y-m-d') }}">
                        </div>

                        {{-- Botones --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left-circle me-1"></i>
                                Volver
                            </a>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i>
                                Guardar Categoría
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@include('layouts.template.footer_admin')
