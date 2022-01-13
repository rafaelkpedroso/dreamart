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
    <div class="mockup" style="margin-top:120px; margin-bottom: 120px; min-height: 50vh;">
        <div class="container-fluid">


            <div class="row bgcinza">
                <div class="col-lg-12">
                    <div class="container">
                        <p class="title">Busca por "{{{$term}}}"</p>
                        <!--img src="/img/mockup-ordenarpor.png"/-->
                    </div>
                </div>
            </div>

            <div class="row bgpreto">
                <div class="col-lg-12">

                    <div class="container">
                        @foreach($obj as $v)
                            @include('public.parts.thumbnail')

                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>


@endsection

@push('js')

@endpush
