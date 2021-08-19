@extends('public.layouts.website', ['pageSlug' => 'dashboard'])

@section('content')

    <style>
        .videothumb{
            margin:20px;
        }

        .title2{
            text-transform: uppercase;
            font-family: Roboto;
            font-weight: 900;
            font-size: 30px;
            line-height: 30px;
            white-space: normal;
        }

        .title3{
            text-transform: uppercase;
            font-family: Roboto;
            font-weight: 900;
            font-size: 18px;
            line-height: 18px;
            white-space: normal;
        }
        .bgcinza{
            background-color: #2e2e2e;
            padding: 40px;
        }
        .bgpreto{
            background-color: black;
            padding: 40px;
        }
    </style>
    <div class="mockup" style="margin-top:120px; margin-bottom: 120px;">
        <div class="container-fluid">

            <div class="row bgcinza">
                <div class="col-lg-12">
                    <div class="container">
                       <p class="title">Lives</p>
                    </div>
                </div>
            </div>

            <div class="row bgpreto">
                <div class="col-lg-12">

                    <div class="container">
                        <p class="title2 orange">Sweeps From</p>
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="title3">Butterfly</p>

                                <a href="/video/1" class="videothumb">
                                    <img src="/img/mockup-card4.png" class="animate__animated animate__fadeInUp">
                                </a>

                                <a href="/video/2" class="videothumb">
                                    <img src="/img/mockup-card1.png" class="animate__animated animate__fadeInUp">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row bgcinza">
                <div class="col-lg-12">

                    <div class="container">
                        <p class="title2 orange">Passes</p>
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="title3">Butterfly</p>

                                <a href="/video/1">
                                    <img src="/img/mockup-card3.png" class="animate__animated animate__fadeInUp">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@push('js')

@endpush
