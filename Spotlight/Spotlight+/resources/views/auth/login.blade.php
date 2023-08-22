@extends('layouts.login')

@section('title', 'Login')


@section('content')
<link rel="stylesheet" href="/css/login.css">
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2 text-uppercase">{{ __('Spotlight+') }}</h2>
                            <p class="text-white-50 mb-5">{{ __('Por favor coloque o seu email e sua senha') }}</p>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" :value="old('email')" required autofocus autocomplete="username">
                                    <label class="form-label" for="email">{{ __('Email') }}</label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <label class="form-label" for="password">{{ __('Senha') }}</label>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 form-check">
                                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                    <label class="form-check-label" for="remember_me">{{ __('Me lembrar') }}</label>
                                </div>

                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="{{ route('password.request') }}">{{ __('Esqueceu a senha?') }}</a></p>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">{{ __('Entrar') }}</button>

                             

                            </form>

                        </div>

                        <div>
                        <p class="mb-0">{{ __("Não possui uma conta?") }} <a href="{{ route('register') }}" class="text-white-50">{{ __('Registre-se') }}</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
