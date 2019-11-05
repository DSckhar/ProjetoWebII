@extends('admin') 
@section('content')
<div class="content">
        <div class="block">
            <div class="block-header block-header-default">
                <h2 class="block-title"><strong>HISTÓRICO DE MATRÍCULAS</strong></h2>
            </div>
            <div class="block-content">
                <div class="contanier-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <table id="tabela" class="display table table-striped" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Aluno</th>
                                        <th>Curso</th>
                                        <th class="no-sort"></th>
                                        <th class="no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cont = 1;?>
                                    @foreach ($matriculas as $matricula)
                                    <tr>
                                        <td>{{$cont}}</td>
                                        <td>{{$matricula->nomeAluno}}</td>
                                        <td>{{$matricula->nomeCurso}}</td>
                                        <td>
                                            <a href="" type="submit" class="badge badge-success" >
                                                <img src="{{asset('media\favicons\eye.png')}}">
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
                                        <th>Aluno</th>
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