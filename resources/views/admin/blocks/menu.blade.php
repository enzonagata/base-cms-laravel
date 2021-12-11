<div class="sidebar-header">
    <div class="sidebar-title">
        Menu Principal
    </div>
    <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html"
        data-fire-event="sidebar-left-toggle">
        <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
    </div>
</div>

<div class="nano">
    <div class="nano-content">
        <nav id="menu" class="nav-main" role="navigation">
            <ul class="nav nav-main">
                <li class="nav-active">
                    <a class="nav-link" href="{{ route('information.index') }}">
                        <i class="fas fa-info"></i>
                        <span>Informações Gerais</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('content.form',['_type'=>'quemsomos']) }}">
                        <i class="fas fa-file-alt"></i>
                        <span>Quem Somos</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('content.form',['_type'=>'equipe']) }}">
                        <i class="fas fa-file-alt"></i>
                        <span>Equipe</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('content.index',['_type'=>'ownservices']) }}">
                        <i class="fas fa-tools"></i>
                        <span>Nossos Serviços</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('banners.index') }}">
                        <i class="far fa-images"></i>
                        <span>Banner Slide</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('content.index',['_type'=>'news']) }}">
                        <i class="fas fa-newspaper"></i>
                        <span>Notícias</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('categories.index') }}">
                        <i class="fas fa-list-ul"></i>
                        <span>Categorias</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('content.index',['_type'=>'products']) }}">
                        <i class="fas fa-box"></i>
                        <span>Classificado de Produtos</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="{{ route('content.index',['_type'=>'services']) }}">
                        <i class="fas fa-tools"></i>
                        <span>Classificado de Serviços</span>
                    </a>
                </li>


            </ul>
        </nav>
        <hr class="separator" />
    </div>
</div>