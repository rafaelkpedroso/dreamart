@extends('public.layouts.website', ['pageSlug' => 'login'])

@section('content')

<div class="mockup" style="margin-top:120px;">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-6" style="   background-image: url(/img/bg004.png);
                                            background-repeat: no-repeat;
                                            background-position: center center;
                                            background-size: cover;
                                            height: 60vh;">
            </div>

            <div class="col-lg-4 offset-1" style="">
                <div class="login-container" style="    display:flex;
                                                        flex-direction: column;
                                                        flex-wrap: nowrap;
                                                        justify-content: center;
                                                        height:100%">

                    <form class="daform" method="post" action="{{ route('login') }}">
                        <h1>Login</h1>
                        @csrf

                            <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" autocomplete="off">
                                @include('admin.alerts.feedback', ['field' => 'email'])
                            </div>
                            <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <input type="password" placeholder="{{ __('Senha') }}" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                @include('admin.alerts.feedback', ['field' => 'password'])
                            </div>


                            <button type="submit" href="" >{{ __('Entrar') }}</button>
                            ou
                            <a href="/planos" class="">{{ __('crie sua conta') }}</a>

                            <div style="margin-top:20px">
                                <a href="{{ route('password.request') }}" class="link footer-link">{{ __('Esqueci minha senha') }}</a>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush
