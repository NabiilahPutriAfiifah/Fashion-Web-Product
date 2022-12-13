<?php
require_once("function.php");

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    delete($id);
    echo "
    <script>
        alert('Remove Success')
        document.location.href='read.php'
    </script>
    ";
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
            <h1>Fashion</h1>
        </div>
        <h4 class="mt-5 d-flex justify-content-center">You sure want delete this product</h4>

        <center>
            <form action="" method="post">
                <button type="submit" name="submit" class="btn btn-outline-light me-1">Yes</button>
                <a href="read.php" class="btn btn-outline-light me-1">No</a>
            </form>
        </center>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>