<?php

require __DIR__ . "/cabecalho.php";
require __DIR__ . "/conexao.php";

$id = $_GET['id'];

$result = $conn->query('select c.id, c.codigo,c.camera,c.modelo,c.valor,c.cor,m.marca from celular c right join marca m on c.marca = m.id where c.id = ' . $id);

echo "<table class='table'>";
echo "<thead>";
echo "<legend class='text-center'><a href='inserir.php'>Adicionar</a></legend>";
echo "<tr>";
echo "<th scope='col'>#</th>";
echo "<th scope='col'>Codigo</th>";
echo "<th scope='col'>Camera</th>";
echo "<th scope='col'>Modelo</th>";
echo "<th scope='col'>Valor</th>";
echo "<th scope='col'>Cor</th>";
echo "<th scope='col'>Marca</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
foreach($result as $row){
    echo "<tr>";
    echo "<th scope='row'>${row['id']}</th>";
    echo "<td>${row['codigo']}</td>";
    echo "<td>${row['camera']}</td>";
    echo "<td>${row['modelo']}</td>";
    echo "<td>${row['valor']}</td>";
    echo "<td>${row['cor']}</td>";
    echo "<td>${row['marca']}</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>
    <a href="index.php" class="btn btn-info">Voltar</a>
<?php
require __DIR__ . "/rodape.php";