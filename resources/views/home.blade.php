@extends('layouts.app')

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

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
<iframe src="https://onedrive.live.com/embed?resid=7A2FD4CA376FBE83%21130&authkey=!AEj_LBV1pZ-KWKU&em=2" width="806" height="808" frameborder="0" scrolling="no"></iframe>
</div>
@endsection
