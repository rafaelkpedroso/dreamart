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
                                <a href="/login">Entre</a> ou <a href="planos">crie sua conta</a> para assistir<br/>
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
                            <span class="orange">{{{ $data['views'] }}} visualizações</span>
                        </div>
                        <div class="col-lg-2  my-auto">


                        </div>
                        <div class="col-lg-2 my-auto">
                            <a id="sharebtn"
                               href="{{ $currenturl }}"
                               data-image="/img/videos/{{{ $data['image'] }}}"
                               data-title="{{{ $data['title'] }}}"  >

                                <span class="orange">Compartilhar</span>
                                <img src="/img/share-icon.png" />
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>


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

               if(confirm("Esta ação não pode ser revertida. Deseja prosseguir?")){

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
