@extends('layout.app', ["current" => "sorteiousuario"])

@section('body')

<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Usuário Sorteado</h5>
        
        @if(count($users) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Grupo</th>   
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->nome}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->telefone}}</td>
                    <td>{{$user->grupo_id}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
<div class="card-footer">
    <a href="/usuarios" role="button" class="btn btn-primary btn-lg btn-block">Lista de usuários</a>
</div> 
<div class="card-footer">
    <a href="/" role="button" class="btn btn-primary btn-lg btn-block">Sair</a>
</div>
    
@endsection