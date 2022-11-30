@extends('layout')
@section('root')
<div>
    <h3 class="c-title-h3">DANH SÁCH KHÁCH HÀNG</h3>

    <div class="list-customer mt-4 relative overflow-x-auto">
        <table class="table table-fixed w-full">
            <thead>
                <tr class="uppercase">
                    <th class="w-[10%]">STT</th>
                    <th class="w-[15%]">Họ</th>
                    <th class="w-[15%]">Tên</th>
                    <th class="w-[10%]">Ngày Sinh</th>
                    <th class="w-[10%]">Giới Tính</th>
                    <th class="w-[15%]">SĐT</th>
                    <th class="w-[15%]">Email</th>
                    <th class="w-[15%]">&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                @if (count($khachHangList) > 0)
                    @foreach ($khachHangList as $key => $khachHang) 
                    @php
                        $SDTKhachHang = "0{$khachHang->SDTKhachHang}";
                        switch ($khachHang->GioiTinh) {
                            case '0':
                                $GioiTinh = "Nam";
                                break;
                            case '1':
                                $GioiTinh = "Nữ";
                                break;
                            case '2':
                                $GioiTinh = "Khác";
                                break;
                            default:
                                break;
                        }
                    @endphp
                        <tr>
                            <td class="text-center">{{ ++$key }}</td>
                            <td>{{ $khachHang->Ho }}</td>
                            <td class="text-center">{{ $khachHang->Ten }}</td>
                            <td class="text-center">{{ date('d/m/Y', strtotime($khachHang->NgaySinh)) }}</td>
                            <td class="text-center">{{ $GioiTinh }}</td>
                            <td class="text-center">{{ $SDTKhachHang }}</td>
                            <td class="text-center">{{ $khachHang->Email }}</td>
                            <td class="text-center">
                                <a href="{{ route('khachhang.edit', [$SDTKhachHang]) }}"><i class="bi bi-pencil-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="7">Chưa có dữ liệu</td>
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