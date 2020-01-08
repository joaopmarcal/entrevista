<?php

require __DIR__ . "/cabecalho.php";
require __DIR__ . "/conexao.php";

$id = $_GET['id'];

$stmt = $conn->prepare("delete from celular where id= ${id}");

$stmt->bind_param("i", $id);

$stmt->execute();

header('Location: index.php');

require __DIR__ . "/rodape.php";