@extends('layout')
@section('root')

@if(isset($result))
    @php
        // Add number 0 to first SDT
        $sdt = $result->SDTKhachHang = '0'. $result->SDTKhachHang;
        $hoten = "{$result->Ho} {$result->Ten}";
        $ngaysinh = date('d/m/Y', strtotime($result->NgaySinh));
        $email = $result->email;
    @endphp
@endif

    <div>
        <h3 class="font-bold text-xl mb-4">TRA CỨU KHÁCH HÀNG</h3>

        <form action=" {{ route('khachhang.find') }}" class="flex flex-col md:flex-row gap-4" method="post">
            @csrf

            <div class="form-group">
                <label for="sdt">SĐT</label>
                <input type="text" name="sdt" id="sdt" value="<?= $sdt ?? '' ?>" autocomplete="off" class="c-input" placeholder="Số điện thoại" />
            </div>

            <div class="form-group">
                <label for="hoten">Họ Tên</label>
                <input type="text" name="hoten" id="hoten" value="<?= $hoten ?? '' ?>" class="c-input" disabled />
            </div>

            <div class="form-group">
                <label for="ngaysinh">Ngày sinh</label>
                <input type="text" name="ngaysinh" id="ngaysinh" value="<?= $ngaysinh ?? '' ?>" class="c-input" disabled />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?= $email ?? '' ?>" class="c-input" disabled />
            </div>

            <div class="form-group">
                <input type="submit" value="Tra cứu" class="c-btn-submit" />
            </div>
        </form>

        <div class="list-order mt-4 overflow-x-auto relative">
            <table class="table-fixed w-full uppercase">
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
                    @for ($i=0; $i<5; $i++)
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