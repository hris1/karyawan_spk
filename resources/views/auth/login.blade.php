@extends('layouts.app-welcome-login-reg')

@section('style')
<style>
    .link-register:hover {
        color: aqua !important;
    }

</style>
@endsection
@section('content')
<div class="overlay"></div>
<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="{{asset('app-welcome-login-reg/assets/mp4/bg.mp4')}}" type="video/mp4" /></video>
<div class="masthead">
    <div class="masthead-bg"></div>
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12 my-auto">
                <div class="masthead-content text-white py-5 py-md-0">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1 class="mb-3">Login</h1>
                        <input id="email" name="email" type="email"
                            class="form-control mb-2 @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" placeholder="Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </p>
                        <div class="input-group input-group-newsletter">
                            <div class="row">
                                <div class="col-md-6" style="margin-right: -10%">
                                    <div class="input-group-append" style="width: 120px">
                                        <button style="width: 100%" class="btn btn-info" id="submit-button"
                                            type="submit">Login</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group-append">
                                        <p style="color: #fff; font-size: 18px">Belum punya akun ? <a
                                                class="link-register" href="{{route('register')}}" style="color: #fff">Register disini</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('social-icons')
<div class="social-icons">
    <ul class="list-unstyled text-center mb-0">
        <li class="list-unstyled-item">
            <a href="{{url('/')}}"><i class="fas fa-home"></i></a>
        </li>
        <li class="list-unstyled-item">
            <a href="#">Kel.</a>
        </li>
        <li class="list-unstyled-item">
            <a href="#">10</a>
        </li>
    </ul>
</div>
@endsection
