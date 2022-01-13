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
        .videogrid{
            padding: 40px;
        }
        .videogrid:nth-child(even) {background: #black}
        .videogrid:nth-child(odd) {background: #2e2e2e}
        .videogrid-video{
            width: 200px;
            height: 220px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            color: white;
            display: inline-block;
            border: solid 1px #343434;
        }
        .videogrid-video-overlay{
            background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.3));
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: flex-start;
            padding: 10px;
        }
        .favoritar{
            position: absolute;
            top: 10px;
            right: 10px;

        }
    </style>
    <div class="mockup" style="margin-top:120px; margin-bottom: 120px;">
        <div class="container-fluid">


            <div class="row bgcinza">
                <div class="col-lg-12">
                    <div class="container">
                        <p class="title">Lives</p>
                        {{--<img src="/img/mockup-ordenarpor.png"/>--}}
                    </div>
                </div>
            </div>




            @foreach($obj as $v)
                @include('public.parts.thumbnaillive')

            @endforeach

            </div>

        </div>
    </div>


@endsection

@push('js')

@endpush
