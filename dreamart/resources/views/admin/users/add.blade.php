 @extends('admin.layouts.app', ['page' => __('Criar Usuário'), 'pageSlug' => 'user'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Adicionar Usuário') }}</h5>
                </div>
                <form method="post" action="/admin/users/store" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('admin.alerts.success')

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ __('Nome') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome Completo') }}" required value="">

                                @include('admin.alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ __('E-mail') }}</label>
                                <input id="email" type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="e-mail" required value="">

                                @include('admin.alerts.feedback', ['field' => 'email'])
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label>{{ __('Password') }}</label>
                                <input type="password" name="password" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" required value="">
                                @include('admin.alerts.feedback', ['field' => 'title'])
                            </div>

                            <div class="form-group{{ $errors->has('active') ? ' has-danger' : '' }}">
                                <label>{{ __('Status') }}</label>
                                <select name="active" class="form-control{{ $errors->has('active') ? ' is-invalid' : '' }}"  required>
                                    <option value="1" selected>Ativo</option>
                                    <option value="0">Bloqueado / Inativo</option>
                                </select>
                                @include('admin.alerts.feedback', ['field' => 'active'])
                            </div>

                            <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                <label>{{ __('Tipo de usuário') }}</label>
                                <select name="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}"  required>
                                    <option value="user" selected>Usuário comum</option>
                                    <option value="admin">Administrador</option>
                                </select>
                                @include('admin.alerts.feedback', ['field' => 'active'])
                            </div>



                    </div>
                    <div class="card-footer">
                        <a class="cancelar" href="/admin/users" style="">Cancelar</a>
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