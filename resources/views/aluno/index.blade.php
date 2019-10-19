@extends('template') 
@section('content')
    <!-- <div class="content">
        <div class="block">
            <div class="block-header block-header-default">
                <h2 class="block-title"><strong>ALUNOS</strong></h2>
                <div class="block-options">

                    <a href="/aluno/cadastro" type="submit" class="badge badge-success" >
                        <img src="{{asset('media\favicons\13732.png')}}">
                    </a>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>

                </div>
            </div>
            <div class="block-content">
                <div class="contanier-fluid">
                    <div class="row justify-content-center">
                        <div class="col-10">

                            <table id="tabela" class="display table table-striped" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nº</th>
                                        <th>Nome</th>
                                        <th>Número de Matrícula</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cont = 1;?>
                                    @foreach ($alunos as $aluno)
                                    <tr>
                                        <td>{{$cont}}</td>
                                        <td>{{$aluno->nome}}</td>
                                        <td>{{$aluno->nMatricula}}</td>
                                        <td>
                                            <a href="/aluno/{{$aluno->id}}" type="submit" class="badge badge-success" >
                                                <img src="{{asset('media\favicons\eye.png')}}">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/aluno/editar/{{$aluno->id}}" type="submit" class="badge badge-success" >
                                                <img src="{{asset('media\favicons\edit.png')}}">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/aluno/delete/{{$aluno->id}}" type="submit" class="badge badge-danger" >
                                                <img src="{{asset('media\favicons\remove.png')}}">
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $cont ++;?>
                                    @endforeach
                                </tbody>
                            </table>
                            <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection