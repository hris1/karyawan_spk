@extends('layouts.app-welcome-login-reg')

@section('content')
<div class="overlay"></div>
<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="{{asset('template/welcome-login-reg//assets/mp4/bg.mp4')}}" type="video/mp4" /></video>
<div class="masthead">
    <div class="masthead-bg"></div>
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12 my-auto">
                <div class="masthead-content text-white py-5 py-md-0">
                    <h1 class="mb-3">SPPK Penerimaan Karyawan</h1>
                    <p class="mb-5">
                        Membantu untuk pengambilan keputusan penerimaan karyawan menggunakan
                        <strong>Metode SAW</strong>
                    </p>
                    <div class="input-group input-group-newsletter">
                        <div class="row">
                            @if (Route::has('login'))

                            @auth
                            <div class="col-md-12">
                                <div class="input-group-append" style="width: 220px">
                                    <a href="{{ url('/home') }}" style="width: 100%" class="btn btn-info"
                                        id="submit-button">Kembali ke menu utama</a>
                                </div>
                            </div>
                            <li><a href="" class="animsition-link">Home</a></li>
                            @else
                            <div class="col-md-6" style="margin-right: -8%">
                                <div class="input-group-append" style="width: 120px">
                                    <a href="{{ route('login') }}" style="width: 100%" class="btn btn-info"
                                        id="submit-button">Login</a>
                                </div>
                            </div>

                            @if (Route::has('register'))
                            <div class="col-md-6">
                                <div class="input-group-append" style="width: 120px">
                                    <a href="{{ route('register') }}" style="width: 100%" class="btn btn-secondary"
                                        id="submit-button">Register</a>
                                </div>
                            </div>
                            @endif
                            @endauth
                        </div>
                        @endif


                    </div>


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
                <a href="#">Kel.</a>
            </li>
            <li class="list-unstyled-item">
                <a href="#">10</a>
            </li>
        </ul>
    </div>
@endsection