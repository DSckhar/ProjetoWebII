@extends('admin') 
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>MATRÍCULA NO SEMESTRE</strong></h2>
            
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
                <div class="row justify-content-end">
                    <div class="col-1">
                        <button class="btn badge btn-outline-danger" onclick="window.location.href='{{route('matriculaSemestre.deletado', $matriculaSemestre->id)}}'" >
                            <span data-feather="trash-2"></span>
                        </button>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-4">
                        {!! csrf_field() !!}
                        <label for="aluno">Aluno</label>
                        <div class="form-group">
                            <input id="aluno" class="form-control" value="{{$matriculaSemestre->nomeAluno}}" type="text" name="nomeAluno"  disabled/>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="curso">Curso</label>
                        <div class="form-group">
                            <input id="aluno" class="form-control" value="{{$matriculaSemestre->nomeCurso}}" type="text" name="nomeAluno"  disabled/>
                        </div>
                    </div> 
                </div>
                <div class="row justify-content-center">
                    <div class="col-4">
                        <label for="semestre">Semestre</label>
                        <div class="form-group">
                            <input id="semestre" class="form-control" value="{{$matriculaSemestre->descricaoSemestre}}" type="text" name="descricaoSemestre"  disabled/>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="modulo">Módulo</label>
                        <div class="form-group">
                            <input id="modulo" class="form-control" value="{{$matriculaSemestre->modulo}}" type="text" name="modulo"  disabled/>
                        </div>
                    </div>
                </div>
                <br/>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>MATRÍCULAS EM DISCIPLINAS</strong></h2>
            <div class="block-options">  
                @if($matriculaSemestre->idSemestre == $ultimoSemestre->id)
                <button type="button" class="btn-block-option" onclick="window.location.href='{{route('matriculaDisciplina.criar', $matriculaSemestre->id)}}'">
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
                                    <th>Disciplina</th>
                                    <th>Média</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cont = 1;?>
                                @foreach ($matriculaDisciplinas as $matriculaDisciplina)
                                <tr>
                                    <td>{{$cont}}</td>
                                    <td>{{$matriculaDisciplina->nomeDisciplina}}</td>
                                    <td>{{$matriculaDisciplina->media}}</td>
                                    <td>
                                        <!-- <button class="btn badge btn-outline-success" onclick="window.location.href=''" >
                                            <span data-feather="eye"></span>
                                        </button> -->
                                    </td>
                                </tr>
                                <?php $cont ++;?>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nº</th>
                                    <th>Aluno</th>
                                    <th>Curso</th>
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