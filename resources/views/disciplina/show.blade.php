@extends('admin') 
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>DISCIPLINA: {{$disciplina->nome}}</strong></h2>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
                <div class="row justify-content-end">
                    <div class="col-1">
                        <button class="btn badge btn-outline-danger" onclick="window.location.href='{{route('disciplina.deletado', $disciplina->id)}}'" >
                            <span data-feather="trash-2"></span>
                        </button>
                    </div>
                </div>
            <form method='post' action="{{route('disciplina.editado')}}">
                <div class="row justify-content-center">
                    <div class="col-4">
                        {!! csrf_field() !!}
                        <label for="nome">Nome</label>
                        <div class="form-group">
                            <input id="id" value="{{$disciplina->id}}" class="form-control" type="hidden" name="id" required/>
                            <input id="nome" value="{{$disciplina->nome}}" class="form-control" type="text" name="nome" maxlength="30" required/>
                        </div>
                        <label for="valor">Preço</label>
                        <div class="form-group">
                            <input id="valor" value="{{$disciplina->valor}}" class="form-control" type="number" name="valor" step="0.01" min="0" required/>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="curso">Curso</label>
                        <div class="form-group">
                            <input value="{{$disciplina->idCurso}}" class="form-control" type="hidden" name="idCurso" required/>
                            <input id="curso" value="{{$disciplina->nomeCurso}}" class="form-control" type="text" name="nomeCurso" disabled required/>
                        </div>
                        <label for="modulo">Módulo de oferta</label>
                        <div class="form-group">
                            <input id="modulo" value="{{$disciplina->modulo}}"  class="form-control" type="number" min="1" max="15" name="modulo" required/>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
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
            <h2 class="block-title"><strong>OCORRÊNCIAS</strong></h2>
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
                                    <th>Semestre</th>
                                    <th>Professor</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cont = 1;?>
                                @foreach ($semestreDisciplinas as $semestreDisciplina)
                                <tr>
                                    <td>{{$cont}}</td>
                                    <td>{{$semestreDisciplina->descricaoSemestre}}</td>
                                    <td>{{$semestreDisciplina->nomeProfessor}}</td>
                                    <td>
                                        <button class="btn badge btn-outline-success" onclick="window.location.href='{{route('semestreDisciplina.show', $semestreDisciplina->id)}}'" >
                                            <span data-feather="eye"></span>
                                        </button>
                                    </td>
                                </tr>
                                <?php $cont ++;?>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nº</th>
                                    <th>Semestre</th>
                                    <th>Professor</th>
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