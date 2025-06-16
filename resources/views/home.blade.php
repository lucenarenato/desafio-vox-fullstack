@extends('layouts.__app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <li style="padding-left: 15px; padding-right: 30px;">
                        <a href="{{ url('dashboard/') }}" class="board-main-link-con" style="font-size: 20px; color: #393333;">
                            Task Board
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
