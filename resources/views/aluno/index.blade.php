@extends('admin') 
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>CADASTRAR ALUNO</strong></h2>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
            <form method='post' action="{{route('aluno.store')}}">
                <div class="row justify-content-center">
                    <div class="col-4">
                        {!! csrf_field() !!}
                        <label for="nome">Nome</label>
                        <div class="form-group">
                            <input id="nome" class="form-control" type="text" name="nome" maxlength="30" required/>
                        </div>
                        <label for="nascimento">Data de Nascimento</label>
                        <div class="form-group">
                            <input id="nascimento" class="form-control" min="{{ date('Y-m-d', strtotime('-100 years')) }}" max="{{ date('Y-m-d', strtotime('-15 years')) }}" type="date" name="nascimento" required/>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="email">E-Mail</label>
                        <div class="form-group">
                            <input id="email" class="form-control" type="email" name="email" maxlength="40" required/>
                        </div>
                        <label for="nMatricula">Número de matrícula</label>
                        <div class="form-group">
                            <input id="nMatricula" class="form-control" minlength="8" type="text" maxlength="8" pattern="[0-9]+$" name="nMatricula" required/>
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
            <h2 class="block-title"><strong>ALUNOS</strong></h2>
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
                                    <th>Nº de Matrícula</th>
                                    <th>Data de Nascimento</th>
                                    <th class="no-sort"></th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cont = 1;?>
                                @foreach ($alunos as $aluno)
                                <tr>
                                    <td>{{$cont}}</td>
                                    <td>{{$aluno->nome}}</td>
                                    <td>{{$aluno->nMatricula}}</td>
                                    <td>{{$aluno->nascimento}}</td>
                                    <td>
                                        <button class="btn badge btn-outline-success" onclick="window.location.href='{{route('aluno.show', $aluno->id)}}'" >
                                            <span data-feather="eye"></span>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn badge btn-outline-danger" onclick="window.location.href='{{route('aluno.deletado', $aluno->id)}}'" >
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
                                    <th>Nº de Matrícula</th>
                                    <th>Data de Nascimento</th>
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