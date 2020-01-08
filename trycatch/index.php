<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Try Catch</title>
</head>
<body>
<?php
try {
    throw new Exception("Houve um erro.",400);
} catch (Exception $e){

    echo json_encode(array(
       "message"=>$e->getMessage(),
       "line"=>$e->getLine(),
       "file"=>$e->getFile(),
       "code"=>$e->getCode(),
    ));

}
?>
</body>
</html>