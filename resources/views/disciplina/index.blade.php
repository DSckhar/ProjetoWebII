@extends('admin') 
@section('content')
<div class="content">
        <div class="block">
            <div class="block-header block-header-default">
                <h2 class="block-title"><strong>CADASTRAR DISCIPLINA</strong></h2>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                </div>
            </div>
            <div class="block-content">
                <div class="contanier-fluid">
                <form method='post' action="{{route('disciplina.store')}}">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            {!! csrf_field() !!}
                            <label for="nome">Nome</label>
                            <div class="form-group">
                                <input id="nome" class="form-control" type="text" name="nome" maxlength="30" required/>
                            </div>
                            <label for="valor">Preço</label>
                            <div class="form-group">
                                <input id="valor" class="form-control" type="number" name="valor" step="0.01" min="0" required/>
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="curso">Curso</label>
                            <div class="form-group">
                                <select id="curso" name="idCurso" class="form-control mdb-select md-form" required>
                                    <option value="" disabled selected>Selecione um curso</option> 
                                    @foreach ($cursos as $curso)
                                    <option value="{{$curso->id}}" >{{$curso->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="modulo">Módulo de oferta</label>
                            <div class="form-group">
                                <input id="modulo" class="form-control" type="number" min="1" max="15" name="modulo" required/>
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
                <h2 class="block-title"><strong>DISCIPLINAS</strong></h2>
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
                                        <th>Preço</th>
                                        <th>Curso</th>
                                        <th class="no-sort"></th>
                                        <th class="no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cont = 1;?>
                                    @foreach ($disciplinas as $disciplina)
                                    <tr>
                                        <td>{{$cont}}</td>
                                        <td>{{$disciplina->nome}}</td>
                                        <td>{{$disciplina->valor}}</td>
                                        <td>{{$disciplina->nomeCurso}}</td>
                                        <td>
                                            <button class="btn badge btn-outline-success" onclick="window.location.href='{{route('disciplina.show', $disciplina->id)}}'" >
                                                <span data-feather="eye"></span>
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn badge btn-outline-danger" onclick="window.location.href='{{route('disciplina.deletado', $disciplina->id)}}'" >
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
                                        <th>Preço</th>
                                        <th>Curso</th>
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