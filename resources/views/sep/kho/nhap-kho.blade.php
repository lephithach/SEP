@extends('layout')
@section('root')
    <h3 class="font-bold text-xl mb-4">NHẬP KHO</h3>

    @if ($errors->any())
    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="font-medium">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('kho.store') }}" method="POST" id="formnhapkho" class="flex flex-col md:flex-row gap-4">
        @csrf
        <div class="form-group">
            <label for="tensp">Tên SP</label>
            <input class="c-input @error('tensp') c-input-error @enderror" type="text" name="tensp" id="tensp" value="{{ old('tensp') }}" placeholder="Tên Sản Phẩm" autocomplete="off" />
        </div>

        <div class="form-group">
            <label for="soluong">SL</label>
            <input class="c-input @error('soluong') c-input-error @enderror" type="number" name="soluong" id="soluong" value="{{ old('soluong') }}" placeholder="Số Lượng" autocomplete="off" />
        </div>

        <div class="form-group">
            <label for="gianhap">Giá Nhập</label>
            <input class="c-input @error('gianhap') c-input-error @enderror" type="number" name="gianhap" id="gianhap" placeholder="Giá Nhập" value="{{ old('gianhap') }}" autocomplete="off" />
        </div>

        <div class="form-group">
            <label for="giaban">Giá Bán</label>
            <input class="c-input @error('giaban') c-input-error @enderror" type="number" name="giaban" id="giaban" placeholder="Giá Bán" value="{{ old('giaban') }}" autocomplete="off" />
        </div>

        <div class="form-group">
            <input class="bg-sky-500 text-white cursor-pointer rounded py-2 px-3" type="submit" name="submit" id="submit" value="Nhập" />
        </div>
    </form>
@endsection