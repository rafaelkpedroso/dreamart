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
        .comment-text{
            color: grey;
        }
        .comment-actions, .comment-actions a{
            color: #fb792c;
        }

        .comment-form{
            margin-bottom: 20px;
        }
        #text{
            width: 100%;
            height: 120px;
            color: grey;
            border: solid 2px grey;
            border-radius: 10px;
            background: none;
            padding: 10px;
        }
        #text:focus{
            outline: none;
        }
        #comentar{
            color: white;
            background-color: #fb792c;
            border:none;
            border-radius: 10px;
            padding:6px  20px;
            font-weight: bold;
        }

        .favoritar{
            position: absolute;
            top: 10px;
            right: 10px;
        }
        a{
            cursor: pointer;
        }

        .comments{
            margin-bottom: 40px;
        }

        .moderar, .moderar a, .moderar a:hover, .moderar a:active{
            color:#fb792c !important;
        }
    </style>
    <div class="mockup" style="margin-top:120px; margin-bottom: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                        @if(Auth::user())
                        <div style="padding:56.25% 0 0 0;position:relative;">
                            <iframe id="video" src="{{ $data->url }}?color=e49ae6&title=0&byline=0&portrait=0&badge=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
                        @else
                        <div>
                            <img src="/img/videos/{{{ $data['image'] }}}" style="width:100%; height: auto;" />
                            <div class="paywall">
                                <a href="/login">{{ __('Entre') }}</a> {{ __('or') }} <a href="planos">{{ __('crie sua conta') }}</a> {{ __('para assistir') }}<br/>
                            </div>
                        @endif
                    <div class="row robotto" style="margin-top:20px;">
                    <div class="row robotto" style="margin-top:20px;">
                        <div class="col-lg-6  my-auto">
                            <p class="title">
                                {{{ $data['title'] }}}
                            </p>
                            <span>{{{ $data['name'] }}}</span><br/>
                            <span class="orange">{{{ $data['date'] }}}</span>
                        </div>
                        <div class="col-lg-2 my-auto">
                            <span class="orange">{{{ $data['views'] }}} {{ __('visualizações') }}</span>
                        </div>
                        <div class="col-lg-2  my-auto">

                            @for($i=0; $i<round($data->rating); $i++)
                                @if(Auth::user())
                                    <a href="/video/rate/{{$data->id}}/{{ $i+1 }}">
                                        <img src="/img/star-full.png" />
                                    </a>
                                @else
                                    <img src="/img/star-full.png" />
                                @endif
                            @endfor
                            @for($j=0; $j<(5-round($data->rating)); $j++)
                                @if(Auth::user())
                                    <a href="/video/rate/{{$data->id}}/{{ $j+round($data->rating)+1 }}">
                                        <img src="/img/star-vazia.png" />
                                    </a>
                                @else
                                    <img src="/img/star-vazia.png" />
                                @endif
                            @endfor

                        </div>
                        <div class="col-lg-2 my-auto">
                            <a id="sharebtn"
                               href="{{ $currenturl }}"
                               data-image="/img/videos/{{{ $data['image'] }}}"
                               data-title="{{{ $data['title'] }}}"  >

                                <span class="orange">{{ __('Compartilhar') }}</span>
                                <img src="/img/share-icon.png" />

                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        @if(Auth::user())
        <div class="container-fluid bgcinza" style="margin-top: 40px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <p class="title3">{{ __('Deixe seu comentário') }}</p>

                        <div class="comment-form">
                            <form id="comentar-form">
                                <input type="hidden" name="videoid" value="{{ $data->id }}">
                                <div class="row">
                                    <div class="col-lg-1">
                                        <img src="/img/avatar-default.png">
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea name="text" id="text" required></textarea>
                                    </div>
                                    <div class="col-lg-1" style="display: flex; align-items: flex-end; justify-content: flex-start;">
                                        <input type="submit" value="{{ __('Comentar') }}" id="comentar" />
                                    </div>
                                </div>
                            </form>
                        </div>

                        @foreach($comments as $c)
                        <div class="comments" data-idcomment="{{ $c->id }}">
                            <div class="row">
                                <div class="col-lg-1">
                                    <img src="/img/avatar-default.png">
                                </div>
                                <div class="col-lg-11">

                                    <p class="comment-name">{{ $c->name }}</p>
                                    <p class="comment-text">{{ $c->text }} </p>

                                    @if(Auth::user())
                                        @if(Auth::user()->type == 'admin')

                                            <form method="post" action="/comments/update/{{ $c->id }}" class="moderarform"  data-idcomment="{{ $c->id }}" style="display: none">
                                                @csrf
                                                <input type="hidden" name="videoid" value="{ $c->id }}">
                                                <textarea name="text" required>{{ $c->text }}</textarea>
                                                <input type="submit" value="{{ __('Alterar') }}" class="moderarform-alterar" />
                                                <input type="button" value="{{ __('Deletar') }}" class="moderarform-deletar" data-url="/comments/delete/{{ $c->id }}" />
                                            </form>

                                            <a href="#" class="moderar" data-idcomment="{{ $c->id }}">  {{ __('moderar') }} </a>
                                        @endif
                                    @endif

                                    <div class="comment-actions">

                                        <div class="row">
                                            <div class="col-lg-1">
                                                <span class="">{{ $c->likes }}</span>
                                                <a class="like likebtn" href="/comments/like/{{ $c->id }}">
                                                    <img src="/img/like-icon.png" alt="Like"/>
                                                </a>
                                            </div>
                                            <div class="col-lg-1">
                                                <span>{{ $c->dislikes }}</span>
                                                <a class="dislike likebtn" href="/comments/dislike/{{ $c->id }}">
                                                    <img src="/img/dislike-icon.png" alt="Like"/>
                                                </a>
                                            </div>
                                            <div class="col-lg-9">
                                                <a id="btn-responder">
                                                    {{ __('RESPONDER') }}
                                                </a>
                                            </div>

                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="col-lg-3 text-center">
                        <p class="title3">{{ __('Para ver na sequência') }}</p>

                        <div class="videogrid">
                        @if((is_array($paravernasequencia) || is_object($paravernasequencia)))
                                @foreach($paravernasequencia as $v)

                                    @include('public.parts.thumbnail')


                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>


