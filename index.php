<?php
require_once "./config/database.php";
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h1>Tambah Mahasiswa</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" name="nama" id="nama" placeholder="Nama Mahasiswa" required>
        <input type="text" name="jurusan" id="jurusan" placeholder="Jurusan" required>
        <input type="number" name="nim" id="nim" placeholder="NIM" required>
        <input type="number" name="ipk" id="ipk" placeholder="IPK" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>