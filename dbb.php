<?php
try {
    $con = new PDO("mysql:host=localhost;dbname=portfolio", "root", "root");
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>