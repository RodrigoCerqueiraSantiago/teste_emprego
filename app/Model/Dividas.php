<?php

class Dividas{

   
    public static function getAll(){

        $con = Connection::getConn();
        //$sql = "select * from devedores order by id_devedor desc"; funciona

        //$sql = "select * from dividas";
        $sql="SELECT id_divida,fk_devedor,descricao_titulo,sum(valor) as valor,data_vencimento
        FROM teste_emprego.dividas 
        group by descricao_titulo";

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

    public static function getById($id_divida){
        $con = Connection::getConn();
        $sql ='select * from dividas where id_divida=:id';
        $sql = $con->prepare($sql);
        $sql->bindValue(':id',$id_divida, PDO::PARAM_INT);
        $sql->execute();

        $resultado = $sql->fetchObject('Dividas');

      
        if(!$resultado){
            throw new Exception('Não foi encontrado nenhum registro');
        }

        return $resultado;

    }

    public static function getDividaById_Devedor($id){

      
        $con = Connection::getConn();
        //$sql ='select * from dividas where fk_devedor=:id';
        $sql ='select * from dividas where fk_devedor=:id';
        $sql = $con->prepare($sql);
        $sql->bindValue(':id',$fk_devedor, PDO::PARAM_INT);
        $resultado = $sql->execute();

        //var_dump($sql->execute());exit;

       /* $resultado[]=null;
        while($row = $sql->fetchObject('Dividas')){
            $resultado[]=$row;
        }

        //var_dump($resultado);*/
        if(empty($resultado)){
            throw new Exception('Não foi encontrado nenhum registro');
        }

        return $resultado;

    }

    public static function delete($id){
        $con = Connection::getConn();  
            
        $sql="DELETE from devedores WHERE id_devedor=:id";

        $sql=$con->prepare($sql);        
       
        $sql->bindValue(':id', $id);
       
        $result = $sql->execute();

        if($result==0){
            throw new Exception("Falha ao deletar Devedor");
            return false;       
        }

        return true;

    }

    

}