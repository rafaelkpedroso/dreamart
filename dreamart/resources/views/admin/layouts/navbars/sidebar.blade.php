<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">
                <img src={{url('/img/blackbelt-48px.png')}} width="" height="" alt=""/>
            </a>
            <a href="#" class="simple-text logo-normal">DreamArt Admin</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('admin') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#content-menu" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >Conteúdo</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="content-menu">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'videos') class="active " @endif>
                            <a href="{{ route('videos.index')  }}">
                                <i class="tim-icons icon-video-66"></i>
                                <p>Vídeos</p>
                            </a>
                        </li>


                        <li @if ($pageSlug == 'li') class="active " @endif>
                            <a href="{{ route('lives.index')  }}">
                                <i class="tim-icons icon-triangle-right-17"></i>
                                <p>Lives</p>
                            </a>
                        </li>


                        <li @if ($pageSlug == 'podcasts') class="active " @endif>
                            <a href="{{ route('podcasts.index')  }}">
                                <i class="tim-icons icon-volume-98"></i>
                                <p>Podcasts</p>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>


            <li @if ($pageSlug == 'taxonomy') class="active " @endif>
                <a href="/admin/taxonomy">
                    <i class="tim-icons icon-molecule-40"></i>
                    <p>Taxonomia</p>
                </a>
            </li>

            <li @if ($pageSlug == 'users') class="active " @endif>
                <a href="/admin/users">
                    <i class="tim-icons icon-single-02"></i>
                    <p>Usuários</p>
                </a>
            </li>

            <li @if ($pageSlug == 'bills') class="active " @endif>
                <a href="{{ route('bills.index') }}">
                    <i class="tim-icons icon-coins"></i>
                    <p>Transações</p>
                </a>
            </li>
            <li @if ($pageSlug == 'testimonials') class="active " @endif>
                <a href="{{ route('testimonials.index') }}">
                    <i class="tim-icons icon-chat-33"></i>
                    <p>Depoimentos</p>
                </a>
            </li>
            <li @if ($pageSlug == 'setup') class="active " @endif>
                <a href="{{ route('setup.index') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>Configurações</p>
                </a>
            </li>
        </ul>
    </div>
</div>