@endsection

@push('js')

    <script>
        function scrollToAnchor(aid){
            var aTag = $("#"+ aid );
            var position = aTag.offset().top - 200;
            $('html,body').animate({scrollTop: position},'slow');
        }

       $(document).ready(function(){

           $("#btn-responder").click(function(){

               scrollToAnchor('text');
               $("#text").focus();
           });


           $("#comentar-form").submit(function(event) {

               event.preventDefault();

               var ajaxRequest;
               var values = $(this).serialize();

               ajaxRequest = $.ajax({
                   url: "/comments/store",
                   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                   type: "post",
                   data: values
               });

               ajaxRequest.done(function (response, textStatus, jqXHR) {
                   location.reload();
               });

               ajaxRequest.fail(function () {
                   console.log('There is error while submit');
               });

           });

           $(".likebtn").click(function(event) {

               event.preventDefault();

               var objeto = ($(this).parent().find("span"));
               var objeto2 = ($(this));

               ajaxRequest = $.ajax({
                   url: $(this).attr('href'),
                   type: "get"
               });

               ajaxRequest.done(function (response, textStatus, jqXHR) {
                    objeto.html( parseInt(objeto.html()) + 1);
               });

               ajaxRequest.fail(function () {
                   console.log('There is error while submit');
               });

           });


           $(".moderar").click(function(){
               event.preventDefault();

               $(this).parent().find(".moderarform").show();
               $(this).parent().find(".comment-actions").hide();
               $(this).parent().find(".comment-text").hide();
               $(this).hide();
           });

           $(".moderarform-deletar").click(function(){

               event.preventDefault();

               if(confirm("{{ __('Esta ação não pode ser revertida. Deseja prosseguir?') }}")){

                   window.location = $(this).data('url');
               }
           })


           var iframe = document.querySelector('iframe');
           var player = new Vimeo.Player(iframe);

           player.on('play', function(){

               ajaxRequest = $.ajax({
                   url: '/video/addview/{{$data->id}}',
                   type: "get"
               });
               ajaxRequest.done(function (response, textStatus, jqXHR) {
                   console.log('view');
               });

            });

           window.fbAsyncInit = function(){
               FB.init({
                   appId: '475459263964359', status: true, cookie: true, xfbml: true });
           };
           (function(d, debug){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
               if(d.getElementById(id)) {return;}
               js = d.createElement('script'); js.id = id;
               js.async = true;js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
               ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false));
           function postToFeed(title, desc, url, image){
               var obj = {method: 'feed',link: url, picture: 'http://www.url.com/images/'+image,name: title,description: desc};
               function callback(response){}
               FB.ui(obj, callback);
           }

           $('#sharebtn').click(function(){
               elem = $(this);
               postToFeed(elem.data('title'), elem.data('desc'), elem.prop('href'), elem.data('image'));

               return false;
           });

       });
    </script>
@endpush
