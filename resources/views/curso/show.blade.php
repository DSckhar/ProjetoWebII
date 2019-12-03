@extends('admin') 
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title">CURSO: <strong>{{$curso->nome}}</strong></h2>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
                <div class="row justify-content-end">
                    <div class="col-1">
                        <button class="btn badge btn-outline-danger" onclick="window.location.href='{{route('curso.deletado', $curso->id)}}'" >
                            <span data-feather="trash-2"></span>
                        </button>
                    </div>
                </div>
                <form method='post' action="{{route('curso.editado')}}">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" value='{{$curso->id}}'>
                            <label for="nome">Nome</label>
                            <div class="form-group">
                                <input id="nome" style="text-transform: uppercase;"  class="form-control" value='{{$curso->nome}}' type="text" name="nome" maxlength="30" required/>
                            </div>
                            <label for="valor">Preço</label>
                            <div class="form-group">
                                <input id="valor" class="form-control" value='{{$curso->valor}}' type="number" name="valor" step="0.01" min="0" required/>
                            </div>
                            <label for="duracao">Duração (em módulos)</label>
                            <div class="form-group">
                                <input id="duracao" class="form-control" value='{{$curso->duracao}}' type="number" min="1" max="15" name="duracao" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-5">
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
                                        <th>Módulo de Ocorrência</th>
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
                                        <td>{{$disciplina->modulo}}</td>
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
                                        <th>Módulo de Ocorrência</th>
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