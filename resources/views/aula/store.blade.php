@extends('admin') 
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>REGISTRAR AULA</strong></h2>
            
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
                <form method='post' action="{{route('aula.store')}}">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            {!! csrf_field() !!}
                            <label for="nome">Semestre</label>
                            <div class="form-group">
                                <input value="{{$semestreDisciplina->id}}" name="idSemestreDisciplina" type="hidden" />
                                <input value="{{$semestreDisciplina->descricaoSemestre}}" class="form-control" type="text" disabled/>
                            </div>
                        </div>
                        <div class="col-4">                    
                            <label for="valor">Disciplina</label>
                            <div class="form-group">
                                <input value="{{$semestreDisciplina->nomeDisciplina}}" class="form-control" type="text" disabled/>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <label for="valor">Tópico da Aula</label>
                            <div class="form-group">
                                <input class="form-control" type="text" maxlength="150" name="topico" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <label for="valor">Quantidade de Aulas</label>
                            <div class="form-group">
                                <input  class="form-control" min='1' max='4' type="number" name="quant" placeholder="máx. 4" required/>
                            </div>
                        </div>
                    <div class="col-4">
                            <label for="valor">Data de Ocorrência</label>
                            <div class="form-group">
                                <input  class="form-control" type="date" name="data" min="{{$minData}}" max="{{ date('Y-m-d')}}" required/>
                            </div>
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
@endsection