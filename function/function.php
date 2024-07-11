<?php
require_once "connect.php";

//function query($query)
//{
//    global $db;
//    try {
//        $statement = $db->query($query);
//        return $statement->fetchAll();
//    } catch (PDOException $e) {
//        die("Query tidak berhasil: " . $e->getMessage());
//    }
//}

function upload($destinationDir)
{
    //pastikan direktiri target ada
    if (!is_dir($destinationDir)) {
        mkdir($destinationDir, 0777, true);
    }
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        return false;  // Tidak ada file yang diupload
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));

    if (!in_array($extensiGambar, $ekstensiGambarValid)) {
        return false;
    }

    if ($ukuranFile > 2500000) {
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.' . $extensiGambar;

    if (move_uploaded_file($tmpName, $destinationDir . $namaFileBaru)) {
        return $namaFileBaru;
    } else {
        return false;
    }
}

function uploadFile($destinationDir)
{
    // Pastikan direktori target ada
    if (!is_dir($destinationDir)) {
        mkdir($destinationDir, 0777, true);
    }

    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpName = $_FILES['file']['tmp_name'];

    if ($error === 4) {
        return false;  // Tidak ada file yang diupload
    }

    $ekstensiFileValid = ['pdf', 'doc', 'docx', 'xls', 'xlsx'];
    $extensiFile = explode('.', $namaFile);
    $extensiFile = strtolower(end($extensiFile));

    if (!in_array($extensiFile, $ekstensiFileValid)) {
        return false;
    }

    if ($ukuranFile > 10000000) { // Batas ukuran file 10MB
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.' . $extensiFile;

    if (move_uploaded_file($tmpName, $destinationDir . $namaFileBaru)) {
        return $namaFileBaru;
    } else {
        return false;
    }
}
