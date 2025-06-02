{{-- resources/views/admin/product/create.blade.php --}}
@include('layouts.template.header_admin')
@include('layouts.template.nav_admin')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="bi bi-box-seam fs-4"></i>
                Nuevo Producto
            </h1>
            <small>Registrar un nuevo producto</small>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="bi bi-house-door fs-6"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.products.index') }}">Productos</a>
            </li>
            <li class="breadcrumb-item">
                Crear
            </li>
        </ul>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="tile">
                <h5 class="tile-title">Formulario de Producto</h5>
                <div class="tile-body">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Imagen --}}
                        <div class="mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" id="imagen" name="imagen" class="form-control" accept="image/*">
                        </div>

                        {{-- Código --}}
                        <div class="mb-3">
                            <label for="codigo" class="form-label">Código</label>
                            <input type="text" id="codigo" name="codigo" class="form-control"
                                placeholder="Ingrese código (SKU)">
                        </div>

                        {{-- Nombre --}}
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control"
                                placeholder="Ingrese nombre del producto">
                        </div>

                        {{-- Descripción --}}
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea id="descripcion" name="descripcion" class="form-control" rows="3"
                                placeholder="Ingrese descripción del producto"></textarea>
                        </div>

                        {{-- Categoría --}}
                        <div class="mb-3">
                            <label for="categoria_id" class="form-label">Categoría</label>
                            <select id="categoria_id" name="categoria_id" class="form-select">
                                <option value="">-- Seleccione Categoría --</option>
                                <option value="1">Electrónica</option>
                                <option value="2">Ropa</option>
                                <option value="3">Hogar</option>
                                {{-- ... otras opciones ... --}}
                            </select>
                        </div>

                        {{-- Proveedor --}}
                        <div class="mb-3">
                            <label for="proveedor_id" class="form-label">Proveedor</label>
                            <select id="proveedor_id" name="proveedor_id" class="form-select">
                                <option value="">-- Seleccione Proveedor --</option>
                                <option value="1">Mandonglas S.A.</option>
                                <option value="2">Julio González Import</option>
                                <option value="3">Lácteos del Norte</option>
                                {{-- ... otras opciones ... --}}
                            </select>
                        </div>

                        {{-- Precio de Venta --}}
                        <div class="mb-3">
                            <label for="precio_venta" class="form-label">Precio de venta</label>
                            <input type="number" step="0.01" id="precio_venta" name="precio_venta"
                                class="form-control" placeholder="Ingresar precio de venta">
                        </div>

                        {{-- Stock --}}
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" id="stock" name="stock" class="form-control"
                                placeholder="Cantidad en stock">
                        </div>

                        {{-- Estado --}}
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <select id="estado" name="estado" class="form-select">
                                <option value="">-- Seleccione Estado --</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>

                        {{-- Botones de acción --}}
                        <div class="mt-4">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Regresar
                            </a>
                            <button type="submit" class="btn btn-primary ms-2">
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
