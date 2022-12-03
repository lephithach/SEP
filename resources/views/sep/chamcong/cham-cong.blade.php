@extends('layout')
@section('root')
<div>
    <h3 class="c-title-h3">CHẤM CÔNG</h3>

    <div class="grid grid-cols-3">
        <div class="">

            @if(!empty(session()->get('status')))
                <div class="c-alert-{{ session()->get('status') }}" role="alert">
                    <p>{{ session()->get('message') }}</p>
                </div>
            @endif
        
            <div class="clock">
                <p class="text-lg">Bây giờ là: <span class="clock-number text-sky-500">00:00</span></p>
            </div>
        
            <div class="mt-3">
                <form id="form-cham-cong" action="{{ route('chamcong.store') }}" method="POST">
                    @csrf
            
                    <div class="form-group">
                        <button type="submit" class="bg-sky-400 p-3 rounded-sm text-white">CHẤM CÔNG</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


</div>
@endsection