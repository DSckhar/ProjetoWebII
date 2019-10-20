<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ômega Cursos</title>

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">        
    <link rel="stylesheet" href="{{asset('DataTables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>
    <div class="contanier-fluid">
        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div id="sidebar" class="col-12">
                        <h4><span style="color: #28a745;" data-feather="award"></span>ÔmegaCursos</h4>
                        <div class="accordion" id="accordionSidebar">
                             <div class="card">
                                <button class="btn btn-outline-success" type="button" data-toggle="collapse" data-target="#aluno" aria-expanded="true" aria-controls="collapseOne">
                                    <span data-feather="users"></span> Aluno
                                </button>
                                <div id="aluno" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                                    <div class="bg-light border-right" id="sidebar-wrapper">
                                        <div class="list-group list-group-flush">
                                            <a href="/aluno" class="list-group-item list-group-item-action bg-light">Visualizar</a>
                                            <a href="/aluno/cadastrar" class="list-group-item list-group-item-action bg-light">Cadastrar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                            <button class="btn" type="button" data-toggle="collapse" data-target="#" aria-expanded="true" aria-controls="collapseOne">
                                    <span data-feather=""></span> 
                                </button>
                                <div id="" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                                    <div class="bg-light border-right" id="sidebar-wrapper" >
                                        <div class="list-group list-group-flush">
                                            <a href="/" class="list-group-item list-group-item-action bg-light">Visualizar</a>
                                            <a href="//cadastrar" class="list-group-item list-group-item-action bg-light">Cadastrar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                            <button class="btn" type="button" data-toggle="collapse" data-target="#" aria-expanded="true" aria-controls="collapseOne">
                                    <span data-feather=""></span> 
                                </button>
                                <div id="" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                                    <div class="bg-light border-right" id="sidebar-wrapper" >
                                        <div class="list-group list-group-flush">
                                            <a href="/aluno" class="list-group-item list-group-item-action bg-light">Visualizar</a>
                                            <a href="/aluno/cadastrar" class="list-group-item list-group-item-action bg-light">Cadastrar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-9">
                <div id="navbar" class="row justify-content-end">
                    <div class="col-6 col-md-3">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="btn btn-success" href="/usuario/perfil/"><strong>Nome usuário</strong></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/sair">Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>

                @yield('content')
            </div>
        </div>
    </div>

    <footer>
        <script src="{{asset('js/jquery.js')}}"></script>        
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>        
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('DataTables/datatables.min.js')}}"></script>
        <script src="https://unpkg.com/feather-icons"></script>
        <script type="text/javascript">
            $(document).ready( function () {
                $('#tabela').DataTable();
            });
        </script>
        <script type="text/javascript">
            feather.replace()
        </script>

    </footer>
</body>
</html>