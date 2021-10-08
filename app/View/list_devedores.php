

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center mt-3 mb-3 bg-tituloPG">
            <h5>{{nome_pg}}</h5>
        </div>
        <div class="col-lg-12 text-end mt-2 mb-4">
            <a href="?pagina=devedor&metodo=create" class="btn btn-success" title="Cadastrar Devedor">
                <i class="fa fa-plus" aria-hidden="true"></i> Devedor
            </a>
        </div>
        <div class="col-md-10 offset-md-1">

        
            <table class="table">
                <thead>
                    <tr>
                        <th class="col"></th>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cpf_Cnpj</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">Endereço</th>                    
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    {% for devedor in list_devedores %}
                        <tr>
                            <!--<th>
                                <a href="?pagina=dividas&metodo=getDividas&id={{devedor.id_devedor}}&cpf_cnpj={{devedor.cpf_cnpj}}&nome={{devedor.nome}}" class="btn btn-default" 
                                title="Adicionar Dívida">
                                    <i class="fa fa-plus-circle " aria-hidden="true"></i>
                                </a>
                            </th>-->
                            <th scope="row">{{devedor.id_devedor}}</th>
                            <td>{{ devedor.nome }}</td>
                            <td>{{ devedor.cpf_cnpj }}</td>                         
                            <td>{{ devedor.data_nascimento| date("d/m/Y") }}</td>
                            <td>{{ devedor.endereco }}</td>                            
                            <td>
                                <a href="?pagina=devedor&metodo=edit&id={{devedor.id_devedor}}" class="btn btn-default" title="Editar Devedor">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-default" href="javascript:func()" onclick="confirmacao({{devedor.id_devedor}})" title="Excluir Devedor">
                                
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                                <a href="?pagina=devedor&metodo=getDividas&id={{devedor.id_devedor}}" class="btn btn-default" title="Dívidas Devedor">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </a>

                            </td>
                        </tr>  
                       
                    {% endfor %}
                                     
                </tbody>
            </table>

        </div>


    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script language="Javascript">

function confirmacao(id) {
     var resposta = confirm("Deseja remover esse registro?");
     if (resposta == true) {
          window.location.href = "?pagina=devedor&metodo=delete&id="+id;
     }
}

$(document).ready(function(){
    
});
        
    
</script>
