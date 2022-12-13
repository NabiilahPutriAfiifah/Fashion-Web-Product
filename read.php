<?php
require_once("function.php");

//inisialisasi session
session_start();

// mengecek username pada session
if (!isset($_SESSION["username"])) {
    $_SESSION['msg'] = 'Anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}

$fashion = getter("SELECT * FROM fashion");

$jumlahdata = count($fashion);
$batas = 3;
$banyaknyahalaman = ceil($jumlahdata / $batas);

$halaman = 1;
if (isset($_GET['halaman'])) {
    $halaman = $_GET['halaman'];
}

$posisi = ($halaman - 1) * $batas;

if (isset($_POST['cari'])) {
    if (search($_POST['search']) > 0) {
        $fashion = search($_POST['search']);
    } else {
        $fashion = getter("SELECT * FROM fashion LIMIT $posisi,$batas");
    }
} else {
    $fashion = getter("SELECT * FROM fashion LIMIT $posisi,$batas");
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

<body>
    <div class="container">
        <div class="header d-flex justify-content-between align-items-center">
            <h1>Fashion Product</h1>
            <form action="" method="post">
                <div class="input-group">
                    <div class="form-outline ms-2">
                        <input type="search" name="search" id="form1" placeholder="Search Your Fashion"
                            class="form-control" autofocus autocomplete="off" />
                    </div>
                    <input type="submit" class="btn btn-secondary" value="Search" name="cari">

                </div>
            </form>
            <div>
                <a href="create.php" class="btn btn-outline-light me-1">[+] Add Product Fashion</a>
                <a href="grafik.php" class="btn btn-outline-light me-1">Chart</a>
                <a href="index.php" class="btn btn-outline-light me-1">Home</a>
            </div>
        </div>
        <div class="row">
            <?php if (count($fashion) > 0) : ?>
            <?php foreach ($fashion as $product) : ?>
            <div class="col-md-4 my-3">
                <div class="card">
                    <img src="upload/<?= $product['foto']; ?>" class="card-img-top" alt="<?= $product['nama']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['nama']; ?></h5>
                        <h6 class="card-subtitle mb-2">Rp. <?= number_format($product['harga']) ?></h6>
                        <h6 class="card-subttitle mb-2">Kategori : <?= $product['kategori'] ?></h6>
                    </div>
                    <div class="card-body">
                        <a href="read_more.php?id=<?= $product['id']; ?>" class="btn btn-outline-light me-1">More</a>
                        <a href="edit.php?id=<?= $product['id']; ?>" class="btn btn-outline-light me-1">Edit</a>
                        <a href="delete.php?id=<?= $product['id']; ?>" class="btn btn-outline-light me-1">Remove</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else : ?>
            <p class="lead"><em>No Records were found</em></p>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                <nav aria-label="Page navigation example d">
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $banyaknyahalaman; $i++) : ?>
                        <?php if ($i == $halaman) : ?>
                        <li class="page-item"><a class="page-link active" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php else : ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php endif; ?>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>