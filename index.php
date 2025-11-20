<?php
include 'connectToDb.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://ujian.smkcaturglobal.sch.id/pluginfile.php/1/core_admin/logocompact/300x300/1726942860/logo%20catur%20global.png">
    <link rel="stylesheet" href="style.css">
    <title>Data sekolah</title>
</head>
<body>
    <h1>Perpustakaan Mars</h1>

    <form method="POST" action="add.php">
        <div class="form-buku">
            <label for="judul">Judul Buku:<br></label>
            <input type="text" name="judul" id="judul" required><br>
        </div>
        <div class="form-pengarang">
            <label for="pengarang">pengarang:<br></label>
            <input type="text" name="pengarang" id="pengarang" required><br>
        </div>
        <div class="form-tahun-terbit">
            <label for="tahun_terbit">Tahun Tetbit:<br></label>
            <input type="text" name="tahun_terbit" id="tahun_terbit" required><br>
        </div>
        <div class="form-genre">
            <label for="genre">Genre:<br></label>
            <input type="text" name="genre" id="genre" required><br>
        </div>
        <button type="submit">Simpan</button>
    </form>

    <?php
    $dariDataBase = mysqli_query($db, "SELECT * FROM tbl_perpustakaan");
    $semuaData = [];

    while ($data = mysqli_fetch_assoc($dariDataBase)) {
        $semuaData[] = $data;
    }
    ?>

    <h3>Daftar Data Buku</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Id</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Genre</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($semuaData as $baris) : ?>
            <tr>
                <td><?=  $baris['id'] ?></td>
                <td><?= $baris['judul']; ?></td>
                <td><?= $baris['pengarang'] ?></td>
                <td><?= $baris['tahun_terbit'] ?></td>
                <td><?= $baris['genre'] ?></td>
                <td> <a href="edit.php?id=<?= $baris['id']; ?>" onclick="return confirm('yakin mau ubah?');">EDIT</a> | <a href="delete.php?id=<?= $baris['id']; ?>" onclick="return confirm('yakin mau hapus?');">HAPUS</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>