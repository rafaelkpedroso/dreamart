@extends('public.layouts.website', ['pageSlug' => 'dashboard'])

@section('content')

    <div class="mockup">
        <div class="container-fluid" style="margin-top: 200px;">

            <div class="row">
                <div class="col-lg-4 offset-1">
                    <h1>Quem Somos</h1>

                    <p>O Dream Art Streaming foi criado para quem ama Jiu-Jitsu. Atletas e fãs encontram na plataforma uma experiência única e personalizável para estar mais perto do esporte, ao lado dos melhores e mais criativos profissionais!</p>

                    <p>Depois de estudar a fundo o que o mercado oferece, desenvolvemos um espaço amplo e rico, no qual você encontra uma grande variedade de histórias, jogos, personalidades e faixas para ver e aprender Jiu-Jitsu.</p>

                    <h3>O Projeto</h3>
                    <p>O Dream Art Project nasceu do sonho de realizar sonhos. Acompanhamos a trajetória de jovens atletas de Jiu-Jitsu que são selecionados por já ter uma carreira de muitas experiências, e precisam de acompanhamento para que se tornem grandes profissionais. São, hoje, 30 atletas focados em competição e capacitação simultânea (acadêmica e profissional).</p>

                    <p>Faça parte de um universo ainda maior do Jiu-Jitsu! Sua assinatura ajuda a manter ativo um hub de transformação.</p>


                </div>
                <div class="col-lg-7">

                    <img src="/img/quemsomos-bg.png" style="width: 100%; height: auto" />

                </div>
            </div>

        </div>
    </div>


@endsection

@push('js')

@endpush
