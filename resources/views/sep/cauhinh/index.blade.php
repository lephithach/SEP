@extends('layout')
@section('root')
    <h3 class="c-title-h3">CẤU HÌNH HỆ THỐNG</h3>

    <div class="grid grid-cols-3">
        <form action="{{ route('cauhinh.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="ipwan">IP WAN V4</label>
                <div class="flex flex-col md:flex-row md:align-bottom gap-2 h-8">
                    <input type="text" name="ipwan[0]" class="c-input w-[100%] md:w-[25%]" placeholder="127" /><span class="block">.</span>
                    <input type="text" name="ipwan[1]" class="c-input w-[100%] md:w-[25%]" placeholder="0" /><span class="block">.</span>
                    <input type="text" name="ipwan[2]" class="c-input w-[100%] md:w-[25%]" placeholder="0" /><span class="block">.</span>
                    <input type="text" name="ipwan[3]" class="c-input w-[100%] md:w-[25%]" placeholder="1" />
                </div>
                <input type="submit" value="Lưu" class="c-btn-submit">
            </div>
        </form>
    </div>
@endsection