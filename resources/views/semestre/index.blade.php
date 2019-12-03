@extends('admin') 
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>SEMESTRES</strong></h2>
        </div>
        <div class="contanier-fluid">
            <div class="row justify-content-between">
                <div class="col-5">
                    <div class="content">
                        <div class="contanier-fluid">
                            <h5 style="text-align: center">Novo Semestre</h5>
                            <form method='post' action="{{route('semestre.store')}}">
                                <div class="row justify-content-center">
                                    <div class="col-10">
                                        {!! csrf_field() !!}
                                        <label for="descricao">Semestre</label>
                                        <div class="form-group">
                                            <input id="descricao" class="form-control" type="text" minlength="6" pattern="[[0-9]+\.[1-2]$" placeholder="Ex.:2019.2" maxlength="6" name="descricao" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-8">
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

                <div class="col-7">
                    <div class="content">
                        <div class="contanier-fluid">
                            <div class="row justify-content-center">
                                <div class="col-10">
                                    <table id="tabela" class="display table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nº</th>
                                                <th>Semestre</th>
                                                <th class="no-sort"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $cont = 1;?>
                                            @foreach($semestres as $semestre)
                                                <tr>
                                                    <td>{{$cont}}</td>
                                                    <td>{{$semestre->descricao}}</td>
                                                    <td>
                                                        @if($semestre->status == "ativo")
                                                        <button class="btn badge btn-outline-danger" onclick="window.location.href='{{route('semestre.deletado', $semestre->id)}}'" >
                                                            <span data-feather="trash-2"></span>
                                                        </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <?php $cont ++; ?>
                                            @endforeach
                                        <tfoot>
                                            <tr>
                                                <th>Nº</th>
                                                <th>Semestre</th>
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
        </div>
    </div>
</div>
@endsection