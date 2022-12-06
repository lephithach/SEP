@extends('layout')
@section('root')
<div>
    <h3 class="c-title-h3">SỬA KHÁCH HÀNG</h3>

    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
            <ul class="c-message-error">
                @foreach ($errors->all() as $error)
                    <li class="font-medium">{{ $error }}</li>
                @endforeach
            </ul>
        </div>            
    @endif

    @if(!empty(session()->get('status')))
        <div class="c-alert-{{ session()->get('status') }}" role="alert">
            <p>{{ session()->get('message') }}</p>
        </div>
    @endif

    <form action="{{ route('khachhang.update', "0{$khachHang->SDTKhachHang}") }}" method="POST" id="formcapnhatkhachhang" class="flex flex-col md:flex-row flex-wrap gap-4">
        @csrf
        <div class="form-group">
            <label for="sdt">SĐT</label>
            <input type="text" name="sdt" id="sdt" placeholder="Số điện thoại" class="c-input @error('sdt') c-input-error @enderror" autocomplete="off" value="{{ old('sdt') ?? "0{$khachHang->SDTKhachHang}" }}" />
        </div>

        <div class="form-group">
            <label for="ho">Họ</label>
            <input type="text" name="ho" id="ho" placeholder="Họ" class="c-input @error('ho') c-input-error @enderror" autocomplete="off" value="{{ old('ho') ?? $khachHang->Ho }}" />
        </div>

        <div class="form-group">
            <label for="ten">Tên</label>
            <input type="text" name="ten" id="ten" placeholder="Tên" class="c-input @error('ten') c-input-error @enderror" autocomplete="off" value="{{ old('ten') ?? $khachHang->Ten }}" />
        </div>

        <div class="form-group">
            <label for="ngaysinh">Ngày Sinh</label>
            <input type="date" name="ngaysinh" id="ngaysinh" placeholder="Ngày Sinh" class="c-input @error('ngaysinh') c-input-error @enderror" autocomplete="off" value="{{ old('ngaysinh') ?? $khachHang->NgaySinh }}" />
        </div>
        
        <div class="form-group">
            <label for="gioitinh">Giới Tính</label>
            <select name="gioitinh" id="gioitinh" class="c-input @error('gioitinh') c-input-error @enderror">
                <option value="0" @if (old('gioitinh') == "0" || $khachHang->GioiTinh == "0") {{'selected'}} @endif>Nam</option>
                <option value="1" @if (old('gioitinh') == "1" || $khachHang->GioiTinh == "1") {{'selected'}} @endif>Nữ</option>
                <option value="2" @if (old('gioitinh') == "2" || $khachHang->GioiTinh == "2") {{'selected'}} @endif>Khác</option>
            </select>
        </div>

        <div class="form-group">
            <label for="diachi">Địa chỉ</label>
            <input type="text" name="diachi" id="diachi" placeholder="Địa chỉ" class="c-input @error('diachi') c-input-error @enderror" autocomplete="off" value="{{ old('diachi') ?? $khachHang->DiaChi }}" />
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Email" class="c-input @error('email') c-input-error @enderror" autocomplete="off" value="{{ old('email') ?? $khachHang->Email }}" />
        </div>

        <div class="form-group">
            <label for="cccd">CCCD</label>
            <input type="text" name="cccd" id="cccd" placeholder="CCCD" class="c-input @error('cccd') c-input-error @enderror" autocomplete="off" value="{{ old('cccd') ?? $khachHang->CCCD }}" />
        </div>

        <div class="form-group">
            <input type="submit" name="btn-submit" id="btn-submit" class="c-btn-submit" value="Cập nhật" />
        </div>
    </form>
</div>
@endsection