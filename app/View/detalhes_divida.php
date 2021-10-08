<!--

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
    </div>
    <div class="row pb-4">
        <div class="col-lg-12 align-items-center"> 
            <a href="?pagina=devedor" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
    
    
    
    <div class="row ">
        {% for d in divida %}
        
            <div class="col-lg-4">
                <div class="card" style="width: auto;">
                    <div class="card-body">
                        <h5 class="card-title">{{d.descricao_titulo}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">R$ {{ d.valor|number_format(2, ',', '.') }}</h6>
                        <p class="card-text">
                            <h5 class="bg-danger text-center text-white">Vencimento: {{ d.data_vencimento|date("m/d/Y") }}</h5>
                        </p>                        
                        <div class="text-center">
                            <a href="http://localhost/prova_rodrigo/?pagina=devedor&id={{d.id_divida}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="#" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </div>
                        
                    </div>
                </div>
            </div>                    
        {% endfor %}
    </div>

    <div class="row mt-4" style="background-color: #ccc;">
        <div class="col-lg-12">
            <h5>Nova Dívida</h5>            
        </div>
        <div class="col-md-10 offset-md-1 p-3">

            <form action="http://localhost/prova_rodrigo/?pagina=divida&metodo=store" method="post">

                <input type="hidden" name="id_devedor" value="{{id_devedor}}" id="">
                
                <div class="row">
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="descricao_titulo" placeholder="Descrição Título">
                    </div>
                    <div class="col-lg-2">
                        <input type="text" class="form-control" name="valor" placeholder="Valor Título">
                    </div>
                    <div class="col-lg-3">
                        <input type="date" class="form-control" name="data_vencimento" placeholder="Data vencimento">
                    </div>
                    <div class="col-lg-2">
                        <input type="submit" class="btn btn-success" value="Cadastrar Dívida">
                    </div>
                </div>
                
            </form>
            
        </div>
    </div>
    
    
    
        
       

   
</div>
<!--
     public 'id_divida' => string '1' (length=1)
      public 'fk_devedor' => string '1' (length=1)
      public 'descricao_titulo' => string 'Empréstimo' (length=11)
      public 'valor' => string '10.89' (length=5)
      public 'data_vencimento' => string '2021-10-06' (length=10)
      public 'updated' => null
-->
