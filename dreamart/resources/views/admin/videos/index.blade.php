@extends('admin.layouts.app', ['page' => __('Vídeos'), 'pageSlug' => 'videos'])

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card ">
                <div class="card-header">
                    <div class="row">

                        <!-- Title -->
                        <div class="col-4">
                            <h4 class="card-title">Vídeos</h4>
                        </div>

                        <!-- Form -->
                        <div class="col-8 text-right">
                            <a href="/admin/videos/add" class="btn btn-sm btn-primary">Inserir</a>
                            <form style="    width: fit-content; display: contents;">
                                <input type="text"
                                       name="busca"
                                       placeholder="Buscar"
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
                                    <th scope="col" class="sortable" data-column="name" data-order="asc">
                                        Título
                                        <i class="arrow up"></i>
                                    </th>
                                </tr>
                            </thead>

                            <!-- table body -->
                            <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{$row['title']}}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="/users/edit/{{$row['id']}}">Editar</a>
                                                <a class="dropdown-item" href="/users/delete/{{$row['id']}}">Excluir</a>
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
                    <nav class="d-flex justify-content-end" aria-label="...">

                        <!-- paginate -->
                        <!--ul class="paginator">
                            <li class="paginate-left">
                                <i class="arrow left"></i>
                            </li>

                            <li class="paginate-link active">1</li>
                            <li class="paginate-link">2</li>
                            <li class="paginate-link">3</li>

                            <li class="paginate-right">
                                <i class="arrow right"></i>
                            </li>
                        </ul-->

                    </nav>
                </div>

            </div>
        </div>

    </div>





    <style>
        .paginator{}
        .paginator li{
            display: inline-block;
            list-style: none;
            padding: 2px;
            color: gray;
        }
        .paginator li.active{
            color: white;
            font-weight: bold;
        }

        .arrow {
            border: solid  white;
            border-width: 0 3px 3px 0;
            display: inline-block;
            padding: 2px;
        }


        .up {
            transform: rotate(-135deg);
            -webkit-transform: rotate(-135deg);
        }

        .down {
            transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
        }
        .right {
            transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
        }

        .left {
            transform: rotate(135deg);
            -webkit-transform: rotate(135deg);
        }

        .sortable{
            cursor: pointer;
        }
    </style>
@endsection

@push('js')
    <script>
        $(document).ready(function(){

            $(".sortable").click(function(){

                var url = new URL(location.href);
                url.searchParams.set('x', 42);
                url.toString();
                console.log(url.href);

            });
        });
    </script>
@endpush