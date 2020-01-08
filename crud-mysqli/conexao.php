<?php
$conn = new mysqli("127.0.0.1", "joao", "joao", "interview");

if ($conn->connect_error){
    echo "Error: " . $conn->connect_error;
}