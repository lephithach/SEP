@extends('home')
@section('root')

@if(isset($result))
    @php
        // Add number 0 to first SDT
        $sdt = $result->SDTKhachHang = '0'. $result->SDTKhachHang;
        $hoten = "{$result->Ho} {$result->Ten}";
        $ngaysinh = date('d/m/Y', strtotime($result->NgaySinh));
    @endphp
@endif

    <div class="grid lg:grid-cols-1">
        <h3 class="font-bold text-xl mb-4">TRA CỨU KHÁCH HÀNG</h3>

        <form action=" {{ route('tra-cuu-khach-hang.post') }}" class="grid xl:grid-cols-5" method="post">
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
        </form>

        <div class="list-order mt-4">
            <table class="table-auto w-full overflow-x-auto relative uppercase">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>

                <tbody>
                    @for ($i=0; $i<10; $i++)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>Test {{ $i }}</td>
                            <td>Malcolm Lockyer</td>
                            <td>1961</td>
                            <td>1961</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection