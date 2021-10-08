<?php

class HomeController{
    public function index(){        
        try {
            $devedores = Devedores::getAll();
            $dividas   = Dividas::getAll();            

           // var_dump($devedores);exit;
            
            /**
             * Twig
             */
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            //________________________________________________
            $template = $twig->load('home.php');

            $parametros=array();
            $parametros['devedores']=$devedores;
            $parametros['dividas']=$dividas;

            //var_dump($parametros);exit;

            $conteudo = $template->render($parametros);            
            //$contudo tem código html pra renderizar
            echo $conteudo;

           
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }        
    }
}
