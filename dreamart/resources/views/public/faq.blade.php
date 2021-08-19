@extends('public.layouts.website', ['pageSlug' => 'dashboard'])

@section('content')

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
