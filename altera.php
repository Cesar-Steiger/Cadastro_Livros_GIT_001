<?php
require_once 'inicia.php';
/**COLETA AS INFORMAÇÕES DIGITADAS NO FORMULÁRIO FORM_ALTERA.PHP**/
$cod_livro = isset($_POST['cod_livro']) ? $_POST['cod_livro'] : null;
$titulo_livro = isset($_POST['titulo_livro']) ? $_POST['titulo_livro'] : null;
$isbn_livro = isset($_POST['isbn_livro']) ? $_POST['isbn_livro'] : null;
$autor_livro = isset($_POST['autor_livro']) ? $_POST['autor_livro'] : null;
$nome_editora = isset($_POST['nome_editora']) ? $_POST['nome_editora'] : null;
$qtd_paginas = isset($_POST['qtd_paginas']) ? $_POST['qtd_paginas'] : null;
/**VERIFICA SE TODOS OS CAMPOS DO FORMULÁRIO ESTÃO PREENCHIDOS**/
if (empty($titulo_livro) || empty($isbn_livro) || empty($autor_livro) ||
empty($nome_editora) || empty($qtd_paginas)) {
echo "É preciso preencher todos os campos do formulário de cadastro!";
exit;
}
/**ALTERA AS INFORMAÇÕES NA TABELA LIVROS DO BANCO DE DADOS UA8**/
$PDO = conecta_bd();
$stmt = $PDO->prepare("UPDATE livros SET"
        . " titulo_livro=:titulo_livro, isbn_livro=:isbn_livro, "
        . "autor_livro=:autor_livro, nome_editora=:nome_editora, "
        . "qtd_paginas=:qtd_paginas WHERE cod_livro=:cod_livro");
$stmt->bindParam(':cod_livro',$cod_livro, PDO::PARAM_INT);
$stmt->bindParam(':titulo_livro',$titulo_livro);
$stmt->bindParam(':isbn_livro',$isbn_livro);
$stmt->bindParam(':autor_livro',$autor_livro);
$stmt->bindParam(':nome_editora',$nome_editora);
$stmt->bindParam(':qtd_paginas',$qtd_paginas);
if ($stmt->execute()) {
    header('Location: index.php');
}
else {
    echo "Ocorreu um erro na alteração do livro";
    print_r($stmt->errorInfo());
}
?>
