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
                                <input id="nome" class="form-control" type="text" name="nome" maxlength="60" required/>
                            </div>
                            <label for="nascimento">Data de Nascimento</label>
                            <div class="form-group">
                                <input id="nascimento" class="form-control" type="date" name="nascimento" required/>
                            </div>
                            <label for="email">E-Mail</label>
                            <div class="form-group">
                                <input id="email" class="form-control" type="email" name="email" maxlength="40" required/>
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
                                        <th>Nascimento</th>
                                        <th>E-Mail</th>
                                        <th class="no-sort"></th>
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
                                        <td>{{$aluno->nascimento}}</td>
                                        <td>{{$aluno->email}}</td>
                                        <td>
                                            <a href="" type="submit" class="badge badge-success" >
                                                <img src="{{asset('media\favicons\eye.png')}}">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="" type="submit" class="badge badge-success" >
                                                <img src="{{asset('media\favicons\edit.png')}}">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="" type="submit" class="badge badge-danger" >
                                                <img src="{{asset('media\favicons\remove.png')}}">
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $cont ++;?>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Nome</th>
                                        <th>Nascimento</th>
                                        <th>E-Mail</th>
                                        <th></th>
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