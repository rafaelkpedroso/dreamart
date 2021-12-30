 @extends('admin.layouts.app', ['page' => __('Editar Taxonomia'), 'pageSlug' => 'taxonomy'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Editar Taxonomia') }}</h5>
                </div>
                <form method="post" action="/admin/taxonomy/store" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('admin.alerts.success')

                            <div class="form-group{{ $errors->has('father') ? ' has-danger' : '' }}">
                                <label>{{ __('Pai') }}</label>

                                <select name="father" class="form-control{{ $errors->has('father') ? ' is-invalid' : '' }}">
                                    <option value="" selected>Nenhum</option>
                                    @foreach($pais as $pai)
                                        <option
                                                value="{{ $pai->slug }}"
                                                >
                                            {{ $pai->name }}
                                        </option>
                                    @endforeach

                                </select>

                                @include('admin.alerts.feedback', ['field' => 'father'])
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ __('Nome') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nome') }}" required>
                                @include('admin.alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group{{ $errors->has('slug') ? ' has-danger' : '' }}">
                                <label>{{ __('Slug') }}</label>
                                <input type="slug" name="slug" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" placeholder="{{ __('Slug') }}" required>
                                @include('admin.alerts.feedback', ['field' => 'slug'])

                            </div>
                    </div>
                    <div class="card-footer">
                        <a class="cancelar" href="/admin/taxonomy" style="">Cancelar</a>
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Salvar') }}</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection
