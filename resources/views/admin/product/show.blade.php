{{-- resources/views/admin/product/show.blade.php --}}
@include('layouts.template.header_admin')
@include('layouts.template.nav_admin')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="bi bi-box-seam"></i>
                Detalles del producto — Tienda Femaza
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="bi bi-house-door fs-6"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('admin.products.index') }}">Productos</a>
            </li>
            <li class="breadcrumb-item">
                Ver
            </li>
        </ul>
    </div>

    @php
        // Aquí simulamos los datos que recibimos por parámetro. En el closure ya definimos $producto.
        // (Si llamas directamente a esta vista sin pasar $producto, deberás adaptarla.)
    @endphp

    <div class="row">
        {{-- Columna izquierda: tarjeta con imagen y datos básicos --}}
        <div class="col-md-4">
            <div class="card mb-4">
                @if (!empty($producto['imagen_url']))
                    <img 
                        src="{{ $producto['imagen_url'] }}" 
                        class="card-img-top" 
                        alt="Imagen de {{ $producto['nombre'] }}" 
                        style="object-fit: cover; height: 250px;"
                    >
                @else
                    <div 
                        class="d-flex justify-content-center align-items-center bg-light" 
                        style="height: 250px;"
                    >
                        <i class="bi bi-image fs-1 text-secondary"></i>
                    </div>
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $producto['nombre'] }}</h5>
                    {{-- Estado --}}
                    <p class="mb-1">
                        <strong>Estado:</strong>
                        @if ($producto['estado'] === 'Activo')
                            <span class="badge bg-success">{{ $producto['estado'] }}</span>
                        @else
                            <span class="badge bg-secondary">{{ $producto['estado'] }}</span>
                        @endif
                    </p>
                    {{-- Proveedor --}}
                    <p class="mb-1">
                        <strong>Proveedor:</strong>
                        <a href="#" class="text-decoration-none">
                            {{ $producto['proveedor']['nombre'] }}
                        </a>
                    </p>
                    {{-- Categoría --}}
                    <p class="mb-0">
                        <strong>Categoría:</strong>
                        <a href="#" class="text-decoration-none">
                            {{ $producto['categoria']['nombre'] }}
                        </a>
                    </p>
                </div>
            </div>
        </div>

        {{-- Columna derecha: información detallada --}}
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Información de producto</h5>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Código:</dt>
                        <dd class="col-sm-8">{{ $producto['codigo'] }}</dd>

                        <dt class="col-sm-4">Descripción:</dt>
                        <dd class="col-sm-8">{{ $producto['descripcion'] }}</dd>

                        <dt class="col-sm-4">Precio de venta:</dt>
                        <dd class="col-sm-8">${{ $producto['precio_venta'] }}</dd>

                        <dt class="col-sm-4">Stock:</dt>
                        <dd class="col-sm-8">{{ $producto['stock'] }}</dd>

                        <dt class="col-sm-4">Creado:</dt>
                        <dd class="col-sm-8">{{ $producto['created_at'] }}</dd>

                        <dt class="col-sm-4">Actualizado:</dt>
                        <dd class="col-sm-8">{{ $producto['updated_at'] }}</dd>
                    </dl>
                </div>
                <div class="card-footer text-end">
                    <a 
                        href="{{ route('admin.products.index') }}" 
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
