@extends('public.layouts.website', ['pageSlug' => 'dashboard'])

@section('content')

    <section id="faq">

        <div class="container">

            <p class="title">Perguntas Frequentes</p>

            <div class="row">
                <div class="col-lg-8">

                    <ul class="dreamart-accordion">

                        <li>
                            <p>Como faço para acessar meus Planos e Preços?<i></i></p>
                            <span>Lorem Ipsum</span>
                        </li>
                        <li>
                            <p>Recebi um e-mail dizendo que houve um novo acesso à minha conta. O que fazer? <i></i></p>
                            <span>Lorem Ipsum</span>
                        </li>
                        <li>
                            <p>Quero saber sobre cobranças e pagamentos<i></i></p>
                            <span>Lorem Ipsum</span>
                        </li>
                        <li>
                            <p>Minha conta está suspensa por falta de pagamento. O que fazer?<i></i></p>
                            <span>Lorem Ipsum</span>
                        </li>
                        <li>
                            <p>Posso mudar o modo de pagamento de minhas contas?<i></i></p>
                            <span>Lorem Ipsum</span>
                        </li>

                        <li>
                            <p>Tive uma cobrança indevida. Como resolver? <i></i></p>
                            <span>Lorem Ipsum</span>
                        </li>

                        <li>
                            <p>Problemas de conexão <i></i></p>
                            <span>Lorem Ipsum</span>
                        </li>

                        <li>
                            <p>Minhas páginas estão travando <i></i></p>
                            <span>Lorem Ipsum</span>
                        </li>

                        <li>
                            <p>Como faço para mudar meu login e senha?<i></i></p>
                            <span>Lorem Ipsum</span>
                        </li>

                    </ul>

                </div>
            </div>

        </div>
    </section>



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
@endpush
