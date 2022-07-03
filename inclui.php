<?php
    require_once './inicia.php';
    /**Coleta as informações digitadas no formulário FORM_INCLUI_PHP**/
    $titulo_livro = isset($_POST['titulo_livro']) ? $_POST['titulo_livro'] : null;
    $isbn_livro = isset($_POST['isbn_livro']) ? $_POST['isbn_livro'] : null;
    $autor_livro = isset($_POST['autor_livro']) ? $_POST['autor_livro'] : null;
    $nome_editora = isset($_POST['nome_editora']) ? $_POST['nome_editora'] : null;
    $qtd_paginas = isset($_POST['qtd_paginas']) ? $_POST['qtd_paginas'] : null;
    /**Verifica se o usuário preencheu todos os campos do formulário**/
    if (empty($titulo_livro) || empty($isbn_livro) || empty($autor_livro) || empty($nome_editora) || empty($qtd_paginas)) {
        echo 'É preciso preencher todos os campos do formulário de cadastro';
        exit;
    }
    /**Insere informações na tabela "livros" do banco de dados "ua8"**/
    $PDO = conecta_bd();
    $sql = "INSERT INTO livros(titulo_livro, isbn_livro, autor_livro, nome_editora, qtd_paginas)
        VALUES(:titulo_livro, :isbn_livro, :autor_livro, :nome_editora, :qtd_paginas)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':titulo_livro', $titulo_livro);
    $stmt->bindParam(':isbn_livro', $isbn_livro);
    $stmt->bindParam(':autor_livro', $autor_livro);
    $stmt->bindParam(':nome_editora', $nome_editora);
    $stmt->bindParam(':qtd_paginas', $qtd_paginas);
    if ($stmt->execute()) {
        header('Location: form_inclui.php');
    }
    else {
        echo "Ocorreu um erro na inclusão de registro";
        print_r($stmt->errorInfo());
    }
?>
