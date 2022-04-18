@extends('public.layouts.website', ['pageSlug' => 'dashboard'])

@section('content')

    <div class="mockup">
        <div class="container-fluid" style="margin-top: 200px;">

            <div class="row">
                <div class="col-lg-4 offset-1">
                    <div id="quemsomos-txt">
                    <h1>Quem Somos</h1>

                    <p>
                        O dream art streaming foi criado para quem ama jiu-jitsu. Atletas e fãs encontram na plataforma
                        uma experiência única e personalizável para estar mais perto do esporte, ao lado dos melhores
                        e mais criativos profissionais!   
                    </p>
                    <p>Depois de estudar a fundo o que o mercado oferece, desenvolvemos um espaço amplo e rico,
                        no qual você encontra uma grande variedade de histórias, jogos, personalidades e faixas para ver e aprender jiu-jitsu.   

                    </p>
                    <p>O projeto o dream art project nasceu do sonho de realizar sonhos em 2019. Acompanhamos a trajetória de jovens
                        atletas de jiu-jitsu que são selecionados por já ter uma carreira de muitas experiências,
                        e precisam de acompanhamento para que se tornem grandes profissionais.
                        São, hoje, mais de 40 atletas entre eles 12 meninas focados em competição e
                        capacitação simultânea (acadêmica e profissional).   
                    </p>
                    <p>Nossa equipe é formada 100% com foco em competição, sendo umas das únicas do brasil e
                        do mundo todo com esse formato.  
                        Juntos, já viajamos para mais de 10 países em prol de disputar as melhores e maiores competições do mundo. 
                        Além de oferecer moradia gratuita, alimentação, kimonos e outros materiais necessários para que
                        se desenvolva seu lado profissional e pessoal da melhor forma.  Para manter o projeto, contamos
                        com o apoio de empresas que acreditam e apostam no crescimento desse sonho junto conosco.  
                        Faça parte de um universo ainda maior do jiu-jitsu! Sua assinatura ajuda a manter ativo um hub de transformação..
                    </p>
                    </div>

                </div>
                <div class="col-lg-7">

                    <img src="/img/dreamart-novo06b.jpg" style="width: 100%;" />

                </div>
            </div>

        </div>
    </div>


@endsection

@push('js')

@endpush
