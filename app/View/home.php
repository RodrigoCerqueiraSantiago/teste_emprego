

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center mt-3 mb-3 bg-tituloPG">
            <h5>Home {{nome}}</h5>
        </div>
        <div class="col-md-8 offset-md-2">
            <h5 class="text-center">Devedores <a href="http://localhost/prova_rodrigo/?pagina=devedor" class="btn btn-sm btn-success" title="Adicionar novo devedor"><i class="fa fa-plus" aria-hidden="true"></i></a></h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Valor</th>
                        <th class="text-center">%</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {% set sum = 0%}
                    {% for devedor in devedores %}
                    {% set sum = sum + devedor.valor %}
                        <tr>
                            <th scope="row">{{ devedor.nome }} {{devedor.id_devedor}}</th>
                            <td>{{ devedor.valor|number_format(2, ',', '.') }} R$</td>
                            
                            <td class="text-center">
                                <a href="http://localhost/prova_rodrigo/?pagina=devedor&id={{devedor.id_devedor}}" class="btn btn-sm" title="Checar dívidas">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </a>
                                <a href="http://localhost/prova_rodrigo/?pagina=devedor&method=edit&id={{devedor.id_devedor}}" class="btn btn-sm" title="Editar devedor">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <a href="http://localhost/prova_rodrigo/?pagina=devedor&method=delete&id={{devedor.id_devedor}}" class="btn btn-sm" title="Excluir devedor">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                                <a href="" class="btn btn-sm" title="Adicionar dívida">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </a>

                                
                            </td>                            
                        </tr>
                    {% endfor %}
                    <tr>
                        <td colspan="3"> <b><h3 class="text-danger text-center">Total: {{sum|number_format(2, ',', '.') }} R$</h3></b> </td>
                    </tr>
                </tbody>
            </table>        
        </div>


    </div>

   
</div>



