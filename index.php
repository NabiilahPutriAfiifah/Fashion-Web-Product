<?php require "koneksi.php";

//inisialisasi session
session_start();


// mengecek username pada session
if (!isset($_SESSION["username"])) {
    $_SESSION['msg'] = 'Anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}

// $fashion = getter("SELECT * FROM fashion");

// $jumlahdata = count($fashion);
// $batas = 3;
// $banyaknyahalaman = ceil($jumlahdata / $batas);

// $halaman = 1;
// if (isset($_GET['halaman'])) {
//     $halaman = $_GET['halaman'];
// }

// $posisi = ($halaman - 1) * $batas;

// if (isset($_POST['cari'])) {
//     if (search($_POST['search']) > 0) {
//         $fashion = search($_POST['search']);
//     } else {
//         $fashion = getter("SELECT * FROM fashion LIMIT $posisi,$batas");
//     }
// } else {
//     $fashion = getter("SELECT * FROM fashion LIMIT $posisi,$batas");
// }
?>


<!DOCTYPE html>
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
        <div class="header d-flex justify-content-between align-items-center">
            <h1>Fashion Product</h1>
            <div>
                <a href="grafik.php" class="btn btn-outline-light me-1">Chart</a>
                <a href="logout.php" class="btn btn-outline-light me-1">Log Out</a>
            </div>

        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <center>
        <font face="Courier New" color="white" size="20"> SELAMAT DATANG </font><br>
        <img src="img/Fashion.jpg" alt="Logo" style="width:400px;">
    </center>
    <center>
        <font face="Courier New" color="black" size="3"> Think different Think thrift </font>
    </center> <br>

    <center><a href="read.php" type="submit" class="btn btn-outline-light me-1">Start View Product</a></center>

    <br><br><br><br>
    <div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-5">
                    <h1 class="display-4">Fashion</h1>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae temporibus enim sunt
                        quas. Dolor accusamus nostrum iusto ratione expedita eos consectetur alias minima, placeat,
                        nihil maiores velit vitae ex dignissimos?</p>
                </div>
                <div class="col-4" style="width: auto;">
                    <img src="img/Fashion.jpg" alt="" width="300px">
                </div>
            </div>
        </div>
    </div>
    <br>



    <br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>