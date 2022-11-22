<ul class="menu-bar">
    <li class="menu-bar__list {{ (request()->routeIs('home*')) ? 'active' : '' }}">
        <div class="menu-bar-block">
            <i class="bi bi-house icon"></i>
            <span class="text">Dashboard</span>
            <i class="bi bi-caret-down-fill arrow-down"></i>
        </div>

        <ul class="menu-sub">
            <li class="menu-sub-list">Tra cứu</li>
            <li class="menu-sub-list">test 1</li>
            <li class="menu-sub-list">test 1</li>
        </ul>
    </li>

    <li class="menu-bar__list {{ (request()->routeIs('khach-hang*')) ? 'active' : '' }}">
        <div class="menu-bar-block">
            <i class="bi bi-person-fill"></i>
            <span class="text">Khách hàng</span>
            <i class="bi bi-caret-down-fill arrow-down"></i>
        </div>

        <ul class="menu-sub">
            <li class="menu-sub-list"><a href="{{ route('tra-cuu-khach-hang'); }}">Tra cứu khách hàng</a></li>
        </ul>
    </li>

    <li class="menu-bar__list {{ (request()->routeIs('kho*')) ? 'active' : '' }}">
        <div class="menu-bar-block">
            <i class="bi bi-layers"></i>
            <span class="text">Kho hàng</span>
            <i class="bi bi-caret-down-fill arrow-down"></i>
        </div>

        <ul class="menu-sub">
            <li class="menu-sub-list {{ (request()->routeIs('kho.index')) ? 'active' : '' }}"><a href="{{ route('kho.index'); }}">Tồn kho</a></li>
        </ul>
    </li>
</ul>