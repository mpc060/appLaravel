@extends('layout.app', ["current" => "grupos"])

@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Lista de Grupos</h5>     
        @if(count($gps) > 0)
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Grupo</th>
                    <th>Operações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gps as $gp)
                <tr>
                    <td>{{$gp->id}}</td>
                    <td>{{$gp->nome}}</td>
                    <td>
                        <a href="grupos/editar/{{$gp->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="grupos/apagar/{{$gp->id}}" class="btn btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    <div class="card-footer">
        <a href="/grupos/novo" class="btn btn-primary btn-lg btn-block" role="button">Novo Grupo</a>
    </div>
    <div class="card-footer">
        <a href="/sorteio" role="button" class="btn btn-primary btn-lg btn-block">Sorteio de Grupo</a>
    </div>  
    <div class="card-footer">
        <a href="/" role="button" class="btn btn-primary btn-lg btn-block">Sair</a>
    </div>
</div>
    
@endsection