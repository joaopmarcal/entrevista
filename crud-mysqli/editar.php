<?php

require __DIR__ . "/cabecalho.php";
require __DIR__ . "/conexao.php";

$id = $_GET['id'];

$celular = $conn->query('select * from celular');
$row_cel = $celular->fetch_array(MYSQLI_ASSOC);
if (isset($_POST['codigo'])) {

    $stmt = $conn->prepare("update celular set codigo = ?, camera = ?, modelo = ?, marca = ?, valor = ?, cor = ? where id= ${id}");

    $stmt->bind_param("issiis", $codigo, $camera, $modelo, $marca, $valor, $cor);

    $codigo = $_POST['codigo'];
    $camera = $_POST['camera'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $valor = $_POST['valor'];
    $cor = $_POST['cor'];

    $stmt->execute();
}

?>
    <h1>Editar celular</h1>
    <form method="post">
        <div class="form-group">
            <label for="codigo">Código</label>
            <input type="number" value="<?= $row_cel['codigo'] ?>" class="form-control" id="codigo" name="codigo" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">O código do seu celular</small>
        </div>
        <div class="form-group">
            <label for="camera">Camera</label>
            <input type="text"value="<?= $row_cel['camera'] ?>" class="form-control" id="camera" name="camera" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Camera do celular</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Modelo</label>
            <input type="text" class="form-control" value="<?= $row_cel['modelo'] ?>" id="exampleInputEmail1" name="modelo" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">Modelo do celular</small>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="marca">Marca</label>
            </div>
            <select class="custom-select" name="marca" id="marca">
                <?php
                $result = $conn->query('select * from marca');
                $compare = $conn->query('select * from celular where id = ' . $id);
                $row_compare = $compare->fetch_array(MYSQLI_ASSOC);
                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                    if (($row_compare['marca']) ==  ($row['id'])) {
                        echo "<option value='${row['id']}' selected>${row['marca']}</option>";
                    } else {
                        echo "<option value='${row['id']}' >${row['marca']}</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Valor</label>
            <input type="number" value="<?= $row_cel['valor'] ?>" class="form-control" name="valor" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Cor</label>
            <input type="text" value="<?= $row_cel['cor'] ?>" class="form-control" name="cor" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    <a href="index.php" class="btn btn-info">Voltar</a>
<?php
require __DIR__ . "/rodape.php";