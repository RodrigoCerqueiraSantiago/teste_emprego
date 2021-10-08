<?php
error_reporting(0);
use function PHPSTORM_META\type;

class DividaController{
    public function index($params){        
        /**
         * Twig
         */
        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        //________________________________________________
      
        $template = $twig->load('detalhes_divida.php');
        $parametros['nome_pg']=($DividasDevedor ? 'Detalhes Dívidas' :'Dívidas');
        
        if(isset($params)){
            try {
                $DividasDevedor = DIVIDAS::getDividaById_Devedor($params);   
                $parametros['nome_pg']='Detalhes Dívidas ';
                $parametros['divida'] = array_filter($DividasDevedor);
                $conteudo = $template->render($parametros);            
         
                echo $conteudo;  
            } catch (\Throwable $th) {
                //throw $th;
            }
        }else{
            /**
             * Twig
             */
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('add_devedor.php');
        }
    }

    public function update($params){
        
        $con = Connection::getConn();  
        
        $sql="UPDATE devedores SET fk_devedor = :fk_devedor, id_divida = :id_divida, 
            descricao_titulo = :descricao_titulo, 
            data_vencimento = :data_vencimento, valor =:valor 
            where id_devedor = :fk_devedor";

        $sql=$con->prepare($sql);
        
        $sql->bindValue(':fk_devedor', $params['fk_devedor']);
        $sql->bindValue(':id_divida', $params['id_divida']);
        $sql->bindValue(':descricao_titulo', $params['descricao_titulo']);
        $sql->bindValue(':data_vencimento', $params['data_vencimento']);
        $sql->bindValue(':valor', $params['valor']);
        $result = $sql->execute();

        if($result==0){
            throw new Exception("Falha ao alterar Devedor");
            return false;       
        }

        return true;

    }

    static public function store(){
      
        try {
            Devedores::addDividaDevedor($_POST);
            echo '<script>alert("Devedor cadastrado com sucesso!");</script>';
            echo '<script>location.href="http://localhost/prova_rodrigo/?pagina=devedor"</script>';
        } catch (Exception $e) {
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://localhost/prova_rodrigo/?pagina=devedor"</script>';
        }
            
       
    }

    
}
