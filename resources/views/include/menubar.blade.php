<ul class="menu-bar">
    <li class="menu-bar__list {{ (request()->routeIs('dashboard*')) ? 'active' : '' }}">
        <div class="menu-bar-block">
            <i class="bi bi-house icon"></i>
            <a href="{{ route('dashboard') }}">
                <span class="text">Dashboard</span>
            </a>
            {{-- <i class="bi bi-caret-down-fill arrow-down"></i> --}}
        </div>

        {{-- <ul class="menu-sub">
            <li class="menu-sub-list">Tra cứu</li>
            <li class="menu-sub-list">test 1</li>
            <li class="menu-sub-list">test 1</li>
        </ul> --}}
    </li>

    <li class="menu-bar__list {{ (request()->is('khach-hang*')) ? 'active' : '' }}">
        <div class="menu-bar-block">
            <i class="bi bi-person-fill"></i>
            <span class="text">Khách hàng</span>
            <i class="bi bi-caret-down-fill arrow-down"></i>
        </div>

        <ul class="menu-sub">
            <li class="menu-sub-list {{ (request()->routeIs('khachhang.index')) ? 'active' : '' }}">
                <a href="{{ route('khachhang.index') }}">Danh sách</a>
            </li>
            <li class="menu-sub-list {{ (request()->routeIs('khachhang.tra-cuu')) ? 'active' : '' }}">
                <a href="{{ route('khachhang.tra-cuu') }}">Tra cứu</a>
            </li>
            <li class="menu-sub-list {{ (request()->routeIs('khachhang.create')) ? 'active' : '' }}">
                <a href="{{ route('khachhang.create') }}">Thêm mới</a>
            </li>
        </ul>
    </li>

    <li class="menu-bar__list {{ (request()->routeIs('kho*')) ? 'active' : '' }}">
        <div class="menu-bar-block">
            <i class="bi bi-layers"></i>
            <span class="text">Kho hàng</span>
            <i class="bi bi-caret-down-fill arrow-down"></i>
        </div>

        <ul class="menu-sub">
            <li class="menu-sub-list {{ (request()->routeIs('kho.index')) ? 'active' : '' }}">
                <a href="{{ route('kho.index') }}">Tồn kho</a>
            </li>
            <li class="menu-sub-list {{ (request()->routeIs('kho.nhapkho')) ? 'active' : '' }}">
                <a href="{{ route('kho.nhapkho') }}">Nhập kho</a>
            </li>
        </ul>
    </li>
</ul>