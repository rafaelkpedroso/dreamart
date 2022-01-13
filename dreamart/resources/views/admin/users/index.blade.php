@extends('admin.layouts.app', ['page' => __('Usuários'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card ">
                <div class="card-header">
                    <div class="row">

                        <!-- Title -->
                        <div class="col-4">
                            <h4 class="card-title">Usuários</h4>
                        </div>

                        <!-- Form -->
                        <div class="col-8 text-right">
                            <a href="/admin/users/add" class="btn btn-sm btn-primary">Inserir</a>
                            <form style="    width: fit-content; display: contents;">
                                <input type="text"
                                       name="busca"
                                       placeholder="Buscar"
                                       value="{{$searchterm}}"
                                       style="background-color: #1F1E29; color: lightgray; border: solid 1px black; padding: 5px; " />

                                <img src="/img/search-icon.png" />
                            </form>
                        </div>

                    </div>
                </div>

                <!-- Table -->
                <div class="card-body">
                    <div class="">
                        <table class="table tablesorter " id="">

                            <!-- table header -->
                            <thead class=" text-primary">
                            <tr>
                                <th scope="col" class="sortable" data-column="name" data-order="{{ ($column=='name' && $order == 'asc')?'desc':'asc' }}">
                                    Nome
                                    <i class="arrow {{ ($column=='name' && $order == 'asc')?'down':'up' }}"></i>
                                </th>
                                <th scope="col" class="sortable" data-column="email" data-order="{{ ($column=='email' && $order == 'asc')?'desc':'asc' }}">
                                    E-mail
                                    <i class="arrow {{ ($column=='email' && $order == 'asc')?'down':'up' }}"></i>
                                </th>
                                <th scope="col" data-column="type" data-order="{{ ($column=='type' && $order == 'asc')?'desc':'asc' }}">
                                    Tipo
                                </th>
                                <th scope="col" data-column="active" data-order="{{ ($column=='active' && $order == 'asc')?'desc':'asc' }}">
                                    Status
                                </th>
                            </tr>
                            </thead>

                            <!-- table body -->
                            <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{$row['name']}}</td>
                                    <td>{{$row['email']}}</td>
                                    <td>{{$row['type']?$row['type']:'user'}}</td>
                                    <td>{{$row['active']?'ativo':'bloqueado'}}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="/admin/users/edit/{{$row['id']}}">Editar</a>
                                                <a class="dropdown-item" href="/admin/users/bills/{{$row['id']}}">Cobranças</a>
                                                <a class="dropdown-item" >Cobrar Novamente</a>
                                                <a class="dropdown-item deletebutton" href="/admin/users/delete/{{$row['id']}}">Excluir</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- table footer -->
                <div class="card-footer py-4">

                    @if($pages>1)
                        <nav class="d-flex justify-content-end" aria-label="...">
                            <!-- paginate -->
                            <ul class="paginator">
                                @if($currentpage>1)
                                    <li class="paginate-left page-go" data-p="{{$currentpage-1}}">
                                        <i class="arrow left"></i>
                                    </li>
                                @endif

                                @for($i=1;$i<=$pages;$i++)
                                    <li class="paginate-link page-go {{ ($i==$currentpage?'active':'') }}" data-p="{{$i}}">{{$i}}</li>
                                @endfor

                                @if($currentpage!=$pages)
                                    <li class="paginate-right page-go" data-p="{{$currentpage+1}}">
                                        <i class="arrow right"></i>
                                    </li>
                                @endif
                            </ul>

                        </nav>
                    @endif
                </div>

            </div>
        </div>

    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function(){

            $(".sortable").click(function(){

                var url = new URL(location.href);
                url.searchParams.set('column', $(this).data('column'));
                url.searchParams.set('order', $(this).data('order'));
                url.toString();
                window.location.href = url.href;

            });

            $(".page-go").click(function(){

                var url = new URL(location.href);
                url.searchParams.set('p', $(this).data('p'));
                url.toString();
                window.location.href = url.href;

            });


            $(".deletebutton").click(function(e){
                e.stopImmediatePropagation();
                e.preventDefault();

                var link =  $(this).attr('href');


                if(confirm('Confirma a exclusão deste registro?')){
                    window.location.href = link;
                }

            });

        });
    </script>
@endpush