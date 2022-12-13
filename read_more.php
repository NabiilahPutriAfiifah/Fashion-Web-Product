<?php
require_once("function.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $script = "SELECT * FROM fashion WHERE id = '$id'";
    $query = mysqli_query($conn, $script);
    $data = mysqli_fetch_assoc($query);
} else {
    header("location:read_more.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fashion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body background="img/bgblack2.jpg">
    <div class="container">
        <div class="header">
            <h1>Fashion Product</h1>
        </div>
        <div class="row mt-5">
            <div class="col-7">
                <img src="upload/<?= $data['foto'] ?>" width="60%" alt="">
            </div>
            <div class="col-4">
                <div class="box-detail-produk">
                    <h2 class="mb-5 border-bottom border-3 p-2">About Foods</h2>
                    <h3><?= $data['nama'] ?></h3>
                    <h5>Rp <?= number_format($data['harga']) ?></h5>
                    <h5>kategori : <?= $data['kategori']; ?></h5>
                    <p>Description : <?= $data['deskripsi'] ?></p>
                </div>
            </div>
            <a href="read.php" class="btn btn-secondary mt-3">back</a>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>