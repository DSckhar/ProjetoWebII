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
            <div id="sidebar" class="col-4" height="100%">
                <div class="row ">
                    <div class="col-12">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Link dropdown
                            </a>

                            <div class="contanier-fluid dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Alguma ação</a>
                                <a class="dropdown-item" href="#">Outra ação</a>
                                <a class="dropdown-item" href="#">Alguma coisa aqui</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="main" class="col-8">
                <div id="navbar" class="row">
                
                </div>
                <div id="content" class="row">
                
                </div>
            </div>
        </div>
    </div>

    <footer>
        <script src="{{asset('js/jquery.js')}}"></script>        
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>        
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('DataTables/datatables.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready( function () {
                $('#tabela').DataTable();
            });
        </script>


    </footer>
</body>
</html>