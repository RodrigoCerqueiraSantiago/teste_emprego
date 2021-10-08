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

        <div class="col-lg-12">
        {% for d in DividasDevedor %}
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{d.descricao_titulo}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{d.valor}}</h6>
                    <p class="card-text">
                    data_vencimento
                    </p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
             
         {% endfor %}
        </div>
        <div class="col-md-6 offset-md-3">
            <form method="post" action="#">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Descrição Título</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{titulo_edit}}" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Vencimento</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" value="{{data_vencimento_edit}}">
                </div>
                
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Valor</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" value="{{valor_edit|number_format(2, ',', '.')}}">
                </div>
            
                <button type="submit" class="btn btn-warning">Alterar vv</button>
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
{% for divida in Dividas %}
            divida.descricao_titulo
            {% endfor %}