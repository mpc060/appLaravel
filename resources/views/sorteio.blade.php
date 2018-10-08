@extends('layout.app', ["current" => "sorteio"])

@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Grupo Sorteado</h5>
        
        @if(count($gps) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome do Grupo</th>    
                </tr>
            </thead>
            <tbody>
                @foreach($gps as $gp)
                <tr>  
                    <td>{{$gp->id}}</td>
                    <td>{{$gp->nome}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
<div class="card-footer">
    <a href="/grupos" role="button" class="btn btn-primary btn-lg btn-block">Lista de Grupos</a>
</div> 
<div class="card-footer">
    <a href="/" role="button" class="btn btn-primary btn-lg btn-block">Sair</a>
</div>
    
@endsection