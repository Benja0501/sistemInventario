<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    {{-- <div class="app-sidebar__user">
        <i class="app-sidebar__user-avatar fa-solid fa-user-tie"></i>
        <div>
            <p class="app-sidebar__user-name">Admin</p>
            <p class="app-sidebar__user-designation">Administrador</p>
        </div>
    </div> --}}
    <ul class="app-menu">
        {{-- Dashboard --}}
        <li>
            <a class="app-menu__item" href="{{ route('dashboard') }}">
                <i class="app-menu__icon bi bi-speedometer"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        {{-- Tienda --}}
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon bi bi-archive-fill"></i>
                <span class="app-menu__label">Tienda</span>
                <i class="treeview-indicator bi bi-chevron-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('admin.categories.index') }}">
                        <i class="icon bi bi-circle-fill"></i> Categorías
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('admin.products.index') }}">
                        <i class="icon bi bi-circle-fill"></i> Productos
                    </a>
                </li>
            </ul>
        </li>
        {{-- Proveedores --}}
        <li>
            <a class="app-menu__item" href="{{ route('admin.providers.index') }}">
                <i class="app-menu__icon fa-solid fa-users"></i>
                <span class="app-menu__label">Proveedores</span>
            </a>
        </li>
        {{-- Area --}}
        <li>
            <a class="app-menu__item" href="{{ route('admin.areas.index') }}">
                <i class="app-menu__icon fa-solid fa-location-dot"></i>
                <span class="app-menu__label">Area</span>
            </a>
        </li>
        {{-- Compra --}}
        <li>
            <a class="app-menu__item" href="{{ route('admin.purchases.index') }}">
                <i class="app-menu__icon bi bi-cart-plus-fill"></i>
                <span class="app-menu__label">Compra</span>
            </a>
        </li>
        {{-- Salida --}}
        <li>
            <a class="app-menu__item" href="{{ route('admin.outs.index') }}">
                <i class="app-menu__icon fa-solid fa-truck" aria-hidden="true"></i>
                <span class="app-menu__label">Salida</span>
            </a>
        </li>
    </ul>
</aside>
