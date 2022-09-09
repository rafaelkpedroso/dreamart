 @extends('admin.layouts.app', ['page' => __('Editar Podcast'), 'pageSlug' => 'Podcast'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Editar Podcast') }}</h5>
                </div>
                <form method="post" action="/admin/podcasts/update/{{ $table->id }}" autocomplete="off" enctype="multipart/form-data">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('admin.alerts.success')

                            <div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }}">
                                <label>{{ __('URL do Vimeo') }}</label>
                                <input type="text" name="url" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="{{ __('https://player.vimeo.com/video/12045532') }}" required value="{{ $table->url }}">

                                @include('admin.alerts.feedback', ['field' => 'url'])
                            </div>

                            <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                                <label>{{ __('Slug') }}</label>
                                <a href="#" id="gerarslug">(clique aqui para gerar automaticamente)</a>
                                <input id="slug" type="text" name="slug" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" placeholder="parte do endereço do vídeo" required value="{{ $table->slug }}">

                                @include('admin.alerts.feedback', ['field' => 'slug'])
                            </div>

                            <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                <label>{{ __('Título (pt_BR)') }}</label>
                                <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Título') }}"  required value="{{ $table->title }}">
                                @include('admin.alerts.feedback', ['field' => 'title'])
                            </div>

                            <div class="form-group{{ $errors->has('title_en') ? ' has-danger' : '' }}">
                                <label>{{ __('Título (en)') }}</label>
                                <input type="text" name="title_en" class="form-control{{ $errors->has('title_en') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}"  required  value="{{ $table->title_en }}">
                                @include('admin.alerts.feedback', ['field' => 'title_en'])
                            </div>

                            <div class="form-group{{ $errors->has('author') ? ' has-danger' : '' }}">
                                <label>{{ __('Autor') }}</label>
                                <select name="author" class="form-control{{ $errors->has('author') ? ' is-invalid' : '' }}"  required>
                                    <option value="">Nenhum</option>
                                    @foreach($authors as $author)
                                        <option
                                                value="{{ $author->id }}"
                                                {{ $table->author==$author->id?'selected':'' }} >
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @include('admin.alerts.feedback', ['field' => 'author'])
                            </div>

                            <div class="form-group{{ $errors->has('taxonomy') ? ' has-danger' : '' }}">
                                <label>{{ __('Categoria') }}</label>
                                <select name="taxonomy" class="form-control{{ $errors->has('taxonomy') ? ' is-invalid' : '' }}"  required>
                                    <option value="">Nenhum</option>
                                    @foreach($taxonomies as $cat)
                                        <option
                                                value="{{ $cat->slug }}"
                                                {{ $table->taxonomy==$cat->slug?'selected':'' }} >
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @include('admin.alerts.feedback', ['field' => 'taxonomy'])
                            </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                            <label>{{ __('Imagem') }}</label><br/>
                            <img src="/img/videos/{{ $table->image }}" style="width: 100px; height: auto" />
                            <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" placeholder="{{ __('Imagem') }}"   value="">
                            @include('admin.alerts.feedback', ['field' => 'image'])
                        </div>


                    </div>
                    <div class="card-footer">
                        <a class="cancelar" href="/admin/podcasts" style="">Cancelar</a>
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