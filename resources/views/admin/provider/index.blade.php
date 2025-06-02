{{-- resources/views/admin/provider/index.blade.php --}}
@include('layouts.template.header_admin')
@include('layouts.template.nav_admin')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="bi bi-truck fs-4"></i>
                Proveedores
                <a href="{{ route('admin.providers.create') }}" class="btn btn-sm btn-primary ms-3">
                    <i class="bi bi-plus-lg"></i> Nuevo
                </a>
            </h1>
            <small>Listado de proveedores registradas</small>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="bi bi-house-door fs-6"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                Proveedores
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="providerTable" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>RUC</th>
                                    <th>Teléfono</th>
                                    <th>Estado</th>
                                    <th>Fecha Creación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Fila de ejemplo #1 --}}
                                <tr>
                                    <td>1</td>
                                    <td>Mandonglas S.A.</td>
                                    <td>10121548251</td>
                                    <td>987698547</td>
                                    <td>Activo</td>
                                    <td>2025-05-27</td>
                                    <td>
                                        <a href="{{ route('admin.providers.show', 1) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                    </td>
                                </tr>
                                {{-- Fila de ejemplo #2 --}}
                                <tr>
                                    <td>2</td>
                                    <td>Julio González Import</td>
                                    <td>20457896321</td>
                                    <td>912345678</td>
                                    <td>Inactivo</td>
                                    <td>2025-04-12</td>
                                    <td>
                                        <a href="{{ route('admin.providers.show', 2) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                    </td>
                                </tr>
                                {{-- Fila de ejemplo #3 --}}
                                <tr>
                                    <td>3</td>
                                    <td>Lácteos del Norte</td>
                                    <td>10789652134</td>
                                    <td>944556677</td>
                                    <td>Activo</td>
                                    <td>2025-03-05</td>
                                    <td>
                                        <a href="{{ route('admin.providers.show', 3) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                    </td>
                                </tr>
                                {{-- Fila de ejemplo #4 --}}
                                <tr>
                                    <td>4</td>
                                    <td>Textiles Unión</td>
                                    <td>10876543219</td>
                                    <td>966778899</td>
                                    <td>Activo</td>
                                    <td>2025-02-20</td>
                                    <td>
                                        <a href="{{ route('admin.providers.show', 4) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                    </td>
                                </tr>
                                {{-- Fila de ejemplo #5 --}}
                                <tr>
                                    <td>5</td>
                                    <td>Electrónicos Andinos</td>
                                    <td>20543219876</td>
                                    <td>923112233</td>
                                    <td>Inactivo</td>
                                    <td>2025-01-30</td>
                                    <td>
                                        <a href="{{ route('admin.providers.show', 5) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                    </td>
                                </tr>
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
            $('#providerTable').DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
                }
            });
        });
    </script>
@endpush
