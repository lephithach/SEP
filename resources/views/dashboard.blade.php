@extends('layout')
@section('root')
<div>
    <div class="grid grid-cols-3">
        <div id="dashboard">
            <h3 class="c-title-h3">DASHBOARD</h3>
        </div>

        <div id="cham-cong" class="border p-3">
            <h3 class="c-title-h3">CHẤM CÔNG</h3>

            <div class="text-center">
                @if(!empty(session()->get('status')))
                    <div class="c-alert-{{ session()->get('status') }}" role="alert">
                        <p>{{ session()->get('message') }}</p>
                    </div>
                @endif
            
                <div class="clock">
                    <p class="text-lg">Bây giờ là:</p>
                    <p class="clock-number text-sky-500 text-4xl font-semibold">00:00</p>
                </div>
            
                <div class="mt-3">
                    <form id="form-cham-cong" action="{{ route('chamcong.store') }}" method="POST">
                        @csrf
                
                        <div class="form-group">
                            <button type="submit" class="bg-sky-400 p-3 rounded-md text-white">CHẤM CÔNG</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


</div>
@endsection