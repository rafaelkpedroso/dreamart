 @extends('admin.layouts.app', ['page' => __('Criar Usuário'), 'pageSlug' => 'Usuário'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Adicionar Usuário') }}</h5>
                </div>
                <form method="post" action="/user/store" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('admin.alerts.success')

                            <div class="form-group{{ $errors->has('father') ? ' has-danger' : '' }}">
                                <label>{{ __('Pai') }}</label>


                                @include('admin.alerts.feedback', ['field' => 'father'])
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ __('Nome') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" value="">
                                @include('admin.alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                                <label>{{ __('Slug') }}</label>
                                <input type="slug" name="slug" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" placeholder="{{ __('Slug') }}" value="">
                                @include('admin.alerts.feedback', ['field' => 'slug'])

                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Salvar') }}</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection
