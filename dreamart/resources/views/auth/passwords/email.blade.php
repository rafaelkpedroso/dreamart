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

                        <form class="daform" method="post" action="{{ route('password.email') }}">
                            @csrf

                            <h1>Recuperar senha</h1>
                            @include('admin.alerts.success')

                            <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                                @include('admin.alerts.feedback', ['field' => 'email'])
                            </div>


                            <button type="submit" >{{ __('Solicitar nova senha') }}</button>
                            ou
                            <a href="/login">voltar</a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush