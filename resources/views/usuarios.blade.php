@extends('layout.app', ["current" => "usuarios"])

@section('body')
    
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Lista de Usuários</h5>
  
        <table class="table table-ordered table-hover" id="tabelaUsuarios">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Grupo</th>
                    <th>Operações</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        
    </div>
    <div class="card-footer">
        <button class="btn btn-primary btn-lg btn-block" role="button" onClick="novoUsuario()">Novo Usuário</a>
    </div>
    <div class="card-footer">
        <a href="/sorteiousuario" role="button" class="btn btn-primary btn-lg btn-block">Sorteio de Usuário</a>
    </div>
    <div class="card-footer">
        <a href="/" role="button" class="btn btn-primary btn-lg btn-block">Sair</a>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlgUsuarios">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="formUsuario">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Usuário</h5>
                </div>
                <div class="modal-body">               
                    <input type="hidden" id="id" class="form-control">
                    <div class="form-group">
                        <label for="nomeUsuario" class="control-label">Nome do Usuário</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nomeUsuario" placeholder="Nome do Usuário">         
                        </div>
                    </div>     
                    <div class="form-group">
                        <label for="emailUsuario" class="control-label">Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="emailUsuario" placeholder="Email do Usuário">     
                        </div>
                    </div>                
                    <div class="form-group">
                        <label for="telefoneUsuario" class="control-label">Telefone</label>
                        <div class="input-group">
                            <input type="tel" class="form-control" id="telefoneUsuario" placeholder="Telefone do Usuário">         
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label for="nomeUsuario" class="control-label">Nome do Grupo</label>
                        <div class="input-group">
                            <select class="form-control" id="grupoUsuario">                            
                            </select>
                        </div>
                    </div>  
                </div> 
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-secondary" data-dismiss="modal" >Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('javascript')

<script type="text/javascript">
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
        
    });
    
    function novoUsuario(){
        $('#id').val('');
        $('#nomeUsuario').val('');
        $('#emailUsuario').val('');
        $('#telefoneUsuario').val('');
        $('#dlgUsuarios').modal('show');
    }
    
    function carregarGrupos(){
        $.getJSON('/api/grupos', function(data){ 
            for(i=0;i<data.length;i++){
                opcao = '<option value ="' + data[i].id + '">' + 
                    data[i].nome + '</option>';
                $('#grupoUsuario').append(opcao);
            }
        });
    }
    
    function montarLinha(p) {
        var linha = "<tr>" +
            "<td>" + p.id + "</td>" +
            "<td>" + p.nome + "</td>" +
            "<td>" + p.email + "</td>" +
            "<td>" + p.telefone + "</td>" +
            "<td>" + p.grupo_id + "</td>" +
            "<td>" +
                '<button class="btn btn-sm btn-primary" onclick="editar(' + p.id + ')"> Editar </button> ' +
                '<button class="btn btn-sm btn-danger" onclick="remover(' + p.id + ')"> Apagar </button> ' +
            "</td>" +    
            "</tr>";
        return linha;
    }
    
    function editar(id){
        $.getJSON('/api/usuarios/'+id, function(data){ 
            console.log(data);
                $('#id').val(data.id);
                $('#nomeUsuario').val(data.nome);
                $('#emailUsuario').val(data.email);
                $('#telefoneUsuario').val(data.telefone);
                $('#grupoUsuario').val(data.grupo_id);
                $('#dlgUsuarios').modal('show');
        });        
    }
    
    function remover(id){
        $.ajax({
            type: "DELETE",
            url: "/api/usuarios/" + id,
            context: this,
            success: function(){
                console.log('Apagou OK');
                linhas = $('#tabelaUsuarios>tbody>tr');            
                e = linhas.filter( function(i, elemento) { 
                    return elemento.cells[0].textContent == id; 
                });
                if (e)
                    e.remove();
            },
            error: function(error){
                console.log(error);
            }    
        });
        
    }
    
    function carregarUsuarios(){
        $.getJSON('/api/usuarios', function(usuarios){ 
            for(i=0; i<usuarios.length;i++){
                linha = montarLinha(usuarios[i]);
                $('#tabelaUsuarios>tbody').append(linha);
            }
        });   
    }
    
    function criarUsuario(){
        us = {
            nome: $('#nomeUsuario').val(), 
            email: $('#emailUsuario').val(), 
            telefone:$('#telefoneUsuario').val(), 
            grupo_id: $('#grupoUsuario').val()
        };
        $.post('/api/usuarios', us, function(data){
            usuario = JSON.parse(data);
            linha = montarLinha(usuario);
            $('#tabelaUsuarios>tbody').append(linha);

        })
    }
    function salvarUsuario() {
        us = {
            id: $('#id').val(),
            nome: $('#nomeUsuario').val(), 
            email: $('#emailUsuario').val(), 
            telefone:$('#telefoneUsuario').val(), 
            grupo_id: $('#grupoUsuario').val()
        };
        $.ajax({
            type: "PUT",
            url: "/api/usuarios/" + us.id,
            context: this,
            data: us,
            success: function(data){
                us = JSON.parse(data);
                linhas = $('#tabelaUsuarios>tbody>tr');
                e = linhas.filter (function (i, e){
	                return ( e.cells[0].textContent == us.id );
                });
                if (e) {
                    e[0].cells[0].textContent = us.id;
                    e[0].cells[1].textContent = us.nome;
                    e[0].cells[2].textContent = us.email;
                    e[0].cells[3].textContent = us.telefone;
                    e[0].cells[4].textContent = us.grupo_id;
                }
                
            },
            error: function(error){
                console.log(error);
            }    
        });

    }
     
    $('#formUsuario').submit( function(event) {
	    event.preventDefault();
        if ($("#id").val() != '')
	        salvarUsuario();
        else
            criarUsuario();
        $("#dlgUsuarios").modal('hide');
    });
    
    $(function(){
        carregarGrupos();
        carregarUsuarios();
    })

</script>
@endsection











