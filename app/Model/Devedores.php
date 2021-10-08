<?php

class Devedores{

    public static function getAll(){

        $con = Connection::getConn();
        //$sql = "select * from devedores order by id_devedor desc"; funciona

        $sql = "select d.id_devedor,DI.id_divida,d.nome,d.cpf_cnpj,d.data_nascimento,
                d.endereco,sum(DI.valor) as 'valor',DI.fk_devedor from devedores d 
                left join dividas DI on d.id_devedor=DI.fk_devedor
                group by d.id_devedor order by d.nome";
                
        //$sql="Select * from devedores";
                

        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();

        while($row = $sql->fetchObject()){
            $resultado[] = $row;
        }

        if(!$resultado){
            throw new Exception('Não foi encontrado nenhum registro');
        }

      //  var_dump($resultado);exit;
        
        return $resultado;
    }

    public static function getById($id_devedor){
        $con = Connection::getConn();
        $sql ='select * from devedores where id_devedor=:id';
        $sql = $con->prepare($sql);
        $sql->bindValue(':id',$id_devedor, PDO::PARAM_INT);
        $sql->execute();

        $resultado = $sql->fetchObject('Devedores');

        if(!$resultado){
            throw new Exception('Não foi encontrado nenhum registro');
        }else{
            //Pegando às dívidas do devedor na model Dividas
            //Ciando o atributo dividas e atribuíndo às dívidas do devedor em questão($id_devedor)
            $resultado->dividas=Dividas::getDividaById_Devedor($resultado->id_devedor);

            if(empty($resultado->dividas[1])){
                $resultado->dividas = 'Esse devedor não possui dívidas no momento.';
            }
        }

        return $resultado;

    }

    public static function getDividaById_Devedor($fk_devedor){
        //  var_dump($fk_devedor);exit;
          $con = Connection::getConn();
          $sql ='select * from dividas 
          left join devedores 
          on dividas.fk_devedor=devedores.id_devedor 
          where fk_devedor=:id';
          $sql = $con->prepare($sql);
          $sql->bindValue(':id',$fk_devedor, PDO::PARAM_INT);
          $sql->execute();
  
          $resultado[]=null;
          while($row = $sql->fetchObject('Dividas')){
              $resultado[]=$row;
          }
  
          if(empty($resultado)){
              throw new Exception('Não foi encontrado nenhum registro');
          }
  
  //        var_dump($resultado);
          return $resultado;
  
    }

    public static function insert($devedor){

        if(empty($devedor['nome'])  && empty($devedor['cpf_cnpj'])){
            throw new Exception('Preencha todos os campos.');
            return false;
        }

        $con = Connection::getConn();     

        $sql = $con->prepare('insert into devedores (Nome,cpf_cnpj,data_nascimento,endereco,updated)
        values (:nome,:cpf_cnpj,:data_nascimento,:endereco,:updated)');

        $sql->bindValue(':nome',           $devedor['nome'] );
        $sql->bindValue(':cpf_cnpj',       $devedor['cpf_cnpj'] );
        $sql->bindValue(':data_nascimento',$devedor['nascimento'] );
        $sql->bindValue(':endereco',       $devedor['endereco'] );
        $sql->bindValue(':updated',        date("Y-m-d H:i:s") );
        $result = $sql->execute();

        if($result==0){
            throw new Exception('Preencha todos os campos.');          
            return false;
        }

        return true;
    }

    /**Finalizada 08/10/21 */
    public static function addDividaDevedor($devedor){

        $con = Connection::getConn();     

        $sql = $con->prepare('insert into dividas (fk_devedor,descricao_titulo,valor,data_vencimento,updated)
        values (:fk_devedor,:descricao_titulo,:valor,:data_vencimento,:updated)');

        $sql->bindValue(':fk_devedor',       $_POST['id_devedor'] );
        $sql->bindValue(':descricao_titulo', $_POST['descricao_titulo'] );
        $sql->bindValue(':valor',            $_POST['valor'] );
        $sql->bindValue(':data_vencimento',  $_POST['data_vencimento'] );
        $sql->bindValue(':updated',          date("Y-m-d H:i:s") );
        $result = $sql->execute();

        if($result==0){
            throw new Exception('Preencha todos os campos.');          
            return false;
        }

        return true;
      
    }



    public static function  update($params){

        $con = Connection::getConn();  
            
        $sql="UPDATE devedores SET nome=:nome,cpf_cnpj=:cpf_cnpj,data_nascimento=:data_nascimento, 
            endereco=:endereco,updated=:updated
            where id_devedor=:id_devedor";

        $sql=$con->prepare($sql);        
       
        $sql->bindValue(':nome', $params['nome'], PDO::PARAM_STR);
        $sql->bindValue(':cpf_cnpj', $params['cpf_cnpj'], PDO::PARAM_STR);
        $sql->bindValue(':data_nascimento', $params['nascimento']);
        $sql->bindValue(':endereco', $params['endereco'] , PDO::PARAM_STR);       
        $sql->bindValue(':updated', date('Y-d-m H:i:s'), PDO::PARAM_STR);   
        $sql->bindValue(':id_devedor', $params['id_devedor'],PDO::PARAM_INT);     
              
        $result = $sql->execute();

        if($result==0){
            throw new Exception("Falha ao alterar Devedor");
            return false;       
        }

        return true;

     
    }

    public static function delete($id){
        $con = Connection::getConn();  

        /**Deletando suas dívidas antes */
        $sql="DELETE from dividas WHERE fk_devedor=:id";
        $sql=$con->prepare($sql);               
        $sql->bindValue(':id', $id);       
        $result = $sql->execute();

        if($result){
            $sql="DELETE from devedores WHERE id_devedor=:id";
            $sql=$con->prepare($sql);               
            $sql->bindValue(':id', $id);       
            $result = $sql->execute();

            if($result==0){
                throw new Exception("Falha ao deletar Devedor");
                return false;       
            }

            return true;
        }else{
            throw new Exception("Falha ao deletar dividas");
                return false;
        }
            
        

    }


    

 

}