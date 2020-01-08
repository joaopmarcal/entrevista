<?php

require __DIR__ . "/conexao.php";

$id = $_GET['id'];

$stmt = $conn->prepare('delete from celular where id = :ID');

$stmt->bindParam(":ID",$id);

$stmt->execute();

header("Location: index.php");



