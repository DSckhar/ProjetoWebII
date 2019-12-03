@extends('admin') 
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title">ALUNO: <strong>{{$aluno->nome}}</strong></h2>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
                <div class="row justify-content-end">
                    <div class="col-1">
                        <button class="btn badge btn-outline-danger" onclick="window.location.href='{{route('aluno.deletado', $aluno->id)}}'" >
                            <span data-feather="trash-2"></span>
                        </button>
                    </div>
                </div>
                <form method='post' action="{{route('aluno.editado')}}">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" value='{{$aluno->id}}'>
                            <label for="nome">Nome</label>
                            <div class="form-group">
                                <input id="id" class="form-control" value="{{$aluno->id}}" type="text" name="id"  hidden/>
                                <input id="nome" class="form-control" value='{{$aluno->nome}}' type="text" name="nome" maxlength="30" required/>
                            </div>
                            <label for="nascimento">Data de Nascimento</label>
                            <div class="form-group">
                                <input id="nascimento" value='{{$aluno->nascimento}}' class="form-control" type="date" name="nascimento" required/>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="email">E-Mail</label>
                            <div class="form-group">
                                <input id="email" class="form-control" value='{{$aluno->email}}' type="email" name="email" maxlength="40" required/>
                            </div>
                            <label for="nMatricula">Número de matrícula</label>
                            <div class="form-group">
                                <input id="nMatricula" class="form-control" value='{{$aluno->nMatricula}}' minlength="8" type="text" maxlength="8" pattern="[0-9]+$" name="nMatricula" disabled/>
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
                            <button type="submit" class="btn btn-outline-success">Salvar Alterações</button>
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
                <h2 class="block-title"><strong>MATRÍCULAS</strong></h2>
                <div class="block-options">
                    @if($ativa == "false")
                    <button type="button" class="btn-block-option" onclick="window.location.href='{{route('matricula.criar', $aluno->id)}}'">
                        <span data-feather="plus"></span>
                    </button>
                    @endif                   
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
                                        <th>Curso</th>
                                        <th>Valor</th>
                                        <th>Status</th>
                                        <th class="no-sort"></th>
                                        <th class="no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cont = 1;?>
                                    @foreach ($matriculas as $matricula)
                                    <tr>
                                        <td>{{$cont}}</td>
                                        <td>{{$matricula->nomeCurso}}</td>
                                        <td>{{$matricula->valor}}</td>
                                        <td>{{$matricula->status}}</td>
                                        <td>
                                            <button class="btn badge btn-outline-success" onclick="window.location.href='{{route('matricula.show', $matricula->id)}}'" >
                                                <span data-feather="eye"></span>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn badge btn-outline-danger" onclick="window.location.href='{{route('matricula.deletado', $matricula->id)}}'" >
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
                                        <th>Curso</th>
                                        <th>Valor</th>
                                        <th>Status</th>
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