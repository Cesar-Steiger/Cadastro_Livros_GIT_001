<?php
/**Constantes com as informações para acesso ao banco mysql**/
define('DB_HOST', 'localhost');
define('DB_NAME', 'ua8');
define('DB_USER', 'root');
define('DB_PASS', '');
/**Habilitam as mensagens de erros**/
ini_set('display_erros', true);
error_reporting(E_ALL);
/**Inclui o arquivo de funções**/
require_once 'funcoes.php';
?>
