<?php

    require __DIR__ . "/cabecalho.php";
    require __DIR__ . "/conexao.php";

    $result = $conn->query('select c.id, c.codigo,c.camera,c.modelo,c.valor,c.cor,m.marca from celular c right join marca m on c.marca = m.id');
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
    echo "<th scope='col'>Editar</th>";
    echo "<th scope='col'>Excluir</th>";
    echo "<th scope='col'>Visualizar</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo "<tr>";
        echo "<th scope='row'>${row['id']}</th>";
        echo "<td>${row['codigo']}</td>";
        echo "<td>${row['camera']}</td>";
        echo "<td>${row['modelo']}</td>";
        echo "<td>${row['valor']}</td>";
        echo "<td>${row['cor']}</td>";
        echo "<td>${row['marca']}</td>";
        echo "<td><a href='editar.php?id=${row['id']}'>Editar</a></td>";
        echo "<td><a href='excluir.php?id=${row['id']}'>Excluir</a></td>";
        echo "<td><a href='visualizar.php?id=${row['id']}'>Visualizar</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

    require __DIR__ . "/rodape.php";