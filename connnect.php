<?php 

// $servidor = "localhost";
// $usuario = "root";
// $senha = "";
// $database = "psi";

// $pdo = new PDO("mysql:dbname=psi; host=localhost", "root", "");

global $pdo;
try {
    $pdo = new PDO("mysql:dbname=psi;host=localhost", "root", "");
} catch (PDOException $e) {
    echo "FALHOU: {$e->getMessage()}";
}