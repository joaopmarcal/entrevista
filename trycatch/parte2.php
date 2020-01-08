<!doctype html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

function trataNome($name){
    if (!$name){
        throw new Exception("Nenhum nome foi informado.",1);
    }

    echo ucfirst($name)."<br>";
}

try {
    trataNome("joao");
    trataNome("");
} catch (Exception $e){
    echo $e->getMessage();
} finally {
    echo "Executou o bloco try";
}
?>

</body>
</html>

