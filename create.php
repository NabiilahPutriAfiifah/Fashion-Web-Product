<?php
require_once("function.php");
if (isset($_POST['submit'])) {
    if (insert($_POST) > 0) {
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
            <h1>Create Product Fashion</h1>
        </div>
        <h6 style="margin-top: 20px;">Input your fashion data in input coloumn</h6>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="nama" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="foto" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
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
                <label>Price</label>
                <input type="number" name="harga" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="deskripsi" class="form-control" cols="30" rows="10"></textarea>
            </div>

            <input type="submit" class="btn btn-primary mt-4" name="submit" value="Upload">

            <a href="read.php" class="btn btn-primary mt-4">Cancel</a>
        </form>
    </div>
    <br><br><br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>