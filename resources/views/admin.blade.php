<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Ômega Cursos</title>

        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" href="{{asset('css/codebase.min.css')}}">
        <link rel="stylesheet" href="{{asset('DataTables/datatables.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

    </head>
    <body>
        <div id="page-container" class="sidebar-o side-scroll page-header-modern main-content-boxed enable-page-overlay">
            <nav id="sidebar">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Side Header -->
                    <div class="content-header content-header-fullrow px-15">
                        <!-- Mini Mode -->
                        <div class="content-header-section sidebar-mini-visible-b">
                            <!-- Logo -->
                            <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                            </span>
                            <!-- END Logo -->
                        </div>
                        <!-- END Mini Mode -->

                        <!-- Normal Mode -->
                        <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                            <!-- Close Sidebar, Visible only on mobile screens -->
                            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                            <!-- END Close Sidebar -->

                            <!-- Logo -->
                            <div class="content-header-item">
                                <a class="link-effect font-w700" href="/">
                                    <i class="si si-globe text-primary"></i>
                                    <span class="font-size-xl text-dual-primary-dark">Ômega</span><span class="font-size-xl text-primary">Cursos</span>
                                </a>
                            </div>
                            <!-- END Logo -->
                        </div>
                        <!-- END Normal Mode -->
                    </div>
                    <!-- END Side Header -->

                    <!-- Side Navigation -->
                    <div class="content-side content-side-full">
                        <ul class="nav-main">
                            <li>
                                <a class="nav-menu active" href="{{route('curso.index')}}">
                                    <i class="si si-badge"></i>
                                    <span class="sidebar-mini-hide">Cursos</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-submenu active" data-toggle="nav-submenu" href="#">
                                    <i class="si si-book-open"></i>
                                    <span class="sidebar-mini-hide">Disciplinas</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{route('disciplina.index')}}">Ver Todas</a>
                                    </li>
                                    <li>
                                        <a href="{{route('semestreDisciplina')}}">Ver Correntes</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-menu active" href="{{route('semestre.index')}}">
                                    <i class="si si-pin"></i>
                                    <span class="sidebar-mini-hide">Semestres</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-menu active" href="{{route('professor.index')}}">
                                    <i class="si si-eyeglass"></i>
                                    <span class="sidebar-mini-hide">Professores</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-menu active" href="{{route('aluno.index')}}">
                                    <i class="si si-people"></i>
                                    <span class="sidebar-mini-hide">Alunos</span>
                                </a>
                            </li>
                            <li>
                                <a class="nav-submenu active" data-toggle="nav-submenu" href="#">
                                    <i class="si si-grid"></i>
                                    <span class="sidebar-mini-hide">Históricos</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{route('matricula.index')}}">Matrículas</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu active" data-toggle="nav-submenu" href="#">
                                    <i class="si si-note"></i>
                                    <span class="sidebar-mini-hide"></span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="http://omegacursos.com/matricula">Histórico de Cursos</a>
                                    </li>
                                    <li>
                                        <a href="http://omegacursos.com/matdisciplina">Histórico de Disciplinas</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="nav-submenu active" data-toggle="nav-submenu" href="#">
                                    <i class="si si-book-open"></i>
                                    <span class="sidebar-mini-hide">Exemplo</span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="/disciplina">Vizualizar</a>
                                    </li>
                                    <li>
                                        <a href="/disciplina/cadastrar">Cadastrar</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- Sidebar Content -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class=" row content-header justify-content-between">
                    <div class="col-1 content-header-section">
                        <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-navicon"></i>
                        </button>
                        
                    </div>
                    <div class="col-2 align-self-end content-header-section">
                        <div class="row justify-content-between">
                            <div class="col-8">
                                <a class="btn btn-outline-dark" href=""><strong>Perfil</strong></a>
                            </div>
                            <div class="col-4">
                                <a class="si si-logout btn btn-outline-dark" alt="Sair" href="{{ route('logout') }}"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                @yield('content')
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-left">
                        ÔmegaCursos &copy; <span class="js-year-copy"></span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->
        <footer>
        <script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>        
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>        
        <script src="{{asset('js/codebase.core.min.js')}}"></script>
        <script src="{{asset('js/codebase.app.min.js')}}"></script>
        <script src="{{asset('DataTables/datatables.min.js')}}"></script>        
        <script type="text/javascript">
            $(document).ready( function () {
                $('#tabela').DataTable();
            });
            $(document).ready( function () {
                $('#tabela2').DataTable();
            });
        </script>
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace()
        </script>
        </footer>
    </body>
</html>
