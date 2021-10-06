@extends('public.layouts.website', ['pageSlug' => 'dashboard'])

@section('content')

 <div class="container-fluid">

  <section id="carousel1">
  <div class="carousel-full">

   <div class="carousel-full-container">
     <ol>

      <li style="background-image: url(/img/bg001.png)" data-slide="1">
       <div class="container">

        <p class="title animate__animated animate__fadeInUp">
         <span class="orange" > Dream Art Streaming.</span><br/>
         Viva a arte do Jiu-jitsu do seu jeito.
        </p>

        <p class="animate__animated animate__fadeInUp animate__slow">
         Mais de 300 vídeos. Atualizações mensais para uma experiência única<br/>
         com aulas, treinos, posições, perfis dos atletas e muito mais!<br/>
         Aprenda com os melhores e mais criativos lutadores.
        </p>


        <a href="/planos" class="btn btnorange animate__animated animate__fadeInUp animate__slower">
         Faça parte
        </a>

       </div>
      </li>

      <li style="background-image: url(/img/bg002.png)" data-slide="2">
       <div class="container">
        <p class="title animate__animated animate__fadeInUp">
         <span class="orange">Melhores posições.</span><br/>
        </p>

        <p class="animate__animated animate__fadeInUp animate__slow">
         Mais de 300 vídeos.
        </p>


        <a href="/planos" class="btn btnorange animate__animated animate__fadeInUp animate__slower">
         Faça parte
        </a>

       </div>
      </li>


     </ol>
   </div>

   <div class="carousel-full-nav">
    <ol>
     <li class="active" data-slide="1"></li>
     <li data-slide="2"></li>
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
   <div class="container">

    <p class="title">
     Conheça o time <br/>
     Dream Art
    </p>

    <div class="carousel-text">

     <div class="carousel-text-left">

       <img src="/img/arrow-left.png" />

     </div>
     <div class="carousel-text-right">
       <img src="/img/arrow-right.png" />
     </div>

     <div class="carousel-text-container">
      <ol>
       <li data-slide="1" class="animate__animated animate__slower animate__fadeIn">
        <p class="orange title">Treinos e Competições 1 </p>
        <p>
         Mais de XX vídeos narrados com links direto para
         as posições da biblioteca, onde você assiste da sua
         casa quantas vezes quiser.
        </p>
       </li>

       <li data-slide="2" class="animate__animated animate__slower animate__fadeIn">
        <p class="orange title">Treinos e Competições 2</p>
        </p>
         Mais de XX vídeos narrados com links direto para
         as posições da biblioteca, onde você assiste da sua
         casa quantas vezes quiser.
        </p>
       </li>

       <li data-slide="3" class="animate__animated animate__slower animate__fadeIn">
        <p class="orange title">Treinos e Competições 3</p>
        </p>
         Mais de XX vídeos narrados com links direto para
         as posições da biblioteca, onde você assiste da sua
         casa quantas vezes quiser.
        </p>
       </li>

      </ol>
     </div>

     <div class="carousel-text-nav">
      <ol>
       <li class="active" data-slide="1"></li>
       <li data-slide="2"></li>
       <li data-slide="3"></li>
      </ol>
    </div>



   </div>

   </div>
  </section>

  <section id="consultoria">

   <div class="container consultoria-bg">

    <div class="row">
     <div class="col-lg-10  offset-lg-2">
      <p class="title">Consultoria Dream Art</p>
     </div>
    </div>

    <div class="row" style="margin-top:40px;">
     <div class="col-lg-6 offset-lg-4">
      <p>
       Quem é atleta também pode contratar uma consultoria com o nosso time de profissionais.
       Ela pode incluir: 

       <ul class="ulorange">
        <li>
         Auxílio a times de competição em variados formatos: montagem do plano de treinos, definição das técnicas a serem ensinadas, vídeo-aulas,
         definição do plano de competições, análise individual dos atletas e mentoria.
        </li>
        <li>
         Seminários personalizados com os atletas que você escolher.
        </li>
        <li>
         Acompanhamento por consultoria online, incluindo preparação técnica, física, análise de vídeos de luta, programação de treino,
         mental coaching e aulas particulares online.
        </li>
        <li>
         Locação do espaço Dream Art para treino.
        </li>
      </ul>
      </p>

      <a href="/planos" class="button-secondary">
       Valores dos Pacotes
      </a>
     </div>
    </div>


   </div>

  </section>

  <section id="como-funciona">

   <div class="container">

    <div class="row">
     <div class="col-lg-12">
      <p class="title">Como Funciona</p>
      <p> Mais de 300 vídeos e cerca de 30 atualizações mensais com conteúdos diversos: vídeos de lutas, treinamentos, golpes e edições de podcast. </p>
      <p>Com um valor acessível, você configura sua própria experiência na plataforma. Viva o Jiu-Jitsu de perto em uma experiência única!</p>
     </div>
    </div>

    <div class="row" style="margin-top: 40px;">

     <div class="col-lg-4 text-right">
      <div class="como-funciona-icon-container">
       <div class="row">
        <div class="col-lg-4">
         <img src="/img/icon-plano-ouro.png" />
        </div>
        <div class="col-lg-8 m-auto">
         <p class="subtitle">Plano Ouro</p>
         <p>R$ 169,00 por ano</p>
        </div>
       </div>
      </div>
     </div>

     <div class="col-lg-4 text-right">
      <div class="como-funciona-icon-container">
       <div class="row">
        <div class="col-lg-4">
         <img src="/img/icon-plano-prata.png" />
        </div>
        <div class="col-lg-8 m-auto">
         <p class="subtitle">Plano Prata</p>
         <p>R$ 16,90 por mês</p>
        </div>
       </div>
      </div>
     </div>


     <div class="col-lg-4 text-right">
      <div class="como-funciona-icon-container">
       <div class="row">
        <div class="col-lg-4">
         <img src="/img/icon-plano-bronze.png" />
        </div>
        <div class="col-lg-8 m-auto">
         <p class="subtitle">Plano Bronze</p>
         <p>R$ 19,90 por 1 mês</p>
        </div>
       </div>
      </div>
     </div>

   </div>

  </div>

  </section>

  <section id="faq">

   <div class="container">

    <p class="title">Perguntas Frequentes</p>

    <div class="row">
     <div class="col-lg-8">

      <ul class="dreamart-accordion">

       <li>
        <p>O que é Dream Art? <i></i></p>
        <span>Lorem Ipsum</span>
       </li>
       <li>
        <p>O que é bjj? <i></i></p>
        <span>Lorem Ipsum</span>
       </li>
       <li>
        <p>Como me matriculo?<i></i></p>
        <span>Lorem Ipsum</span>
       </li>

      </ul>

     </div>
    </div>

    <hr/>

    <div class="row">

     <div class="col-lg-8" id="ppd-container">
      <p class="title text-center">PPD Casts</p>

      <div class="row" style="position: relative">
       <div class="col-lg-1 ppd-gray"></div>
       <div class="col-lg-1 m-auto text-center orange">1</div>
       <div class="col-lg-6  m-auto">
        <span>Alimentação antes da Luta</span><br>
        Action, thriller
       </div>
       <div class="col-lg-2 m-auto text-center">31.1M</div>
       <div class="col-lg-2 m-auto text-center">3 WEEK</div>

       <div class="ppd-bolinha"></div>
      </div>

      <div class="row" style="position: relative">
       <div class="col-lg-1 ppd-gray"></div>
       <div class="col-lg-1 m-auto text-center orange">2</div>
       <div class="col-lg-6  m-auto">
        <span>Alimentação antes da Luta</span><br>
        Action, thriller
       </div>
       <div class="col-lg-2 m-auto text-center">31.1M</div>
       <div class="col-lg-2 m-auto text-center">3 WEEK</div>

       <div class="ppd-bolinha"></div>
      </div>

      <div class="row" style="position: relative">
       <div class="col-lg-1 ppd-gray"></div>
       <div class="col-lg-1 m-auto text-center orange">3</div>
       <div class="col-lg-6  m-auto">
        <span>Alimentação antes da Luta</span><br>
        Action, thriller
       </div>
       <div class="col-lg-2 m-auto text-center">31.1M</div>
       <div class="col-lg-2 m-auto text-center">3 WEEK</div>

       <div class="ppd-bolinha"></div>
      </div>

      <div class="row" style="position: relative">
       <div class="col-lg-1 ppd-gray"></div>
       <div class="col-lg-1 m-auto text-center orange">4</div>
       <div class="col-lg-6  m-auto">
        <span>Alimentação antes da Luta</span><br>
        Action, thriller
       </div>
       <div class="col-lg-2 m-auto text-center">31.1M</div>
       <div class="col-lg-2 m-auto text-center">3 WEEK</div>

       <div class="ppd-bolinha"></div>
      </div>

      <div class="row" style="position: relative">
       <div class="col-lg-1 ppd-gray"></div>
       <div class="col-lg-1 m-auto text-center orange">5</div>
       <div class="col-lg-6  m-auto">
        <span>Alimentação antes da Luta</span><br>
        Action, thriller
       </div>
       <div class="col-lg-2 m-auto text-center">31.1M</div>
       <div class="col-lg-2 m-auto text-center">3 WEEK</div>

       <div class="ppd-bolinha"></div>
      </div>


     </div>

     <div class="col-lg-4">
      <p class="title text-center">Depoimentos</p>

      <div class="carousel-depoimentos">

       <div class="carousel-depoimentos-container">
        <ol>
         <li data-slide="1">
          <img src="/img/jiujiteiro.png">

          <div class="depoimento">
          <img class="depoimento-quote-left" src="/img/quote-left.png"/>
           111 lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum
           lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum
           <img class="depoimento-quote-right" src="/img/quote-right.png"/>
          </div>

         </li>
         <li data-slide="2">
          <img src="/img/jiujiteiro.png">

          <div class="depoimento">
           <img class="depoimento-quote-left" src="/img/quote-left.png"/>
           222 lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum
           lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum
           <img class="depoimento-quote-right" src="/img/quote-right.png"/>
          </div>

         </li>
         <li data-slide="3">
          <img src="/img/jiujiteiro.png">

          <div class="depoimento">
           <img class="depoimento-quote-left" src="/img/quote-left.png"/>
           333 lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum
           lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum
           <img class="depoimento-quote-right" src="/img/quote-right.png"/>
          </div>

         </li>
         <li data-slide="4">
          <img src="/img/jiujiteiro.png">

          <div class="depoimento">
           <img class="depoimento-quote-left" src="/img/quote-left.png"/>
           444 lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum
           lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum
           <img class="depoimento-quote-right" src="/img/quote-right.png"/>
          </div>

         </li>
        </ol>
       </div>

       <div class="carousel-depoimentos-nav">
        <ol>
         <li class="active" data-slide="1"></li>
         <li data-slide="2"></li>
         <li data-slide="3"></li>
         <li data-slide="4"></li>
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