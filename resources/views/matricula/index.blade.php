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
                                            <button class="btn badge btn-outline-success" onclick="window.location.href='{{route('matricula.show', $matricula->id)}}'" >
                                                <span data-feather="eye"></span>
                                            </button>
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