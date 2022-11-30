@extends('layout')
@section('root')
<div>
    <h3 class="font-bold text-xl mb-4">KHO HÀNG</h3>

    <div class="list-kho mt-4 relative overflow-x-auto">
        <table class="table table-fixed w-full uppercase">
            <thead>
                <tr>
                    <th class="w-[10%]">STT</th>
                    <th class="w-[30%]">Tên sản phẩm</th>
                    <th class="w-[10%]">Tồn</th>
                    <th class="w-[10%]">Khả dụng</th>
                    <th class="w-[15%]">Đơn giá</th>
                    <th class="w-[10%]">Đặt hàng</th>
                    <th class="w-[15%]">&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                <form action="{{ route('kho.index') }}" method="GET" id="form-search">
                    <tr>
                        <td><button type="reset" name="f-reset" id="f-reset" class="c-input-form-reset">X</button></td>
                        <td><input type="text" name="s-tensp" id="s-tensp" class="c-input-form-search" placeholder="Search" value="{{ \Request::get('s-tensp') ?? "" }}" autocomplete="off" /></td>
                        <td><input type="text" name="s-soluong" id="s-soluong" class="c-input-form-search" placeholder="Search" value="{{ \Request::get('s-soluong') ?? "" }}" autocomplete="off" /></td>
                        <td><input type="text" name="s-khadung" id="s-khadung" class="c-input-form-search" placeholder="Search" value="{{ \Request::get('s-khadung') ?? "" }}" autocomplete="off" /></td>
                        <td><input type="text" name="s-giaban" id="s-giaban" class="c-input-form-search" placeholder="Search" value="{{ \Request::get('s-giaban') ?? "" }}" autocomplete="off" /></td>
                        <td><input type="text" name="s-dathang" id="s-dathang" class="c-input-form-search" placeholder="Search" value="{{ \Request::get('s-dathang') ?? "" }}" autocomplete="off" /></td>
                        <td>&nbsp;</td>
                    </tr>

                    <button type="submit" hidden></button>
                </form>

                @if (count($productList) > 0)
                    @foreach ($productList as $key => $product)
                        <tr>
                            <td class="text-center">{{ ++$key }}</td>
                            <td>{{ $product->TenSP }}</td>
                            <td class="text-center">{{ $product->SoLuong }}</td>
                            <td class="text-center">{{ $product->KhaDung }}</td>
                            <td class="text-right">{{ number_format($product->GiaBan) }}</td>
                            <td class="text-center">{{ $product->DatHang }}</td>
                            <td class="text-center">
                                <a href="{{ route('kho.edit', [$product->MaSP]) }}"><i class="bi bi-pencil-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="6">Chưa có dữ liệu</td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>

    <div class="paginate mt-4">
        @if (count($productList) > 0)
            {{ $productList->links('vendor.pagination.custom') }}
        @endif
    </div>
</div>
@endsection