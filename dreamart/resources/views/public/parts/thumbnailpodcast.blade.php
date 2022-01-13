<a href="/podcasts/{{$v->id}}" class="videothumb">
    <div class="videogrid-video animate__animated animate__fadeInUp"
         style="background-image:url(/img/videos/{{{ $v['image'] }}});">

        <div class="videogrid-video-overlay">

            <!--img src="/img/favoritar.png" class="favoritar"/-->


            <p>{{$v->title}}</p>
            <span>{{$v->name}}</span>

        </div>

    </div>
</a>