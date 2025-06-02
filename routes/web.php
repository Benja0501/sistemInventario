<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});
Route::get('/admin/categories', function () {
    return view('admin.category.index');
})->name('admin.categories.index');

Route::get('/admin/categories/create', function () {
    return view('admin.category.create');
})->name('admin.categories.create');

// 1) Listado de proveedores
Route::get('/admin/providers', function () {
    return view('admin.provider.index');
})->name('admin.providers.index');

// 2) Formulario para crear un proveedor
Route::get('/admin/providers/create', function () {
    return view('admin.provider.create');
})->name('admin.providers.create');

// 3) Detalle (“show”) de un proveedor, con lista de productos asignados
Route::get('/admin/providers/{id}', function ($id) {
    // Por ahora sólo devolvemos la vista; más adelante, recibirás el $id y extraerás datos desde la BD.
    return view('admin.provider.show', ['id' => $id]);
})->name('admin.providers.show');

Route::get('/dashboard', function () {
    return view('admin');
})->middleware(['auth', 'verified'])->name('dashboard');
// 1) Listado de productos
Route::get('/admin/products', function () {
    return view('admin.product.index');
})->name('admin.products.index');

// 2) Formulario para crear un producto
Route::get('/admin/products/create', function () {
    // En un caso real, le pasarías listas de categorías y proveedores
    return view('admin.product.create');
})->name('admin.products.create');

// 3) Detalle (“show”) de un producto, con categoría y proveedor asignados
Route::get('/admin/products/{id}', function ($id) {
    // Simulamos los datos del producto. En un controlador real, harías Product::find($id)->with('category','provider')
    $producto = [
        'id'             => $id,
        'codigo'         => 100 + $id,
        'nombre'         => 'Producto Ejemplo #' . $id,
        'descripcion'    => 'Descripción del producto #' . $id,
        'precio_venta'   => number_format(5.5 + $id, 2),
        'stock'          => (10 * $id) % 50,
        'estado'         => $id % 2 ? 'Activo' : 'Inactivo',
        'categoria'      => [
            'id'   => 2,
            'nombre' => 'Categoría Ejemplo',
        ],
        'proveedor'      => [
            'id'   => 3,
            'nombre' => 'Proveedor Ejemplo',
        ],
        'imagen_url'     => '/build/assets/images/placeholder.png', // imagen de ejemplo
        'created_at'     => '2025-05-28 16:35',
        'updated_at'     => '2025-06-01 18:59',
    ];

    return view('admin.product.show', compact('producto'));
})->name('admin.products.show');

// 1) Listado de compras (index)
Route::get('/admin/purchases', function () {
    return view('admin.purchase.index');
})->name('admin.purchases.index');

// 2) Formulario para crear una nueva compra (create)
Route::get('/admin/purchases/create', function () {
    // En un caso real, aquí pasarías la lista de proveedores y productos disponibles.
    return view('admin.purchase.create');
})->name('admin.purchases.create');

// 3) Detalle (“show”) de una compra existente
Route::get('/admin/purchases/{id}', function ($id) {
    // Simulamos datos de ejemplo; en el futuro los obtendrás desde el controlador y la BD.
    $compra = [
        'id'            => $id,
        'proveedor'     => [
            'id'    => 2,
            'nombre'=> 'Mandonglas S.A.',
        ],
        'impuesto'      => 18, // en porcentaje
        'created_at'    => '2025-06-02 10:15',
        'total_subtotal'=> 250.00,
        'total_impuesto'=> 45.00,
        'total_pagar'   => 295.00,
        'detalles'      => [
            [
                'producto_id'   => 101,
                'producto_nombre' => 'Producto A',
                'precio_compra' => 20.00,
                'cantidad'      => 3,
                'subtotal'      => 60.00,
            ],
            [
                'producto_id'   => 102,
                'producto_nombre' => 'Producto B',
                'precio_compra' => 30.00,
                'cantidad'      => 4,
                'subtotal'      => 120.00,
            ],
            [
                'producto_id'   => 103,
                'producto_nombre' => 'Producto C',
                'precio_compra' => 35.00,
                'cantidad'      => 2,
                'subtotal'      => 70.00,
            ],
        ],
    ];

    return view('admin.purchase.show', compact('compra'));
})->name('admin.purchases.show');

// 1) Listado de Áreas
Route::get('/admin/areas', function () {
    return view('admin.area.index');
})->name('admin.areas.index');

// 2) Formulario para crear una nueva Área
Route::get('/admin/areas/create', function () {
    return view('admin.area.create');
})->name('admin.areas.create');

// 3) Vista “show” de una Área específica
Route::get('/admin/areas/{id}', function ($id) {
    // Simulamos un arreglo con datos de ejemplo para el área:
    $area = [
        'id'          => $id,
        'nombre'      => 'Área Ejemplo #' . $id,
        'descripcion' => 'Descripción corta del área número ' . $id,
        'estado'      => $id % 2 ? 'Activo' : 'Inactivo',
        'created_at'  => '2025-06-0' . $id . ' 09:2' . $id,
    ];

    return view('admin.area.show', compact('area'));
})->name('admin.areas.show');

// 1) Listado de Salidas (index)
Route::get('/admin/outs', function () {
    return view('admin.out.index');
})->name('admin.outs.index');

// 2) Formulario para crear una nueva Salida (create)
Route::get('/admin/outs/create', function () {
    // En un caso real, aquí pasarías la lista de áreas y productos disponibles.
    return view('admin.out.create');
})->name('admin.outs.create');

// 3) Detalle (“show”) de una Salida específica
Route::get('/admin/outs/{id}', function ($id) {
    // Simulemos los datos de ejemplo para la salida:
    $salida = [
        'id'         => $id,
        'area'       => [
            'id'   => 2,
            'nombre' => 'Almacén Central',
        ],
        'created_at' => '2025-06-05 14:30',
        'detalles'   => [
            [
                'producto_id'   => 101,
                'producto_nombre' => 'Producto A',
                'cantidad'      => 5,
            ],
            [
                'producto_id'   => 102,
                'producto_nombre' => 'Producto B',
                'cantidad'      => 3,
            ],
            [
                'producto_id'   => 103,
                'producto_nombre' => 'Producto C',
                'cantidad'      => 10,
            ],
        ],
    ];

    return view('admin.out.show', compact('salida'));
})->name('admin.outs.show');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
