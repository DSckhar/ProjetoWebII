@extends('admin') 
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>MATRICULAR EM DISCIPLINA</strong></h2>
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
                <form method='post' action="{{route('matriculaDisciplina.store')}}">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            {!! csrf_field() !!}
                            <label for="aluno">Aluno</label>
                            <input id="idMatriculaSemestre" type="hidden" name="idMatriculaSemestre" value="{{$matriculaSemestre->id}}" />
                            <div class="form-group">
                                <input id="aluno" class="form-control" type="text" value="{{$matriculaSemestre->nomeAluno}}" disabled/>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="curso">Curso</label>
                            <div class="form-group">
                                <input id="curso" class="form-control" type="text" value="{{$matriculaSemestre->nomeCurso}}" disabled/>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="semestre">Semestre</label>
                            <div class="form-group">
                                <input id="semestre" class="form-control" type="text" value="{{$matriculaSemestre->descricaoSemestre}}" disabled/>
                            </div>
                        </div>
                        <div class="col-6">
                        <br>
                            <h5 style="text-align: center;">DISCIPLINAS</h5>
                            <div class="form-group">
                                <div class="row justify-content-start">
                                    @if($count > 0)
                                        @foreach($semestreDisciplinas as $semestreDisciplina)
                                            @if($semestreDisciplina->validade == 'valido')
                                                <div class="col-4">
                                                    <input class="form-check-label" type="checkbox" name="check_list[]" value="{{$semestreDisciplina->id}}"> {{$semestreDisciplina->nomeDisciplina}}
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach($semestreDisciplinas as $semestreDisciplina)
                                            <div class="col-4">
                                                <input class="form-check-label" type="checkbox" name="check_list[]" value="{{$semestreDisciplina->id}}"> {{$semestreDisciplina->nomeDisciplina}}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
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
                    <br>
                        <div class="col-6" style="text-align: center;">
                            <button type="submit" class="btn btn-outline-success">Enviar</button>
                        </div>
                    </div>
                    <br/>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection