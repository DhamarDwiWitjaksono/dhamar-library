<?php

include 'connectToDb.php';

$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$tahunTerbit = $_POST['tahun_terbit'];
$genre = $_POST['genre'];
$query = "INSERT INTO tbl_perpustakaan(judul, pengarang, tahun_terbit, genre) VALUES ('$judul', '$pengarang', '$tahunTerbit', '$genre')";

$hasil = mysqli_query($db, $query);

if ($hasil) {
    echo "
    <script>
        alert('Data berhasil disimpan.');
        window.location='index.php';
    </script>;
    ";
}