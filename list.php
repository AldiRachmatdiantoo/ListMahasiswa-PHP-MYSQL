<?php
require_once "./config/database.php";
$sql = "SELECT * FROM mhs";
$stmt = $pdo->query($sql);
$mhs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        background-color: #f4f7f6;
        margin: 0;
        padding: 40px 20px;
        color: #333;
    }

    h1 {
        text-align: center;
        color: #007bff;
        margin-bottom: 30px;
        font-weight: 600;
    }

    ul {
        list-style-type: none;
        padding: 0;
        max-width: 700px;
        margin: 20px auto;
    }

    ul div {
        background-color: #ffffff;
        padding: 20px 25px;
        margin-bottom: 15px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    ul div:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    ul div h1 {
        font-size: 1.5em;
        color: #333;
        margin: 0 0 5px 0;
        text-align: left;
    }

    ul div h3 {
        font-size: 1em;
        color: #555;
        margin: 0 0 10px 0;
        font-weight: normal;
    }

    ul div p {
        font-size: 0.9em;
        color: #777;
        margin: 0 0 15px 0;
    }

    ul div a {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        color: white;
        font-size: 0.9em;
        font-weight: 500;
        transition: background-color 0.2s ease, transform 0.1s ease;
        margin-right: 10px;
    }

    ul div a[href*="edit"] {
        background-color: #007bff;
    }

    ul div a[href*="edit"]:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    ul div a[href*="delete"] {
        background-color: #dc3545;
    }

    ul div a[href*="delete"]:hover {
        background-color: #b02a37;
        transform: translateY(-2px);
    }

    button {
        display: block;
        margin: 30px auto 0 auto;
        padding: 10px 25px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 1em;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button a {
        color: inherit;
        text-decoration: none;
    }
    a {
        text-decoration: none;
    }
    button:hover {
        background-color: #218838;
    }
</style>
<body>
    <h1>List Mahasiswa</h1>
    <ul>
        <?php foreach($mhs as $mahasiswa):?>
            <div>
                <h1><?=$mahasiswa['nama']?></h1>
                <h3><?=$mahasiswa['jurusan']?></h3>
                <p><?=$mahasiswa['nim']?></p>
                <a href="edit.php?nim=<?=$mahasiswa['nim']?>">Edit</a>
                <a href="delete.php?nim=<?=$mahasiswa['nim']?>">Hapus</a>
            </div>
        <?php endforeach;?>
    </ul>
    <a href="index.php"><button type="button">Tambah</button></a>
</body>
</html>