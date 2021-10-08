<?php

class Core{
    public function start($urlGet){
        
        //Recebendo o parâmetro de controller da url
        if(isset($urlGet['metodo'])){
            $acao = $urlGet['metodo'];           
        }else{
            $acao = 'index';
        }
        

        //Evitando erro na home pois não terá parâmetro pro controller
        if(isset($urlGet['pagina'])){
            $controller = ucfirst($urlGet['pagina'].'Controller');
        }else{
            //Se digitar uma página que não exista cai na HomeController, pode trabalhar uma pg de erro dps
            $controller = 'HomeController';
        }

        //Verificando se a página ou o controller q o user está tentando 
        //acessar existe
        if(!class_exists($controller)){
            $controller = 'ErroController';
        }else{
            $id=null;
        }

        if(isset($urlGet['id']) && $urlGet['id']!=null){
            $id=$urlGet['id'];
        }
        //Chama métodos de forma dinâmica
        call_user_func_array(array(new $controller, $acao),array('id'=>$id));
        
    }
}
