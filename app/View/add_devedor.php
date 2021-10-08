

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center mt-3 mb-3 bg-tituloPG">
            <h5>{{nome_pg}}</h5>
        </div>
        <div class="col-md-6 offset-md-3">

            <form method="post" action="http://localhost/prova_rodrigo/?pagina=devedor&metodo=store">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" value="">
                </div>
                <div class="mb-3">
                    <label for="cpf_cnpj" class="form-label">CPF/CNPJ</label>
                    <input type="text" class="form-control" name="cpf_cnpj" value="">
                </div>
                
                <div class="mb-3">
                    <label for="nascimento" class="form-label">Nacimento</label>
                    <input type="date" class="form-control" name="nascimento" value="">
                </div>

                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" name="endereco" value="">
                </div>
                
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </form>

        </div>


    </div>
</div>

