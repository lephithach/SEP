@extends('layout')
@section('root')
<div>
    <h3 class="c-title-h3">DANH SÁCH KHÁCH HÀNG</h3>

    <div class="list-customer mt-4 relative overflow-x-auto">
        <table class="table table-fixed w-full uppercase">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ</th>
                    <th>Tên</th>
                    <th>Ngày Sinh</th>
                    <th>SĐT</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>
                @if (count($khachHangList) > 0)
                    @foreach ($khachHangList as $key => $khachHang)
                        <tr>
                            <td class="text-center">{{ ++$key }}</td>
                            <td>{{ $khachHang->Ho }}</td>
                            <td class="text-center">{{ $khachHang->Ten }}</td>
                            <td class="text-center">{{ date('d/m/Y', strtotime($khachHang->NgaySinh)) }}</td>
                            <td class="text-right">{{ $khachHang->SDTKhachHang }}</td>
                            <td class="text-center">{{ $khachHang->Email }}</td>
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
        @if (count($khachHangList) > 0)
            {{ $khachHangList->links('vendor.pagination.custom') }}
        @endif
    </div>
</div>
@endsection