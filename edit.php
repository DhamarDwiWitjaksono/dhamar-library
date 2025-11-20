<?php

include 'connectToDb.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id === 0) {
    die("ID tidak valid.");
}

$sql = "SELECT * FROM tbl_perpustakaan WHERE id = $id";
$tampil = mysqli_fetch_assoc(mysqli_query($db, $sql));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahunTerbit = $_POST['tahun_terbit'];
    $genre = $_POST['genre'];

    $update_sql = "UPDATE tbl_perpustakaan 
                   SET judul = '$judul', 
                       pengarang = '$pengarang', 
                       tahun_terbit = '$tahunTerbit', 
                       genre = '$genre'
                   WHERE id = $id";

    if (mysqli_query($db, $update_sql)) {
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
    <title>Ubah Data Buku</title>
</head>
<body>
    <h1>Ubah Data Buku</h1>

    <form method="POST" action="edit.php?id=<?= $id ?>">
        <label for="judul">Judul: </label>
        <input type="text" name="judul" value="<?= $tampil['judul'] ?>" required>
        <br>

        <label for="pengarang">Pengarang: </label>
        <input type="text" name="pengarang" value="<?= $tampil['pengarang'] ?>" required>
        <br>

        <label for="tahun_terbit">Tahun Terbit: </label>
        <input type="text" name="tahun_terbit" value="<?= $tampil['tahun_terbit'] ?>" required>
        <br>

        <label for="genre">Genre: </label>
        <input type="text" name="genre" value="<?= $tampil['genre'] ?>" required>
        <br>

        <button type="submit">Ubah Data</button>
    </form>
</body>
</html>
