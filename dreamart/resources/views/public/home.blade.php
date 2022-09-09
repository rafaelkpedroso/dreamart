@extends('public.layouts.website', ['pageSlug' => 'dashboard'])

@section('content')



 <div class="container-fluid">

  <section id="carousel1">
  <div class="carousel-full">

   <div class="carousel-full-container">
     <ol>

      <li style="background-image: url(/img/dreamart-novo02.jpeg)" data-slide="1">
       <div class="container">

        <p class="title animate__animated animate__fadeInUp">
         <span class="orange" > {{ __('Dream Art Streaming') }}</span><br/>
         {{ __('Viva a arte do Jiu-jitsu do seu jeito') }}
        </p>

        <p class="animate__animated animate__fadeInUp animate__slow">
          {!! trans('TXT01') !!}
        </p>


        <a href="/planos" class="btn btnorange animate__animated animate__fadeInUp animate__slower btnfaca">
          {{ __('Faça parte') }}
        </a>

       </div>
      </li>

      {{--<li style="background-image: url(/img/bg002.png)" data-slide="2">--}}
       {{--<div class="container">--}}
        {{--<p class="title animate__animated animate__fadeInUp">--}}
         {{--<span class="orange">Melhores posições.</span><br/>--}}
        {{--</p>--}}

        {{--<p class="animate__animated animate__fadeInUp animate__slow">--}}
         {{--Mais de 300 vídeos.--}}
        {{--</p>--}}


        {{--<a href="/planos" class="btn btnorange animate__animated animate__fadeInUp animate__slower">--}}
         {{--Faça parte--}}
        {{--</a>--}}

       {{--</div>--}}
      {{--</li>--}}


     </ol>
   </div>

   <div class="carousel-full-nav" style="display: none">
    <ol>
     <li class="active" data-slide="1"></li>
     {{--<li data-slide="2"></li>--}}
    </ol>
   </div>

  </div>


  </section>

  <section id="video-manifest">

   <div class="container">
   <p class="title">Dream Art <br/>Manifest </p>

   </div>

   <div class="btnplay">
    <a class="call-modal" data-modal="modal1">
     <img src="/img/btn-play-video.png">
    </a>
   </div>

  </section>

  <section id="conheca-o-time">

   <div class="carousel-text-left">
    <img src="/img/arrow-left.png" />
   </div>
   <div class="carousel-text-right">
    <img src="/img/arrow-right.png" />
   </div>

   <div class="carousel-text-nav">
    <ol>
     <li class="active" data-slide="1"></li>
     <li data-slide="2"></li>
     <li data-slide="3"></li>
     <li data-slide="4"></li>
     <li data-slide="5"></li>
    </ol>
   </div>

   <div class="container">
   <p class="title">
    {{ __('Conheça o time') }}
    </p>

    <div class="carousel-text">


     <div class="carousel-text-container">
      <ol>
       <li data-slide="1" class="animate__animated animate__slower animate__fadeIn">
        <p class="orange title">{{ __('Treinos e Competições') }}</p>
        <p>{{ __('TXT02') }} </p>
       </li>

       <li data-slide="2" class="animate__animated animate__slower animate__fadeIn">
        <p class="orange title">{{ __('Técnicas de Jiu-jitsu') }}</p>
        <p>{{ __('TXT03') }} </p>
       </li>

       <li data-slide="3" class="animate__animated animate__slower animate__fadeIn">
        <p class="orange title">{{ __('Categorização') }}</p>
        <p>{{ __('TXT04') }} </p>
       </li>

       <li data-slide="4" class="animate__animated animate__slower animate__fadeIn">
        <p class="orange title">{{ __('Mentalidade de Competição') }}</p>
        <p>{{ __('TXT05') }} </p>
       </li>

       <li data-slide="5" class="animate__animated animate__slower animate__fadeIn">
        <p class="orange title">{{ __('Qualidade') }}</p>
        <p>{{ __('TXT06') }} </p>
       </li>

      </ol>
     </div>



   </div>

   </div>
  </section>

  
  <section id="faq">

   <div class="container">

    <p class="title">{{ __('Perguntas Frequentes') }}</p>

    <div class="row">
     <div class="col-lg-8">

      <ul class="dreamart-accordion">
        @foreach($faqs as $faq)
       <li>
        <p>{{$faq['title']}}<i></i></p>
        <span>{{$faq['text']}}</span>
       </li>
        @endforeach

      </ul>

     </div>
    </div>

    <hr/>

    <div class="row">

     <div class="col-lg-8" id="ppd-container">
      <p class="title text-center">Podcasts</p>

      @foreach($podcasts as $podcast)
       <a href="/podcasts/{{$podcast->id}}">
       <div class="row" style="position: relative">

       <div class="col-lg-1 ppd-gray" style="background-image: url(/img/videos/{{$podcast->image}}); background-size: cover;">

       </div>
       <div class="col-lg-1 m-auto text-center orange">1</div>
       <div class="col-lg-10  m-auto">
        <span>{{$podcast->title}}</span><br>
        BJJ
       </div>

       <div class="ppd-bolinha"></div>

      </div>
       </a>
      @endforeach



     </div>

     <div class="col-lg-4">
      <p class="title text-center">{{ __('Depoimentos') }}</p>

      <div class="carousel-depoimentos">

       <div class="carousel-depoimentos-container">
        <ol>
         @foreach($depoimentos as $depo)
         <li data-slide="{{$depo['id']}}">
          <img src="/img/testimonials/{{$depo['image']}}" class="depo-avatar">

          <div class="depoimento">
          <img class="depoimento-quote-left" src="/img/quote-left.png"/>
           {{$depo['testimonial']}}
           <img class="depoimento-quote-right" src="/img/quote-right.png"/>
          </div>

         </li>
         @endforeach

        </ol>
       </div>

       <div class="carousel-depoimentos-nav">
        <ol>
         @foreach($depoimentos as $depo)
          <li data-slide="{{$depo['id']}}"></li>
          @endforeach
        </ol>
       </div>

      </div>

     </div>

    </div>


   </div>
  </section>

 </div>


