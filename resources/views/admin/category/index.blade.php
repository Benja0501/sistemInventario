@include('layouts.template.header_admin')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa-solid fa-box-tissue"></i>
                Categorías - <small>Femaza</small>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary ms-3">
                    <i class="bi bi-plus-lg"></i>
                    Agregar
                </a>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categorías</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <div class="container my-4">
                            <h2 class="mb-3">Listado de Categorías</h2>
                            <table id="sampleTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th>Fecha Creación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Electrónica</td>
                                        <td>Dispositivos y accesorios electrónicos</td>
                                        <td>Activo</td>
                                        <td>2023-01-15</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Ropa</td>
                                        <td>Prendas de vestir para hombre y mujer</td>
                                        <td>Activo</td>
                                        <td>2023-02-10</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Hogar</td>
                                        <td>Artículos para el hogar y decoración</td>
                                        <td>Inactivo</td>
                                        <td>2022-12-05</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Juguetes</td>
                                        <td>Juguetes y juegos para niños</td>
                                        <td>Activo</td>
                                        <td>2023-03-20</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Deportes</td>
                                        <td>Equipamiento y ropa deportiva</td>
                                        <td>Activo</td>
                                        <td>2023-04-08</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('layouts.template.footer_admin')
