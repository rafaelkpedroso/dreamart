 @extends('admin.layouts.app', ['page' => __('Criar Depoimento'), 'pageSlug' => 'Depoimento'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Adicionar Depoimento') }}</h5>
                </div>
                <form method="post" action="/admin/testimonials/store" autocomplete="off"  enctype="multipart/form-data">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('admin.alerts.success')

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ __('Nome') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome Completo') }}" required value="">

                                @include('admin.alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group{{ $errors->has('testimonial') ? ' has-danger' : '' }}">
                                <label>{{ __('Depoimento (pt_BR)') }}</label>
                                <textarea id="testimonial" name="testimonial" class="form-control{{ $errors->has('testimonial') ? ' is-invalid' : '' }}" placeholder="Depoimento" required></textarea>

                                @include('admin.alerts.feedback', ['field' => 'testimonial'])
                            </div>

                            <div class="form-group{{ $errors->has('testimonial') ? ' has-danger' : '' }}">
                                <label>{{ __('Depoimento (en)') }}</label>
                                <textarea id="testimonial_en" name="testimonial_en" class="form-control{{ $errors->has('testimonial_en') ? ' is-invalid' : '' }}" placeholder="Testimonial" required></textarea>

                                @include('admin.alerts.feedback', ['field' => 'testimonial'])
                            </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                            <label>{{ __('Imagem') }}</label>
                            <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" placeholder="{{ __('Imagem') }}"  required value="">
                            @include('admin.alerts.feedback', ['field' => 'image'])
                        </div>


                    </div>
                    <div class="card-footer">
                        <a class="cancelar" href="/admin/testimonials" style="">Cancelar</a>
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Salvar') }}</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection

 @push('js')
     <script>
         $(document).ready(function(){

             function makeid(length) {
                 var result           = '';
                 var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                 var charactersLength = characters.length;
                 for ( var i = 0; i < length; i++ ) {
                     result += characters.charAt(Math.floor(Math.random() *
                         charactersLength));
                 }
                 return result;
             }


             $("#gerarslug").click(function(){

                 console.log(makeid(8));
                 $("#slug").val(makeid(8));
             });
         });
     </script>
 @endpush