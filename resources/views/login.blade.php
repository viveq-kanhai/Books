@extends('public-layout',[
    'pageTitle' => 'users.index'
])

@section('content')

    <div class="bg-neutral-800 w-full h-screen">
        <x-navbar/>
        <div class="w-full flex justify-center">
            <div class='mt-28 flex items-center justify-center h-72 w-72 rounded-xl bg-white'>
                <form method="POST" action="{{ route('login') }}">
                     @csrf
                    <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    <span class="text-xs ml-4">Remember me</span>
                    <a href="#" class="text-xs ml-8">Forgot password?</a>
                    <div class='flex justify-center mt-2 mr-8 w-full'>
                        <button class='bg-cyan-500 text-white font-[Poppins] py-2 px-6 w-full rounded-3xl
                        hover:bg-green-400 duration-500' type='button'>
                            Log in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection

