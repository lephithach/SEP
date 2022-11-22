@extends('home')
@section('root')
<div class="grid lg:grid-cols-1">
    <h3 class="font-bold text-xl mb-4">KHO HÀNG</h3>

    {{-- <form action=" {{ route('tra-cuu-khach-hang.post') }}" class="grid xl:grid-cols-5" method="post">
        @csrf

        <div class="form-group">
            <label for="sdt" class="w-1/2">SĐT</label>
            <input type="text" name="sdt" id="sdt" value="<?= $sdt ?? '' ?>" class="shadow appearance-none border rounded py-2 px-3 text-gray-700" placeholder="Số điện thoại" />
        </div>

        <div class="form-group">
            <label for="hoten" class="w-1/2">Họ Tên</label>
            <input type="text" name="hoten" id="hoten" value="<?= $hoten ?? '' ?>" class="shadow bh appearance-none border rounded py-2 px-3 text-gray-700" disabled />
        </div>

        <div class="form-group">
            <label for="ngaysinh" class="w-1/2">Ngày sinh</label>
            <input type="text" name="ngaysinh" id="ng   aysinh" value="<?= $ngaysinh ?? '' ?>" class="shadow appearance-none border rounded py-2 px-3 text-gray-700" disabled />
        </div>

        <div class="form-group">
            <input type="submit" value="Tra cứu" class="cursor-poiter shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" />
        </div>
    </form> --}}

    <div class="list-order mt-4">
        <table class="table-auto w-full overflow-x-auto relative uppercase">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Tồn</th>
                    <th>Khả dụng</th>
                    <th>Đơn giá</th>
                    <th>Đặt hàng</th>
                </tr>
            </thead>

            <tbody>
                @if (count($productList) > 0)
                    @foreach ($productList as $key => $product)
                        <tr>
                            <td class="text-center">{{ ++$key }}</td>
                            <td>{{ $product->TenSP }}</td>
                            <td class="text-center">{{ $product->SoLuong }}</td>
                            <td class="text-center">{{ $product->KhaDung }}</td>
                            <td class="text-right">{{ number_format($product->GiaBan) }}</td>
                            <td class="text-center">{{ $product->DatHang }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="4">Chưa có dữ liệu</td>
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