 @extends('admin.layouts.app', ['page' => __('Editar Configuração'), 'pageSlug' => 'Configuração'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Editar Configuração') }}</h5>
                </div>
                <form method="post" action="/admin/cms/update/{{ $table->id }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('admin.alerts.success')



                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>{{ __('Título (pt_BR)') }}</label>
                            <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Título') }}" required value="{{$table->title}}">

                            @include('admin.alerts.feedback', ['field' => 'title'])
                        </div>

                        <div class="form-group{{ $errors->has('text') ? ' has-danger' : '' }}">
                            <label>{{ __('Texto (pt_BR)') }}</label>
                            <textarea type="text" name="text" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" placeholder="{{ __('Texto') }}" required>
                                {{$table->text}}
                            </textarea>
                            @include('admin.alerts.feedback', ['field' => 'text'])
                        </div>




                        <div class="form-group{{ $errors->has('title_en') ? ' has-danger' : '' }}">
                            <label>{{ __('Título (en)') }}</label>
                            <input type="text" name="title_en" class="form-control{{ $errors->has('title_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Título') }}" required value="{{$table->title_en}}">

                            @include('admin.alerts.feedback', ['field' => 'title_en'])
                        </div>

                        <div class="form-group{{ $errors->has('text_en') ? ' has-danger' : '' }}">
                            <label>{{ __('Texto (en)') }}</label>
                            <textarea type="text" name="text_en" class="form-control{{ $errors->has('text_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Texto') }}" required>
                                {{$table->text_en}}
                            </textarea>
                            @include('admin.alerts.feedback', ['field' => 'text_en'])
                        </div>


                    </div>
                    <div class="card-footer">
                        <a class="cancelar" href="/admin/cms" style="">Cancelar</a>
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Salvar') }}</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection

 @push('js')
 <script src="https://cdn.tiny.cloud/1/ffrwvz84ki0ckynu6fz2aluuylqobog3l48v9xkuiey1ei6a/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
 <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
      toolbar_mode: 'floating',
    });
  </script>

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