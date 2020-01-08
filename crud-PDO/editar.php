<?php

require __DIR__ . "/cabecalho.php";
require __DIR__ . "/conexao.php";

$id = $_GET['id'];

if (isset($_POST['codigo'])) {

    $stmt = $conn->prepare("update celular set codigo = :CODIGO, camera = :CAMERA, modelo = :MODELO, marca = :MARCA, valor = :VALOR, cor = :COR where id = :ID");

    $codigo = $_POST['codigo'];
    $camera = $_POST['camera'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $valor = $_POST['valor'];
    $cor = $_POST['cor'];

    $stmt->bindParam(":CODIGO",$codigo);
    $stmt->bindParam(":CAMERA",$camera);
    $stmt->bindParam(":MODELO",$modelo);
    $stmt->bindParam(":MARCA",$marca);
    $stmt->bindParam(":VALOR",$valor);
    $stmt->bindParam(":COR",$cor);
    $stmt->bindParam(":ID",$id);

    $stmt->execute();

}
$stmt = $conn->prepare("select c.id, c.codigo,c.camera,c.modelo,c.valor,c.cor,m.marca from celular c right join marca m on c.marca = m.id where c.id = ${id}");

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $rows) {
    ?>
    <h1>Adicione novo celular</h1>
    <form method="post">
        <div class="form-group">
            <label for="codigo">Código</label>
            <input type="number" value="<?= $rows['codigo'] ?>" class="form-control" id="codigo" name="codigo" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">O código do seu celular</small>
        </div>
        <div class="form-group">
            <label for="camera">Camera</label>
            <input type="text" class="form-control" value="<?= $rows['camera'] ?>" id="camera" name="camera" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Camera do celular</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Modelo</label>
            <input type="text" class="form-control" value="<?= $rows['modelo'] ?>" id="exampleInputEmail1" name="modelo" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Modelo do celular</small>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="marca">Marca</label>
            </div>
            <select class="custom-select" name="marca" id="marca">
                <?php
                $compare = $conn->prepare('select marca from celular where id = ' . $id);
                $compare->execute();
                $compares = $compare->fetchAll(PDO::FETCH_ASSOC);
                $result = $conn->prepare('select * from marca');
                $result->execute();
                $results = $result->fetchAll(PDO::FETCH_ASSOC);
                $x = 0;
                foreach ($results as $row) {
                        if (($compares[0]['marca']) == ($row["id"])) {
                            echo "<option value='${row['id']}' selected>${row['marca']}</option>";
                        } else {
                            echo "<option value='${row['id']}'>${row['marca']}</option>";
                        }
                        $x ++;
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Valor</label>
            <input type="number" class="form-control" value="<?= $rows['valor'] ?>" name="valor" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Cor</label>
            <input type="text" class="form-control" value="<?= $rows['cor'] ?>" name="cor" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    <a href="index.php" class="btn btn-info">Voltar</a>
    <?php
}
require __DIR__ . "/rodape.php";