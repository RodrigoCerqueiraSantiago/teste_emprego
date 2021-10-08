<?php

class DevedorController{

    public function index(){  
        $devedores = Devedores::getAll();

       //var_dump($devedores);exit;

        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        //________________________________________________
        $template = $twig->load('list_devedores.php');

       

        //$parametros['id_divida']=$dividaById->id_divida;
        $parametros['nome_pg']='Listagem de Devedores';
        $parametros['list_devedores'] = $devedores;
                

        $conteudo = $template->render($parametros);            
        //$contudo tem código html pra renderizar
        echo $conteudo;
    }

    public function create(){  
        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        //________________________________________________
        $template = $twig->load('add_devedor.php');

       

        //$parametros['id_divida']=$dividaById->id_divida;
        $parametros['nome_pg']='Cadastrar de Devedores';
       // $parametros['list_devedores'] = $devedores;
                

        $conteudo = $template->render($parametros);            
        //$contudo tem código html pra renderizar
        echo $conteudo;
    }

    public function edit($id_devedor){

        $devedor = Devedores::getById($id_devedor);
       
        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        //________________________________________________
        $template = $twig->load('edit_devedor.php');

        $parametros=array();
        $parametros['nome_pg']='Edição Devedor';
        $parametros['id_devedor'] = $devedor->id_devedor;
        $parametros['nome'] = $devedor->nome;
        $parametros['cpf_cnpj'] = $devedor->cpf_cnpj;
        $parametros['data_nascimento'] = $devedor->data_nascimento;
        $parametros['endereco'] = $devedor->endereco;
        $parametros['devedor_nome'] = $devedor->nome;
        $parametros['devedor_nome'] = $devedor->nome;

      // var_dump($devedor);exit;

        $conteudo = $template->render($parametros);            
        //$contudo tem código html pra renderizar
        echo $conteudo;
    }

    public static function update(){

        try {            
            Devedores::update($_POST);

            echo '<script>alert("Devedor alterado com sucesso!");</script>';
            echo '<script>location.href="http://localhost/prova_rodrigo/?pagina=devedor"</script>';

        } catch (Exception $e) {
            echo '<script>alert("Erro ao alterar!");</script>';
            echo '<script>location.href="http://localhost/prova_rodrigo/?pagina=devedor&id='.$_POST['id_devedor'].'"</script>';
        }
        
    }

    public function delete($paramId){

        try {
            Devedores::delete($paramId);
            echo '<script>alert("Devedor excluido com sucesso!");</script>';
            echo '<script>location.href="http://localhost/prova_rodrigo/?pagina=devedor"</script>';
        } catch (Exception $e) {
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://localhost/prova_rodrigo/?pagina=devedor"</script>';
        }
        
    }

    

    public function store(){        

        if(!isset($_POST)){
            /**
             * Twig
             */
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            //________________________________________________
            $template = $twig->load('add_devedor.php');

            $parametros=array();
            $parametros['nome_pg']='Adicionar Devedor';

            $conteudo = $template->render($parametros);            
            //$contudo tem código html pra renderizar
            echo $conteudo;
        }else{

            try {
                Devedores::insert($_POST);
                echo '<script>alert("Devedor cadastrado com sucesso!");</script>';
                echo '<script>location.href="http://localhost/prova_rodrigo/?pagina=devedor"</script>';
            } catch (Exception $e) {
                echo '<script>alert("'.$e->getMessage().'");</script>';
                echo '<script>location.href="http://localhost/prova_rodrigo/?pagina=devedor"</script>';
            }
            
        }
    }

    static function getDividas($id_devedor){

    //    var_dump($id_devedor);exit;

        /**public 'id_divida' => string '3' (length=1)
      public 'fk_devedor' => string '5' (length=1)
      public 'descricao_titulo' => string 'Fruta' (length=5)
      public 'valor' => string '23.77' (length=5)
      public 'data_vencimento' => string '2021-07-02' (length=10)
      public 'updated' => null */
        
        $devedor = Devedores::getDividaById_Devedor($id_devedor);
       // $devedor = Devedores::getById($id_devedor);
       

        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        //________________________________________________
        $template = $twig->load('detalhes_divida.php');

        $parametros=array();
        $parametros['nome_pg']='Adicionar Dívida';
        $parametros['divida'] = $devedor;
        $parametros['id_devedor'] = $id_devedor;

       // var_dump($devedor);exit;

        $conteudo = $template->render($parametros);            
        //$contudo tem código html pra renderizar
        echo $conteudo;
        //cho '<script>alert("Devedor cadastrado com sucesso!");</script>';
        //var_dump($devedor);exit;

    }

    
}
