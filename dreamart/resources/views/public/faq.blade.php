@extends('public.layouts.website', ['pageSlug' => 'dashboard'])

@section('content')

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
