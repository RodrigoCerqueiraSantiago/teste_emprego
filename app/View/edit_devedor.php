

<!--
         * public 'id_devedor' => string '1' (length=1)
  public 'nome' => string 'RODRIGO CERQUEIRA SANTIAGO' (length=26)
  public 'cpf_cnpj' => string '90234' (length=5)
  public 'data_nascimento' => string '2021-10-05' (length=10)
  public 'endereco' => string 'rua piquete 102' (length=15)
  public 'updated' => string '2021-05-10 20:10:25' (length=19)
  public 'dividas' => 
    array (size=3)
      0 => null
      1 => 
        object(Dividas)[8]
          public 'id_divida' => string '1' (length=1)
          public 'fk_devedor' => string '1' (length=1)
          public 'descricao_titulo' => string 'Empréstimo' (length=11)
          public 'valor' => string '10.89' (length=5)
          public 'data_vencimento' => string '2021-10-06' (length=10)
          public 'updated' => null
-->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center mt-3 mb-3 bg-tituloPG">
            <h5>{{nome_pg}}</h5>
        </div>
        <div class="col-md-6 offset-md-3">

            <form method="post" action="http://localhost/prova_rodrigo/?pagina=devedor&metodo=update">

                <input type="hidden" name="id_devedor" value="{{id_devedor}}">
                
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" value="{{nome}}">
                </div>
                <div class="mb-3">
                    <label for="cpf_cnpj" class="form-label">CPF/CNPJ</label>
                    <input type="text" class="form-control" name="cpf_cnpj" value="{{cpf_cnpj}}">
                </div>
                
                <div class="mb-3">
                    <label for="nascimento" class="form-label">Nacimento</label>
                    <input type="date" class="form-control" name="nascimento" value="{{data_nascimento}}">
                </div>

                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" name="endereco" value="{{endereco}}">
                </div>
                
                <button type="submit" class="btn btn-warning">Alterar</button>
            </form>

        </div>


    </div>
</div>

