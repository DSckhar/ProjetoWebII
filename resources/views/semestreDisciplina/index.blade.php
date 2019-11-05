@extends('admin') 
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>OFERTAR DISCIPLINA</strong></h2>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
                <form method='post' action="{{route('semestreDisciplina.store')}}">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            {!! csrf_field() !!}
                            <label for="semestre">Semestre</label>
                            <div class="form-group">
                                <input id="idSemestre" class="form-control" type="text" name="idSemestre" value="{{$semestreAtual->id}}" hidden/>
                                <input id="semestre" class="form-control" type="text" name="semestre" value="{{$semestreAtual->descricao}}" disabled/>
                            </div>
                            <label for="idDisciplina">Disciplina</label>
                            <div class="form-group">
                                <select id="idDisciplina" name="idDisciplina" class="form-control mdb-select md-form" required>
                                    <option value="" disabled selected>Selecione uma Disciplina</option> 
                                    @foreach ($disciplinas as $disciplina)
                                    <option value="{{$disciplina->id}}" >{{$disciplina->nome}} - {{$disciplina->nomeCurso}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="idProfessor">Professor</label>
                            <div class="form-group">
                                <select id="idProfessor" name="idProfessor" class="form-control mdb-select md-form" required>
                                    <option value="" disabled selected>Selecione um Professor</option> 
                                    @foreach ($professores as $professor)
                                    <option value="{{$professor->id}}" >{{$professor->nome}} - {{$professor->email}}</option>
                                    @endforeach
                                </select>
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
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>DISCIPLINAS OFERTADAS</strong></h2>
            <div class="block-options">
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
                                    <th>Semestre</th>
                                    <th>Disciplina</th>
                                    <th>Curso</th>
                                    <th>Professor</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cont = 1;?>
                                @foreach($semestreDisciplinas as $semestreDisciplina)
                                    <tr>
                                        <td>{{$cont}}</td>
                                        <td>{{$semestreDisciplina->descricaoSemestre}}</td>
                                        <td>{{$semestreDisciplina->nomeDisciplina}}</td>
                                        <td>{{$semestreDisciplina->nomeCurso}}</td>
                                        <td>{{$semestreDisciplina->nomeProfessor}}</td>
                                        <td>
                                            <a href="" type="submit" class="badge badge-danger" >
                                                <img src="{{asset('media\favicons\remove.png')}}">
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $cont ++; ?>
                                @endforeach
                                
                            <tfoot>
                                <tr>
                                    <th>Nº</th>
                                    <th>Semestre</th>
                                    <th>Disciplina</th>
                                    <th>Curso</th>
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
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>HISTÓRICO DISCIPLINAS OFERTADAS</strong></h2>
            <div class="block-options">
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
                                    <th>Semestre</th>
                                    <th>Disciplina</th>
                                    <th>Curso</th>
                                    <th>Professor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cont = 1;?>
                                @foreach($historicos as $historico)
                                    <tr>
                                        <td>{{$cont}}</td>
                                        <td>{{$historico->descricaoSemestre}}</td>
                                        <td>{{$historico->nomeDisciplina}}</td>
                                        <td>{{$historico->nomeCurso}}</td>
                                        <td>{{$historico->nomeProfessor}}</td>
                                    </tr>
                                    <?php $cont ++; ?>
                                @endforeach
                                
                            <tfoot>
                                <tr>
                                    <th>Nº</th>
                                    <th>Semestre</th>
                                    <th>Disciplina</th>
                                    <th>Curso</th>
                                    <th>Professor</th>
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