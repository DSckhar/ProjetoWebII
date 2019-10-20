@extends('template') 
@section('content')
<div id="content" class="row">
    <div class="col-12 content">
        <div class="accordion" id="accordionMain">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h5>CADASTRAR  ALUNO</h5>
                        </div>
                        <div class="col-1">
                            <button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <img src="{{asset('media/feather/chevron-down.svg')}}" alt="">
                            </button>
                        </div>
                    </div>
                </div>

                <div id="collapseOne" class="collapse multi-collapse show" aria-labelledby="headingOne" data-parent="#accordionMain">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non alemanha 0 x 2 coreia do sul cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>  
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingTwo">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h5>ALUNOS</h5>
                        </div>
                        <div class="col-1">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <img src="{{asset('media/feather/chevron-down.svg')}}" alt="">
                            </button>
                        </div>
                    </div>
                </div>

                <div id="collapseTwo" class="collapse multi-collapse show" aria-labelledby="headingTwo" data-parent="#accordionMain">
                    <div class="card-body">
                        <table id="tabela" class="display table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Nome</th>
                                    <th class="no-sort"></th>
                                    <th class="no-sort"></th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cont = 1;?>
                                @foreach($alunos as $aluno)
                                <tr>
                                    <td>{{$cont}}</td>
                                    <td>{{$aluno->nome}}</td>
                                    <td>
                                        <button class="btn btn-outline-dark" onclick="window.location.href='/admr/aluno/{{$aluno->id}}'" >
                                            <span data-feather="eye"></span>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-dark" onclick="window.location.href='/admr/aluno/editar/{{$aluno->id}}'" >
                                            <span data-feather="edit"></span>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-danger" onclick="window.location.href='/admr/aluno/delete/{{$aluno->id}}'" >
                                            <span data-feather="trash-2"></span>
                                        </button>
                                    </td>
                                </tr>
                                <?php $cont ++; ?>
                                @endforeach
                            <tfoot>
                                <tr>
                                    <th>Nº</th>
                                    <th>Nome</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection