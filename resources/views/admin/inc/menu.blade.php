<div class="sidebar" data-color="drekod">
    <div class="logo">
        <a href="/admin/dashboard" class="simple-text logo-mini">
            {{--<img class="logo-p1" src="/admin/img/logo_p1.png"></img>--}}
            <h1 class="logo-p1-text">A</h1>
        </a>
        <a href="/admin/dashboard" class="simple-text logo-normal">
            <h1 class="logo-p2">Admanicoré</h1>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">
            <h2 class="sidebar-group-title">Analytics</h2>
            <li class="{{ isActiveRoute('admin.dashboard') }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="now-ui-icons design_app"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <h2 class="sidebar-group-title">Conteúdo</h2>
            @php
                if (
                    !empty(isActiveRoute('admin.pages.home')) ||
                    !empty(isActiveRoute('admin.pages.history')) ||
                    !empty(isActiveRoute('admin.pages.contact'))
                ) {
                    $active = 'active';
                } 
                else {
                    $active = null;
                }
            @endphp
            <li class="{{ $active }}">
                <a data-toggle="collapse" href="#menu_schedule">
                    <i class="now-ui-icons design_bullet-list-67"></i>
                    <p>
                        Páginas
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="menu_schedule">
                    <ul class="nav">
                        <li class="{{ isActiveRoute('admin.pages.home') }}">
                            <a href="{{ route('admin.pages.home') }}">
                                <span class="sidebar-mini-icon">H</span>
                                <span class="sidebar-normal">Home</span>
                            </a>
                        </li>
                        <li class="{{ isActiveRoute('admin.pages.history') }}">
                            <a href="{{ route('admin.pages.history') }}">
                                <span class="sidebar-mini-icon">H</span>
                                <span class="sidebar-normal">História</span>
                            </a>
                        </li>
                        <li class="{{ isActiveRoute('admin.pages.contact') }}">
                            <a href="{{ route('admin.pages.contact') }}">
                                <span class="sidebar-mini-icon">C</span>
                                <span class="sidebar-normal">Contato</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ isActiveRoute('admin.members') }}">
                <a href="{{ route('admin.members') }}">
                    <i class="now-ui-icons education_agenda-bookmark"></i>
                    <p>Membros</p>
                </a>
            </li>

            <li class="{{ isActiveRoute('admin.banners') }}">
                <a href="{{ route('admin.banners') }}">
                    <i class="now-ui-icons design_image"></i>
                    <p>Banners</p>
                </a>
            </li>

            <!--
            <li class="{{ isActiveRoute('admin.jobs') }}">
                <a href="{{ route('admin.jobs') }}">
                    <i class="now-ui-icons objects_spaceship"></i>
                    <p>Jobs</p>
                </a>
            </li>
            -->

            <li class="{{ isActiveRoute('admin.schedule') }}">
                <a href="{{ route('admin.schedule') }}">
                    <i class="now-ui-icons ui-1_calendar-60"></i>
                    <p>Programação</p>
                </a>
            </li>

            <li class="{{ isActiveRoute('admin.team') }}">
                <a href="{{ route('admin.team') }}">
                    <i class="now-ui-icons business_badge"></i>
                    <p>Colaboradores</p>
                </a>
            </li>

            <li class="{{ isActiveRoute('admin.departments') }}">
                <a href="{{ route('admin.departments') }}">
                    <i class="now-ui-icons travel_istanbul"></i>
                    <p>Ministérios</p>
                </a>
            </li>

            <li class="{{ isActiveRoute('admin.album_images') }}">
                <a href="{{ route('admin.album_images') }}">
                    <i class="now-ui-icons media-1_camera-compact"></i>
                    <p>Álbums</p>
                </a>
            </li>

            <li class="{{ isActiveRoute('admin.album_videos') }}">
                <a href="{{ route('admin.album_videos') }}">
                    <i class="now-ui-icons media-1_button-play"></i>
                    <p>Vídeos</p>
                </a>
            </li>

            <li class="{{ isActiveRoute('admin.blog') }}">
                <a href="{{ route('admin.blog') }}">
                    <i class="now-ui-icons education_paper"></i>
                    <p>Blog</p>
                </a>
            </li>

            <h2 class="sidebar-group-title">Configurações</h2>
            <li class="{{ isActiveRoute('admin.users.edit') }}">
                <a href="{{ route('admin.users.edit', auth()->id()) }}">
                    <i class="now-ui-icons users_circle-08"></i>
                    <p>Perfil</p>
                </a>
            </li>

            @if(auth()->user()->level == \App\Models\User::ADMIN)
                <li class="{{ isActiveRoute('admin.users') }}">
                    <a href="{{ route('admin.users') }}">
                        <i class="now-ui-icons users_single-02"></i>
                        <p>Usuários</p>
                    </a>
                </li>
            @endif

            <h2 class="sidebar-group-title">Sessão</h2>
            <li class="{{ isActiveRoute('admin.login.out') }}">
                <a id="menu_logout" href="{{ route('admin.login.out') }}">
                    <i class="now-ui-icons media-1_button-power"></i>
                    <p>Sair</p>
                </a>
            </li>
        </ul>
    </div>
</div>