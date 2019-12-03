@extends('admin') 
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>DISCIPLINA: {{$semestreDisciplina->nomeDisciplina}}</strong></h2>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
                <div class="row justify-content-center">
                    <div class="col-4">
                        {!! csrf_field() !!}
                        <label for="nome">Semestre</label>
                        <div class="form-group">
                            <input value="{{$semestreDisciplina->descricaoSemestre}}" class="form-control" type="text" disabled/>
                        </div>
                    </div>
                    <div class="col-4">                    
                        <label for="valor">Disciplina</label>
                        <div class="form-group">
                            <input value="{{$semestreDisciplina->nomeDisciplina}}" class="form-control" type="text" disabled/>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-4">
                        <label for="valor">Curso</label>
                        <div class="form-group">
                            <input value="{{$semestreDisciplina->nomeCurso}}" class="form-control" type="text" disabled/>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="valor">Professor</label>
                        <div class="form-group">
                            <input value="{{$semestreDisciplina->nomeProfessor}}" class="form-control" type="text" disabled/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>AULAS</strong></h2>
            <div class="block-options">
                <button type="button" class="btn-block-option" onclick="window.location.href='{{route('aula.criar', $semestreDisciplina->id)}}'">
                    <span data-feather="plus"></span>
                </button>  
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <table id="tabela" class="display table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Aula</th>
                                    <th>Data</th>
                                    <th>Quantidade</th>
                                    <th class="no-sort"></th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cont = 1;?>
                                @foreach($aulas as $aula)
                                    <tr>
                                        <td>{{$cont}}</td>
                                        <td>{{$aula->topico}}</td>
                                        <td>{{$aula->data}}</td>
                                        <td>{{$aula->quant}}</td>
                                        <td>
                                            <button type="button" class="btn badge btn-outline-success" data-toggle="modal" data-target="#modalFrequencia{{$aula->idAula}}">
                                                <span data-feather="list"></span>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn badge btn-outline-danger" onclick="window.location.href=''" >
                                                <span data-feather="trash-2"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $cont ++; ?>
                                @endforeach
                            <tbody>                            
                            <tfoot>
                                <tr>
                                    <th>Nº</th>
                                    <th>Aula</th>
                                    <th>Data</th>
                                    <th>Quantidade</th>
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
<div class="content">
    <div class="row justify-content-center">
        <div class="col-5">
            @if(session('mensagem3'))
                <div class="alert alert-danger">
                    <span>{{session('mensagem3')}}</span>
                </div>
            @endif
        </div>
    </div>
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>ALUNOS</strong></h2>
            <div class="block-options">
                <button class="btn badge btn-outline-light notas" onclick="window.location.href='{{route('nota.criar', $semestreDisciplina->id)}}'" >
                    <span>Lançar Notas</span>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <table id="tabela2" class="display table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Aluno</th>
                                    <th>Nota 1</th>
                                    <th>Nota 2</th>
                                    <th>Nota 3</th>
                                    <th>Média</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cont = 1;?>
                                @foreach($alunos as $aluno)
                                
                                    <tr>
                                        <td>{{$cont}}</td>
                                        <td>{{$aluno->nomeAluno}}</td>
                                        <td>{{$aluno->nota1}}</td>
                                        <td>{{$aluno->nota2}}</td>
                                        <td>{{$aluno->nota3}}</td>
                                        <td>{{$aluno->media}}</td>
                                        <td>
                                            <button type="button" class="btn badge btn-outline-success" data-toggle="modal" data-target="#modalNota{{$aluno->idMatriculaDisciplina}}">
                                                <span data-feather="edit"></span>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $cont ++; ?>
                                @endforeach
                            <tbody>                            
                            <tfoot>
                                <tr>
                                    <th>Nº</th>
                                    <th>Aluno</th>
                                    <th>Nota 1</th>
                                    <th>Nota 2</th>
                                    <th>Nota 3</th>
                                    <th>Média</th>
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

@foreach($aulas as $aula)
<div class="modal fade" id="modalFrequencia{{$aula->idAula}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #9ccc65 !important;">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white !important;">{{$aula->topico}}</h5>
        <button type="button" style="color: white !important;" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach($frequencias as $frequencia)
        <form method='post' action="{{route('frequencia.editado')}}">
            {{ csrf_field() }}
            @if($aula->id == $frequencia->idAula)
                <div class="form-group row justify-content-center align-items-center">
                    <div class="col-3">
                        <label for="aluno">{{$frequencia->nomeAluno}}</label>
                    </div>
                    <div class="col-3">
                        <input name="falta[]" type="number" min="0" max="{{$frequencia->maxFalta}}"  class="form-control" value="{{$frequencia->falta}}"/>
                        <input name="id[]"  class="form-control" value="{{$frequencia->id}}" hidden/>
                        <input name="idSemestreDisciplina"  class="form-control" value="{{$aula->idSemestreDisciplina}}" hidden/>
                    </div>
                </div>           
            @endif
        @endforeach
        <br/>
            <div class="form-group row justify-content-center align-items-center">
                <div class="col-6" style="text-align: center;">
                    <button type="submit" class="btn btn-outline-success">Salvar Alteração</button>
                </div>
            </div>
        </form>  
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach($alunos as $aluno)
<div class="modal fade" id="modalNota{{$aluno->idMatriculaDisciplina}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #9ccc65 !important;">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white !important;">{{$aluno->nomeAluno}}</h5>
        <button type="button" style="color: white !important;" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach($notas as $nota)
        <form method='post' action="{{route('nota.editado')}}">
            {{ csrf_field() }}
            @if($aluno->idMatriculaDisciplina == $nota->idMatriculaDisciplina)
                <div class="form-group row justify-content-center align-items-center">
                    <div class="col-3">
                        <label for="referencia">{{$nota->referencia}}</label>
                    </div>
                    <div class="col-3">
                        <input name="valor[]" type="number" min="0" max="10" step="0.01"  class="form-control" value="{{$nota->valor}}"/>
                        <input name="id[]"  class="form-control" value="{{$nota->id}}" hidden/>
                    </div>
                </div>           
            @endif
        @endforeach
        <br/>
            <div class="form-group row justify-content-center align-items-center">
                <div class="col-6" style="text-align: center;">
                    <button type="submit" class="btn btn-outline-success">Salvar Alteração</button>
                </div>
            </div>
        </form>  
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection