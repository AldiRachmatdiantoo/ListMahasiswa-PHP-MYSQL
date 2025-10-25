<?php
require_once "config/database.php";
$nim = $_GET['nim'];
$sql = "SELECT * FROM mhs WHERE nim = :nim";
$stmt = $pdo->prepare($sql);
$stmt->execute(['nim' => $nim]);
$mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === "POST" && 
    isset($_POST['nama'], $_POST['jurusan'], $_POST['nim'], $_POST['ipk']) &&
    is_numeric($_POST['ipk']) &&
    $_POST['ipk'] <= 4 &&
    $_POST['ipk'] > 0
){
    $sql = "UPDATE mhs SET nama = :nama, jurusan = :jurusan, ipk = :ipk WHERE nim = :nim";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nama' => $_POST['nama'],
        'jurusan' => $_POST['jurusan'],
        'ipk' => (float) $_POST['ipk'],
        'nim' => $_POST['nim']
    ]);
    header("Location: list.php");
    exit;
}
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
            padding: 20px;
            display: flex;
            flex-direction: column; 
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
            font-size: 28px;
        }

        form {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box; 
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input:focus {
            border-color: #007bff; 
            box-shadow: 0 0 5px rgba(0,123,255,0.3);
            outline: none; 
        }

        button {
            width: 100%;
            padding: 12px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-top: 10px; 
        }

        button:hover {
            background-color: #0056b3; 
        }
    </style>
<body>
     <h1>Edit Mahasiswa</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" name="nama" id="nama" placeholder="Nama Mahasiswa" value="<?=$mahasiswa['nama']?>" required>
        <input type="text" name="jurusan" id="jurusan" placeholder="Jurusan" value="<?=$mahasiswa['jurusan']?>" required>
        <input type="number" name="nim" id="nim" placeholder="NIM" value="<?=$mahasiswa['nim']?>" required readonly>
        <input type="number" name="ipk" id="ipk" placeholder="IPK" value="<?=$mahasiswa['ipk']?>" step="any" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>