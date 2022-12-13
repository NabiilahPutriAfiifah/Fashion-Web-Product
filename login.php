<?php
//menyertakan file koneksi.php
require('koneksi.php');
//inisialisasi session
session_start();

$error = '';
$validate = '';

//mengecek apakah session username tersedia atau tidak
if (isset($_SESSION['username'])) header('Location:index.php');

//mengecek apakah form disubmit atau tidak
if (isset($_POST['submit'])) {
    //menghilangkan backslash
    $username = stripslashes($_POST['username']);
    //cara sederhana mengamankan dari sql injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $captcha = $_POST['inputcaptcha'];

    if (!empty(trim($username)) && !empty(trim($password))) {
        // select data berdasarkan username dari database
        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);

        if ($rows != 0) {
            $hash = mysqli_fetch_assoc($result)['password'];
            if (password_verify($password, $hash)) {
                if ($_SESSION['code'] != $captcha) {
                    $error = 'kode captcha salah';
                } else { // jika captcha benar, maka perintah yang bawah akan dijalankan
                    $_SESSION['username'] = $username;
                    echo "
                        <script>
                            alert('Selamat Datang')
                            document.location.href = 'index.php'
                        </script>
                    ";
                    // header('Location: index.php');
                }
            } else {
                $error = 'Password salah !!';
            }
            //jika gagal maka akan menampilkan pesan error
        } else {
            $error = 'Username tidak di temukan !!';
        }
    } else {
        $error = 'Data tidak boleh kosong !!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>register</title>
</head>

<body background="img/bgblack2.jpg">
    <section class="container=fluid mb-4">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 com-md-4">
                <form class="form-container formlogin mt-5" action="login.php" method="POST">
                    <h4 class="text-center font-weight-bold">Sign-in</h4>
                    <?php if ($error != '') { ?>
                    <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="Masukan Username">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="password"
                            placeholder="Password">
                        <?php if ($validate != '') { ?>
                        <p class="text-danger"><?= $validate; ?></p>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label for="kodecaptcha" class="d-block">Kode Captcha</label>
                        <img src="captcha.php" alt="kode Captcha" class="mb-3" id="kodecaptcha">
                        <input type="text" class="form-control" id="in putcaptcha" name="inputcaptcha" required
                            autocomplete="">
                    </div>
                    <button type="submit" name="submit" class="btn btn-outline-light me-1 btn-block">Sign-In</button>
                    <div class="form-footer mt-2">
                        <p>Belum punya account? <a href="register.php">Register</a></p>
                    </div>
                </form>
            </section>
        </section>
    </section>





    <!-- Booststrap requirment jQuery pada posisi pertama, kemudian popper.js dan yang terkahir bootstrap js-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYD1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>