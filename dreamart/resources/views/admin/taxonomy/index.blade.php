@extends('admin.layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List'), 'pageSlug' => 'Taxonomy' ])

@section('content')
  <style>
    .listtree li{
      display: inline-block;
      list-style: none;
      margin-right: 20px;

    }
  </style>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Taxonomia</h4>
            <p class="card-category">Lista de termos e categorias para usar na listagem de conteúdos (como vídeos, podcasts e lives)</p>


            <a href="/admin/taxonomy/add" class="btn btn-sm btn-primary">Inserir</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">

              <div class="row">
                <div class="col-lg-12">

                  @foreach ($results as $taxonomy1)
                    <h3>
                      {{$taxonomy1['name']}}
                      <a href="/admin/taxonomy/edit/{{$taxonomy1['slug']}}"><i class="tim-icons icon-pencil"></i></a>
                      <a class="deletebutton" href="/admin/taxonomy/delete/{{$taxonomy1['slug']}}"><i class="tim-icons icon-trash-simple"></i></a>
                    </h3>

                      @if (is_Array($taxonomy1['sons']) && count($taxonomy1['sons']) > 0)
                        <ul class="listtree">
                        @foreach ($taxonomy1['sons'] as $taxonomy2)
                            <li>
                              {{$taxonomy2['name']}}
                              <a href="/admin/taxonomy/edit/{{$taxonomy2['slug']}}"><i class="tim-icons icon-pencil"></i></a>
                              <a class="deletebutton" href="/admin/taxonomy/delete/{{$taxonomy2['slug']}}"><i class="tim-icons icon-trash-simple"></i></a>
                            </li>
                        @endforeach
                        </ul>
                      @endif

                  @endforeach

                </div>
              </div>
              <hr/>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('js')
  <script>
    $(document).ready(function(){

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