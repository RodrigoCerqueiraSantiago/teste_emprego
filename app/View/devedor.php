

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center mt-3 mb-3 bg-tituloPG">
            <h5>{{nome_pg}}</h5>

          
        </div>
        <div class="col-md-6 offset-md-3">

            <form method="post" action="http://localhost/prova_rodrigo/?pagina=devedor&metodo=update">

                <input type="hidden" name="fk_devedor" value="{{fk_devedor}}">
                <input type="hidden" name="id_divida" value="{{id_divida}}">

                <div class="mb-3">
                    <label for="descricao_titulo" class="form-label">Descrição Título</label>
                    <input type="text" class="form-control" name="descricao_titulo" value="{{titulo_edit}}" >
               
                </div>
                <div class="mb-3">
                    <label for="data_vencimento" class="form-label">Vencimento</label>
                    <input type="date" class="form-control" name="data_vencimento" value="{{data_vencimento_edit}}">
                </div>
                
                <div class="mb-3">
                    <label for="valor" class="form-label" name="valor">Valor</label>
                    <input type="text" class="form-control" name="valor" value="{{valor_edit|number_format(2, ',', '.')}}">
                </div>
            
                <button type="submit" class="btn btn-warning">Alterar</button>

            </form>

        </div>


    </div>
</div>

