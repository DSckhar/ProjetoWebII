@extends('admin') 
@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h2 class="block-title"><strong>MATRICULAR ALUNO</strong></h2>
            
        </div>
        <div class="block-content">
            <div class="contanier-fluid">
            <form method='post' action="{{route('matricula.store')}}">
                <div class="row justify-content-center">
                    <div class="col-4">
                        {!! csrf_field() !!}
                        <label for="aluno">Aluno</label>
                        <div class="form-group">
                            <input id="idAluno" class="form-control" value="{{$aluno->id}}" type="text" name="idAluno"  hidden/>
                            <input id="aluno" class="form-control" value="{{$aluno->nome}}" type="text" name="nomeAluno"  disabled/>
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
                        <button type="submit" class="btn btn-outline-success">Matricular</button>
                    </div>
                </div>
                <br/>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection