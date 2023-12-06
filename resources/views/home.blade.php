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
    <iframe src='https://drive.google.com/file/d/1D1C5qxGsfrM8my9ZBexpWxa-ELxwC0ON/preview'
        style="border: none;"
        sandbox="allow-scripts allow-same-origin">
    </iframe>
</div>
@endsection
