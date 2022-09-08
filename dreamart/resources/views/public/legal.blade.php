@extends('public.layouts.website', ['pageSlug' => 'dashboard'])

@section('content')

    <section>
        <div class="container" style="margin-top: 200px; margin-bottom: 80px;">
<div class="row">
    <div class="col-lg-12">
        <h1>{{$data['title']}}</h1>
        {!! $data['text'] !!}
    </div>
</div>
        </div>
    </section>



@endsection

@push('js')

@endpush
