@extends('admin') 
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>CADASTRAR PROFESSOR</strong></h2>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
                <form method='post' action="{{route('professor.store')}}">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            {!! csrf_field() !!}
                            <label for="nome">Nome</label>
                            <div class="form-group">
                                <input id="nome" class="form-control" type="text" name="nome" maxlength="30" required/>
                            </div>
                            <label for="email">E-Mail</label>
                            <div class="form-group">
                                <input id="email" class="form-control" type="email" name="email" maxlength="40" required/>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="titulacao">Titulação</label>
                            <div class="form-group">
                                <input id="titulacao" class="form-control" type="text" name="titulacao" maxlength="30" required/>
                            </div>
                            <label for="salario">Salário</label>
                            <div class="form-group">
                                <input id="salario" class="form-control" type="number" name="salario" step="0.01" min="0" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-4">
                            @if(session('mensagem'))
                                <div class="alert alert-danger">
                                    <span>{{session('mensagem')}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-2" style="text-align: center;">
                            <button type="submit" class="btn btn-outline-success">Enviar</button>
                        </div>
                    </div>
                    <br/>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>PROFESSORES</strong></h2>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <table id="tabela" class="display table table-striped" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Nome</th>
                                    <th>Titulação</th>
                                    <th class="no-sort"></th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cont = 1;?>
                                @foreach ($professores as $professor)
                                <tr>
                                    <td>{{$cont}}</td>
                                    <td>{{$professor->nome}}</td>
                                    <td>{{$professor->titulacao}}</td>
                                    <td>
                                        <button class="btn badge btn-outline-success" onclick="window.location.href='{{route('professor.show', $professor->id)}}'" >
                                            <span data-feather="eye"></span>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn badge btn-outline-danger" onclick="window.location.href='{{route('professor.deletado', $professor->id)}}'" >
                                            <span data-feather="trash-2"></span>
                                        </button>
                                    </td>
                                </tr>
                                <?php $cont ++;?>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nº</th>
                                    <th>Nome</th>
                                    <th>Titulação</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection