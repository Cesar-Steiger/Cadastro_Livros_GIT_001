<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Livros</title>
    </head>
    <body>
        <h2>Cadastro de livros - Inclusão</h2>
        <form action="inclui.php" method="post">
            <label for="titulo_livro">Título:</label>
                <input type="text" name="titulo_livro" id="titulo_livro"><br><br>
            <label for="isbn_livro">ISBN:</label>
                <input type="text" name="isbn_livro" id="isbn_livro"><br><br> 
            <label for="autor_livro">Autor:</label>
                <input type="text" name="autor_livro" id="autor_livro"><br><br>
            <label for="nome_editora">Editora:</label>
                <input type="text" name="nome_editora" id="nome_editora"><br><br>
            <label for="qtd_paginas">Qtd Páginas:</label>
                <input type="text" name="qtd_paginas" id="qtd_paginas"><br><br>
            <br>
            <input type="submit" value="Incluir">
        </form>
                
         <?php
        // put your code here
        ?>
    </body>
</html>
