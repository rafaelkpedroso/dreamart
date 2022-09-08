@extends('public.layouts.website', ['pageSlug' => 'dashboard'])

@section('content')

    <div class="mockup">
        <div class="container-fluid" style="margin-top: 200px;">

            <div class="row">
                <div class="col-lg-4 offset-1">
                    <div id="quemsomos-txt">
                        <h1>{{$data['title']}}</h1>

                        {!! $data['text'] !!}
                        
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
