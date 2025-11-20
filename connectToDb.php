<?php

$db = mysqli_connect("localhost", "root", "", "perpustakaan");

if (!$db) {
    die("koneksi gagal");
}