<a href="/video/{{$v->id}}" class="videothumb">
    <div class="videogrid-video animate__animated animate__fadeInUp"
         style="background-image:url(/img/videos/{{{ $v['image'] }}});">

        <div class="videogrid-video-overlay">

            <!--img src="/img/favoritar.png" class="favoritar"/-->


            <div class="videogrid-video-rating">
                @for($i=0; $i<round($v->rating); $i++)
                    <img src="/img/star-full.png" />
                @endfor
                @for($i=0; $i<(5-round($v->rating)); $i++)
                    <img src="/img/star-vazia.png" />
                @endfor
            </div>

            <p>{{$v->title}}</p>
            <span>{{$v->name}}</span>

        </div>

    </div>
</a>