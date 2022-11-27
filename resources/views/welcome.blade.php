@extends('layouts.app')

@section('css')

<style>
    nav {
        display: none !important;
    }

    body {
        background-color: var(--bs-light);
    }

    .row>.col-md-4:first-child {
        background-image: url('/images/mobile.png');
        background-size: cover;
        background-position: top center;
    }

    i {
        background-image: url("/images/insta.png");
        background-position: 0px -554px;
        background-size: auto;
        width: 175px;
        height: 51px;
        background-repeat: no-repeat;
        display: inline-block;
    }
</style>

@endsection

@section('content')

<div class="container-fluid py-3">
    <div class="row">
        <div class="col-md-4 offset-md-2">

        </div>
        <div class="col-md-4">
            <div class="row g-3">
                <div class="col-12">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="text-center py-3 py-md-5">
                                <i></i>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row row-cols-1 g-3">
                                    <div class="col">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Enter your email here" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="Enter your password here" required
                                            autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="col">
                                        <button type="submit" class="btn w-100 btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                    </div>

                                    @if (Route::has('password.request'))
                                    <div class="col">
                                        <div class="text-center">
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card rounded-0">
                        <div class="card-body">
                            Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Sign up</a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row align-items-center justify-content-center g-3">
                        <div class="col-12">
                            <div class="text-center">Get the app</div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('images/playstore.png') }}" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('images/appstore.png') }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection