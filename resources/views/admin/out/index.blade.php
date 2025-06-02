{{-- resources/views/admin/out/index.blade.php --}}
@include('layouts.template.header_admin')
@include('layouts.template.nav_admin')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="bi bi-box-arrow-right fs-4"></i>
                Salidas de Stock
                <a href="{{ route('admin.outs.create') }}" class="btn btn-sm btn-primary ms-3">
                    <i class="bi bi-plus-lg"></i> Nueva Salida
                </a>
            </h1>
            <small>Listado de salidas realizadas</small>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="bi bi-house-door fs-6"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                Salidas
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table id="outTable" class="table table-striped table-bordered" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Área</th>
                                    <th>Fecha</th>
                                    <th>Total Productos</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Generamos 5 registros de ejemplo --}}
                                @for ($i = 1; $i <= 5; $i++)
                                    @php
                                        // Total Productos: suma ficticia (por ejemplo, 5 + 3 + 10 = 18)
                                        $totalProductos = 5 + 3 + 10;
                                        // Fecha de ejemplo:
                                        $fechaSalida = "2025-06-0{$i} 1{$i}:2{$i}";
                                        // Área de ejemplo
                                        $areaNombre = $i % 2 ? 'Almacén Central' : 'Vitrina Principal';
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $areaNombre }}</td>
                                        <td>{{ $fechaSalida }}</td>
                                        <td>{{ $totalProductos }}</td>
                                        <td>
                                            <a href="{{ route('admin.outs.show', $i) }}" class="btn btn-sm btn-info">
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
            $('#outTable').DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50],
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
                }
            });
        });
    </script>
@endpush