<div class="modal" id="modal1">
 <div class="modal-x">X</div>
 <div class="modal-content">

  <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/89550052?&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>

 </div>
</div>


@endsection

@push('js')

 <script>
  // accordion
  jQuery(function(){
   $(".dreamart-accordion li").click(function () {

    if($(this).hasClass('active')){
     $(this).removeClass('active');
    } else {
     $(this).addClass('active');
    }

   });
  });
 </script>

 <script>
  // carousel full
  jQuery(function(){
   $(".carousel-full-container ol li").first().addClass('active');
   $(".carousel-full-nav li").click(function(){

  //  if(!$(this).hasClass('active')){


     $(".carousel-full-nav li.active").removeClass('active');
     $(this).addClass('active');

     var slide = $(this).data('slide')
     $('.carousel-full-container li.active').removeClass('active');
     $('.carousel-full-container li[data-slide="'+slide+'"]').addClass('active');

     console.log($(".carousel-full-container li.active").offset().left);
     $('.carousel-full-container ol').animate({scrollLeft: $(".carousel-full-container li.active").offset().left}, 500);


  //  }
   });

  });
 </script>

 <script>
  // carousel text
  jQuery(function(){

   $(".carousel-text-container ol li").first().addClass('active');
   $(".carousel-text-nav li").click(function(){

    if(!$(this).hasClass('active')){

     $(".carousel-text-nav li.active").removeClass('active');
     $(this).addClass('active');

     var slide = $(this).data('slide')
     $('.carousel-text-container li.active').removeClass('active');
     $('.carousel-text-container li[data-slide="'+slide+'"]').addClass('active');
    }
   });


   $(".carousel-text-right").click(function(){
    if($('.carousel-text-nav li.active').next().length > 0){
     console.log('yes');
     $('.carousel-text-nav li.active').next().click();
    } else {
     console.log('not');
     $('.carousel-text-nav li').first().click();
    }
   });

   $(".carousel-text-left").click(function(){
    if($('.carousel-text-nav li.active').prev().length > 0){
     console.log('yes');
     $('.carousel-text-nav li.active').prev().click();
    } else {
     console.log('not');
     $('.carousel-text-nav li').last().click();
    }
   });


  });
 </script>

 <script>
  // carousel depoimentos
  jQuery(function(){
   $(".carousel-depoimentos-container ol li").first().addClass('active');
   $(".carousel-depoimentos-nav li").click(function(){

    //  if(!$(this).hasClass('active')){


    $(".carousel-depoimentos-nav li.active").removeClass('active');
    $(this).addClass('active');

    var slide = $(this).data('slide')
    $('.carousel-depoimentos-container li.active').removeClass('active');
    $('.carousel-depoimentos-container li[data-slide="'+slide+'"]').addClass('active');

    console.log($(".carousel-depoimentos-container li.active").offset().left);
    $('.carousel-depoimentos-container ol').animate({scrollLeft: $(".carousel-depoimentos-container li.active").offset().left}, 500);


    //  }
   });

  });
 </script>


 <script>
  // modal
  jQuery(function(){

   $('.call-modal').click(function(){
    var modal = $(this).data('modal');
    openModal(modal);
   });

   function openModal(modal){
    $("#"+modal).fadeIn();
    $('html, body').css({ overflow: 'hidden', });
   }

   $('.modal-x').click(function(){
    closeModal(this);
   });

   $(document).on('keyup', function(e) {
    if (e.key == "Escape") $('.modal-x').click();
   });

   function closeModal(obj){
    $(obj).parent().fadeOut();
    $('html, body').css({ overflow: 'auto', });
   }

  });
 </script>
@endpush
