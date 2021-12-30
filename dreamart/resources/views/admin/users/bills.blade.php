@extends('admin.layouts.app', ['page' => __('Cobranças'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card ">
                <div class="card-header">
                    <div class="row">

                        <!-- Title -->
                        <div class="col-4">
                            <h4 class="card-title">Usuário -> {{$username}} -> Cobranças</h4>
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
                                <th scope="col"  data-column="month" data-order="{{ ($column=='month' && $order == 'asc')?'desc':'asc' }}">
                                    Mês
                                </th>
                                <th scope="col"  data-column="value" data-order="{{ ($column=='value' && $order == 'asc')?'desc':'asc' }}">
                                    Valor
                                </th>
                                <th scope="col"  data-column="status" data-order="{{ ($column=='status' && $order == 'asc')?'desc':'asc' }}">
                                    Status
                                </th>

                            </tr>
                            </thead>

                            <!-- table body -->
                            <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{$row['month']}}</td>
                                    <td>{{$row['value']}}</td>
                                    <td>{{$row['status']}}</td>
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

            $(".page-go").click(function(){

                var url = new URL(location.href);
                url.searchParams.set('p', $(this).data('p'));
                url.toString();
                window.location.href = url.href;

            });

        });
    </script>
@endpush