 @extends('admin.layouts.app', ['page' => __('Criar Configuração'), 'pageSlug' => 'Configuração'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Adicionar Configuração') }}</h5>
                </div>
                <form method="post" action="/admin/setups/store" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('admin.alerts.success')

                            <div class="form-group{{ $errors->has('key') ? ' has-danger' : '' }}">
                                <label>{{ __('Nome') }}</label>
                                <input type="text" name="key" class="form-control{{ $errors->has('key') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome da Config') }}" required value="">

                                @include('admin.alerts.feedback', ['field' => 'key'])
                            </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                            <label>{{ __('Tipo') }}</label>
                            <select name="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}"  required>
                                <option value="string" selected>Texto curto</option>
                                <option value="text" >Texto longo</option>
                                <option value="currency">Dinheiro</option>
                            </select>
                            @include('admin.alerts.feedback', ['field' => 'active'])
                        </div>

                            <div class="form-group{{ $errors->has('value') ? ' has-danger' : '' }}">
                                <label>{{ __('Valor') }}</label>
                                <textarea id="value" name="value" class="form-control{{ $errors->has('value') ? ' is-invalid' : '' }}" placeholder="Valor" required></textarea>

                                @include('admin.alerts.feedback', ['field' => 'setup'])
                            </div>


                    </div>
                    <div class="card-footer">
                        <a class="cancelar" href="/admin/setups" style="">Cancelar</a>
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