<?php
require_once("koneksi.php");

$name = "";

function getter($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload()
{
    global $name;

    // Mengambil data dari gambar yang dikirim pada form
    // yang disimpan pada variabel superglobal $_FILES
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // Cek apakah ada file yang di upload
    if ($error === 4) {
        echo "
      <script>
         alert('Upload your Image!');
         document.location.href = 'create.php';
      </script> 
      ";
        return false;
    }

    // Cek ekstensi file yang dikirimkan apakah sesuai dengan yang diizinkan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
      <script>
         alert('HMM, Kamu salah upload file');
         document.location.href = 'read.php';
      </script> 
      ";
        return false;
    }

    // Cek ukuran file
    if ($ukuranFile > 3000000) {
        echo "
      <script>
         alert('Its a big file, send file under 3 MB');
         document.location.href = 'create.php';
      </script> 
      ";
        return false;
    }

    // Ubah Nama File untun menghindari adanya nama file yang sama
    $namaFileBaru = $name;
    $namaFileBaru .= "_" . uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // Pindahkan file ke dalam direktori yang diinginkan
    $dirpath = realpath(dirname(getcwd()));
    $dirpath .= '//Pertemuan 12//upload//';
    move_uploaded_file($tmpName, $dirpath . $namaFileBaru);

    // Kembalikan nama file baru
    return $namaFileBaru;
}

function insert($data)
{
    global $conn, $name;

    $nama = $data['nama'];
    $foto = upload();
    $harga = $data['harga'];
    $deskripsi = $data['deskripsi'];
    $kategori = $data['kategori'];

    $name = $nama;

    $query = "INSERT INTO fashion VALUES ('', '$kategori','$nama', '$harga', '$deskripsi', '$foto')";
    $sql = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function update($data)
{
    global $conn;

    $id = $data['id'];

    $nama = $data['nama'];
    $foto = $data['currPhoto'];
    $harga = $data['harga'];
    $kategori = $data['kategori'];
    $deskripsi = $data['deskripsi'];
    if ($_FILES['foto']['error'] === 0) {
        $foto = upload();
    }

    $query = "UPDATE fashion SET kategori = '$kategori', nama = '$nama', foto = '$foto', harga = '$harga', deskripsi = '$deskripsi' WHERE id = '$id'";
    $sql = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function delete($id)
{
    global $conn;

    $query = "DELETE FROM fashion WHERE id = '$id'";
    mysqli_query($conn, $query);
}

function search($keyword)
{
    $query = "SELECT * FROM fashion WHERE nama LIKE '%$keyword%' OR kategori LIKE '%$keyword%' ";
    return getter($query);
}

function countDataForChart()
{
    global $conn;
    // Membuat array tampungan untuk menampung data array kategori dan array jumlah tipe kategorinya
    $arr_tampung = [];
    // Membuat multidimensional array untuk kategori dan jumlah
    $arr_tampung[0] = $arr_tampung["kategori"] = [];
    $arr_tampung[1] = $arr_tampung["jumlah"] = [];

    // Mengambil data dari database dengan modifikasi tertentu untuk dapat posisi dengan jumlahnya
    $data = mysqli_query($conn, "SELECT kategori, COUNT(*) AS Jumlah FROM fashion GROUP BY kategori");

    // Mengisi array posisi dan jumlah
    while ($row = mysqli_fetch_assoc($data)) {
        $arr_tampung["kategori"][] = $row["kategori"];
        $arr_tampung["jumlah"][] = $row["Jumlah"];
    }

    // Melakukan return array

    return $arr_tampung;
}