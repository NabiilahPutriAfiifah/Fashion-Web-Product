<?php
require_once("function.php");
if (isset($_POST['submit'])) {
    if (update($_POST) > 0) {
        echo "<script>
            alert('Input Success')
            document.location.href = 'read.php';
        </script>";
    } else {
        echo "<script>
            alert('Input Failed')
            document.location.href = 'create.php';
        </script>";
    }
} else {
    $id = $_GET['id'];
    $script = "SELECT * FROM fashion WHERE id = '$id'";
    $query = mysqli_query($conn, $script);
    $data = mysqli_fetch_assoc($query);
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
            <h1>Edit Product Fashion</h1>
        </div>
        <h6 style="margin-top: 20px;">Input your fashion data in input coloumn</h6>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label class="my-3">Name</label>
                <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>">
            </div>
            <div class="form-group d-flex flex-column">
                <label class="my-3">Image</label>
                <img src="upload/<?= $data['foto'] ?>" alt="" width="200" class="my-5">
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="form-group mt-4">
                <label> Category </label>
                <select name="kategori" class="form-select" required>
                    <option disabled selected>Select kategori</option>
                    <option value="T-Shirt">T-Shirt</option>
                    <option value="Jeans">Jeans</option>
                    <option value="Suits">Suits</option>
                    <option value="Vest">Vest</option>
                    <option value="Accesories">Accesories</option>
                </select>
            </div>
            <div class="form-group">
                <label class="my-3">Price</label>
                <input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>">
            </div>
            <div class="form-group">
                <label class="my-3">Description</label>
                <textarea name="deskripsi" class="form-control" cols="30" rows="10"><?= $data['deskripsi'] ?></textarea>
            </div>
            <input type="hidden" name="currPhoto" value="<?= $data['foto']; ?>">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <input type="submit" class="btn btn-primary mt-4" name="submit" value="update">
            <a href="read.php" class="btn btn-primary mt-4">Cancel</a>
        </form>
        <br><br><br>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>