<?php
require 'inicia.php';
/**ARMAZENA O CÓDIGO DO LIVRO A SER ALTERADO**/
$cod_livro = isset($_GET['cod_livro']) ? (int) $_GET['cod_livro'] : NULL;
if (empty($cod_livro)) {
    echo "o Código do livro para alteração não foi definido";
    exit;
}
/**BUSCA NA TABELA OS DADOS DO LIVRO QUE DEVERÁ SER ALTERADO**/
$PDO = conecta_bd();
$stmt = $PDO ->prepare("SELECT
cod_livro, titulo_livro, isbn_livro, autor_livro, nome_editora, qtd_paginas FROM 
livros WHERE cod_livro =:cod_livro");
$stmt->bindParam(':cod_livro',$cod_livro, PDO::PARAM_INT);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
/**SE O FETCH ACIMA NÃO RETORNA UM ARAAY PREENCHIDO, O CÓDIGO DO LIVRO NÃO EXISTE NA TABELA**/
if (!is_array($resultado)){
    echo "Nenhum livro encontrado com o código informado";
    exit;
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Livros</title>
    </head>
    <body>
        <h2>Cadastro de livros - Alteração</h2>
        <form action="altera.php" method="post">
            <label for="titulo_livro">Título:</label>
                <input type="text" name="titulo_livro" id="titulo_livro"
value="<?=$resultado['titulo_livro'] ?>"><br><br>
            <label for="isbn_livro">ISBN:</label>
                <input type="text" name="isbn_livro" id="isbn_livro"
value="<?=$resultado['isbn_livro'] ?>"><br><br>
            <label for="autor_livro">Autor:</label>
                <input type="text" name="autor_livro" id="autor_livro"                       
value="<?=$resultado['autor_livro'] ?>"><br><br>
            <label for="nome_editora">Editora:</label>
                <input type="text" name="nome_editora" id="nome_editora"                       
value="<?=$resultado['nome_editora'] ?>"><br><br>
            <label for="qtd_paginas">Qtd.Páginas:</label>
                <input type="text" name="qtd_paginas" id="qtd_paginas"
value="<?=$resultado['qtd_paginas'] ?>"><br><br>
                <input type="hidden" name="cod_livro" value="<?=$cod_livro?>">
                <input type="submit" value="Alterar">
        </form>
    </body>
</html>
