<?php

include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM siswa WHERE id = $id";
$tampil = mysqli_fetch_assoc(mysqli_query($conn, $sql));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_GET['nama'];
    $jurusan = $_GET['jurusan'];
    $update_sql = "UPDATE siswa SET nama = '$nama', jurusan = '$jurusan' WHERE id = $id";
    if (mysqli_query($conn, $update_sql)) {
        echo "<script>
            alert('Data berhasil diubah');
            document.location.href = 'index.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
</head>
<body>
    <h1>Ubah Data Siswa</h1>
    <form action="">
        <input type="text" value="<?= $tampil['id']; ?>">
        <br>
        <label for="nama">Nama: </label>
        <input type="text" value="<?= $tampil['nama']; ?>" name="nama">
        <br>
        <label for="jurusan">Jurusan: </label>
        <input type="text" value="<?= $tampil['jurusan']; ?>" name="jurusan">
        <br>
        <button type="submit">Ubah Data</button>
    </form>
</body>
</html>