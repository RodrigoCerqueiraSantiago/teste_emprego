<?php

require_once 'app/Core/Core.php';
require_once 'lib/database/Connection.php';

require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErroController.php';
require_once 'app/Controller/DividaController.php';
require_once 'app/Controller/DevedorController.php';
require_once 'app/Model/Devedores.php';
require_once 'app/Model/Dividas.php';

require_once 'vendor/autoload.php';

$template = file_get_contents('app/Template/layout.php');

ob_start();
    $core = new Core;
    $core->start($_GET);
    $saida = ob_get_contents();
ob_end_clean();


$tplPronto = str_replace('{{area_dinamica}}',$saida,$template);

echo $tplPronto;