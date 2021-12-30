 @extends('admin.layouts.app', ['page' => __('Editar Depoimento'), 'pageSlug' => 'Depoimento'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Editar Depoimento') }}</h5>
                </div>
                <form method="post" action="/admin/testimonials/update/{{ $table->id }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('admin.alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Nome') }}</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome Completo') }}" required value="{{$table->name}}">

                            @include('admin.alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('testimonial') ? ' has-danger' : '' }}">
                            <label>{{ __('Depoimento') }}</label>
                            <textarea id="testimonial" name="testimonial" class="form-control{{ $errors->has('testimonial') ? ' is-invalid' : '' }}" placeholder="Depoimento" required>{{$table->testimonial}}</textarea>

                            @include('admin.alerts.feedback', ['field' => 'testimonial'])
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