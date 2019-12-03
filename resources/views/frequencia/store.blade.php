@extends('admin') 
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>FREQUÊNCIA NA AULA</strong></h2>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
                <div class="row justify-content-center">
                    <div class="col-8">
                        <label for="valor">Tópico da Aula</label>
                        <div class="form-group">
                            <input class="form-control" value="{{$aula->topico}}" disabled/>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-4">                    
                        <label for="valor">Disciplina</label>
                        <div class="form-group">
                            <input value="{{$aula->nomeDisciplina}}" class="form-control" disabled/>
                        </div>
                    </div>
                    <div class="col-2">
                        <label for="valor">Quantidade de Aulas</label>
                        <div class="form-group">
                            <input  class="form-control" value="{{$aula->quant}}" disabled/>
                        </div>
                    </div>
                <div class="col-2">
                        <label for="valor">Data de Ocorrência</label>
                        <div class="form-group">
                            <input  class="form-control" value="{{$aula->data}}" disabled/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
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
                    <div class="col-8">
                        <form method='post' action="{{route('frequencia.store')}}">
                            <input class="form-control" name="idAula" value="{{$aula->id}}" hidden/>
                            {!! csrf_field() !!}
                            <table class="display table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Aluno</th>
                                        <th>Faltas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cont = 1;?>
                                    @foreach($alunos as $aluno)
                                    <tr>
                                        <td style="width:10%">{{$cont}}</td>
                                        <td style="width:60%">                                            
                                            <input class="form-control" name="idMatriculaDisciplina[]" value="{{$aluno->idMatriculaDisciplina}}" hidden/>
                                            {{$aluno->nomeAluno}}
                                        </td>
                                        <td  style="width:20%">
                                            <input class="form-control" type="number" min="0" max="{{$aula->quant}}" value="0" name="faltas[]" required/>
                                        </td>
                                    </tr>
                                </div>
                                <?php $cont ++; ?>
                                @endforeach
                                <tbody>                            
                                <tfoot>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Aluno</th>
                                        <th>Faltas</th>
                                    </tr>
                                </tfoot>
                            </table>
                                <div class="row justify-content-center">
                                    <div class="col-2" style="text-align: center;">
                                        <button type="submit" class="btn btn-outline-success">Enviar</button>
                                    </div>
                                </div>
                            <br/>
                        </form>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection