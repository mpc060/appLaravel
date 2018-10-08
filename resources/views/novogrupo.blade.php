@extends('layout.app', ["current" => "grupos"])

@section('body')

<div class="card border">
    <div class="card-body">
        <form action="/grupos" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeGrupo">Nome do Grupo</label>
                <input typo="text" class="form-control" name="nomeGrupo" id="nomeGrupo" placeholder="Grupo">
            </div>    
            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
            <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
        </form>
    </div>
</div>

@endsection