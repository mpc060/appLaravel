@extends('layout.app', ["current" => "home"])

@section('body')
<div class="jumbotron bg-light border border-secundary">
    <div class="row">
        <div class="card-deck">
            <h2>Sorteio Automático de Amigo Secreto</h2>
            <h4>
                1. Utilizar o Sorteio Automático de Amigo Secreto é muito simples
                <br>
                2. Você pode escolher pela opção de criar um grupo 
                <br>
                3. Você pode cadastrar usuários com as informações necessárias
                <br>
                4. É possível realizar sorteios entre usuários e entre grupos
                <br>
                5. É necessário estar cadastrado no sistema para participar dos sorteios
            </h4>
        </div>
    </div>
</div>
    
<div class="jumbotron bg-light border border-secundary">
    <div class="row">
        <div class="card-deck">
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Cadastro de Usuário</h5>
                    <p class="card=text">
                        Esse é um cadastro de usuário. 
                        <br>
                        Não se esqueça de fornecer todos os dados necessários
                        <br>
                        para a realizaçao do cadastro.
                    </p>
                    <a href="/usuarios" class="btn btn-primary btn-lg btn-block">Cadastre seu usuário</a>
                </div>
            </div>
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Cadastro de Grupos</h5>
                    <p class="card=text">
                        Crie um grupo de usuários.
                        <br>
                        Entre com um nome para referenciar o grupo de usuários.
                    </p>
                    <a href="/grupos" class="btn btn-primary btn-lg btn-block">Cadastre seu grupo</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="jumbotron bg-light border border-secundary">
    <div class="row">
        <div class="card-deck">
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Sorteio de Usuário</h5>
                    <p class="card=text">
                        Selecione essa opção para realizar o sorteio de um usuário. 
                        <br>
                        Somente participará do sorteio usuários com cadastrado 
                        <br>
                        ativo no banco de dados do sistema.
                    </p>
                    <a href="/sorteiousuario" class="btn btn-primary btn-lg btn-block">Sorteio de Usuário</a>
                </div>
            </div>
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-title">Sorteio de Grupos</h5>
                    <p class="card=text">
                        Selecione essa opção para realizar o sorteio de um 
                        <br>
                        grupo. 
                        <br>
                        Somente participará do sorteio grupos com cadadstro 
                        <br>
                        ativo no banco de dados do sistema.
                    </p>
                    <a href="/sorteio" class="btn btn-primary btn-lg btn-block">Sorteio de Grupo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection