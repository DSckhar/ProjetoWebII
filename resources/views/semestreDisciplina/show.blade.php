@extends('admin') 
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>DISCIPLINA: {{$semestreDisciplina->nomeDisciplina}}</strong></h2>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
            </div>
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
                <div class="row justify-content-center">
                    <div class="col-4">
                        {!! csrf_field() !!}
                        <label for="nome">Semestre</label>
                        <div class="form-group">
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
                    <div class="col-4">
                        <label for="valor">Curso</label>
                        <div class="form-group">
                            <input value="{{$semestreDisciplina->nomeCurso}}" class="form-control" type="text" disabled/>
                        </div>
                    </div>
                    <div class="col-4">
                        <label for="valor">Professor</label>
                        <div class="form-group">
                            <input value="{{$semestreDisciplina->nomeProfessor}}" class="form-control" type="text" disabled/>
                        </div>
                    </div>
                </div>
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
        
    </div>
</div>
@endsection