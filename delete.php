<?php
require_once "config/database.php";
$nim = $_GET['nim'];
$sql = "DELETE FROM mhs WHERE nim = :nim";
$stmt = $pdo->prepare($sql);
$stmt->execute(['nim' => $nim]);
header("Location: list.php");
exit;
?>