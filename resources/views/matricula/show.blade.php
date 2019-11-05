@extends('admin') 
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>MATRICULA DO ALUNO</strong></h2>
            
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
                <div class="row justify-content-center">
                    <div class="col-4">
                        {!! csrf_field() !!}
                        <label for="aluno">Aluno</label>
                        <div class="form-group">
                            <input id="aluno" class="form-control" value="{{$matricula->nomeAluno}}" type="text" name="nomeAluno"  disabled/>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="curso">Curso</label>
                        <div class="form-group">
                            <input id="aluno" class="form-control" value="{{$matricula->nomeCurso}}" type="text" name="nomeAluno"  disabled/>
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
            <h2 class="block-title"><strong>MATRÍCULAS EM SEMESTRES</strong></h2>
            <div class="block-options">
                @if($valido == 'true' )
                <button type="button" class="btn-block-option" onclick="window.location.href='{{route('matriculaSemestre.criar', $matricula->id)}}'">
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
                                    <th>Semestre</th>
                                    <th>Módulo</th>
                                    <th class="no-sort"></th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cont = 1;?>
                                @foreach ($matriculaSemestres as $matriculaSemestre)
                                <tr>
                                    <td>{{$cont}}</td>
                                    <td>{{$matriculaSemestre->descricaoSemestre}}</td>
                                    <td>{{$matriculaSemestre->modulo}}</td>
                                    <td>
                                        <button class="btn badge btn-outline-success" onclick="window.location.href=''" >
                                            <span data-feather="eye"></span>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn badge btn-outline-danger" onclick="window.location.href=''" >
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
                                    <th>Semestre</th>
                                    <th>Módulo</th>
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