<?php
include 'connectToDb.php';

$id = $_GET['id'];

$hasilHapus = mysqli_query($db, "DELETE FROM siswa WHERE id='$id'");

if ($hasilHapus) {
    echo "
    <script>
        alert('Data berhasil dihapus.');
        window.location='index.php';
    </script>;
    ";
}else {
    echo "
    <script>
        alert('Data gagal dihapus.');
        window.location='index.php';
    </script>;
    "; 
}