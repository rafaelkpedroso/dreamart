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
        .robotto{
            font-family: Roboto;
        }
    </style>
    <div class="mockup" style="margin-top:120px; margin-bottom: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div style="padding:56.25% 0 0 0;position:relative;">
                        <iframe src="https://player.vimeo.com/video/{{{ $data['url'] }}}?color=e49ae6&title=0&byline=0&portrait=0&badge=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>

                    <div class="row robotto" style="margin-top:20px;">
                        <div class="col-lg-6  my-auto">
                            <p class="title">
                                {{{ $data['title'] }}}
                            </p>
                            <span>{{{ $data['teacher'] }}}</span><br/>
                            <span class="orange">{{{ $data['date'] }}}</span>
                        </div>
                        <div class="col-lg-2 my-auto">
                            <span class="orange">{{{ $data['views'] }}} visualizações</span>
                        </div>
                        <div class="col-lg-2  my-auto">
                            Avaliações<br/>

                            <img src="/img/star-full.png" />
                            <img src="/img/star-full.png" />
                            <img src="/img/star-full.png" />
                            <img src="/img/star-full.png" />
                            <img src="/img/star-vazia.png" />

                        </div>
                        <div class="col-lg-2 my-auto">
                            <a href="#">
                                <span class="orange">Compartilhar</span>
                                <img src="/img/share-icon.png" />
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="container-fluid bgcinza" style="margin-top: 40px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <p class="title3">Deixe seu comentário</p>

                        <img src="/img/mockup-comments.png" style="width: 100%"/>
                    </div>
                    <div class="col-lg-3 text-center">
                        <p class="title3">Para ver na Sequência</p>

                        <a href="/video/1">
                        <img src="/img/mockup-card1.png" style="margin-bottom: 10px">
                        </a>
                        <a href="/video/2">
                        <img src="/img/mockup-card2.png" style="margin-bottom: 10px">
                        </a>
                        <a href="/video/3">
                        <img src="/img/mockup-card3.png" style="margin-bottom: 10px">
                        </a>
                        <a href="/video/4">
                        <img src="/img/mockup-card4.png" style="margin-bottom: 10px">
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')

@endpush
