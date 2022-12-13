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
    <?php
    // menyertakan file program koneksi.php kepada register
    require('koneksi.php');

    //inisialisasi session
    session_start();

    $error = '';
    $validate = '';

    if (isset($_SESSION['user'])) header('location:index.php');

    //mengecek apakah data username yang di input kosong atau tidak
    if (isset($_POST['submit'])) {
        //menghilangkan backslash
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan dari sql injection
        $username = mysqli_real_escape_string($conn, $username);
        $name = stripslashes($_POST['name']);
        $name = mysqli_real_escape_string($conn, $name);
        $email = stripslashes($_POST['email']);
        $email = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $repass = stripslashes($_POST['repassword']);
        $repass = mysqli_real_escape_string($conn, $repass);

        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if (!empty(trim($name)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))) {
            //mengecek apakah password sama dengan repassword yang diketikan
            if ($password == $repass) {
                //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar apa belum
                if (cek_nama($name, $conn) == 0) {
                    //hashing password sebelum disimpan di database
                    $pass = password_hash($password, PASSWORD_DEFAULT);
                    //insert data kedalam database
                    $query = "INSERT INTO user (name, username, email, password ) VALUES ('$name', '$username', '$email', '$pass')";
                    $result = mysqli_query($conn, $query);
                    //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
                    if ($result) {
                        $_SESSION['username'] = $username;
                        header('Location: index.php');

                        //jika gagal maka akan menampilkan pesar enror
                    } else {
                        $error = 'Register User Gagal !!';
                    }
                } else {
                    $error = 'Username Tidak Terdaftar !!';
                }
            } else {
                $validate = 'Password Tidak Sama !!';
            }
        } else {
            $error = 'Data Tidak Boleh Kosong !!';
        }
    }

    //fungsi untuk mengecek username apakah sudah terdaftar atau belum
    function cek_nama($username, $conn)
    {
        $nama = mysqli_real_escape_string($conn, $username);
        $query = "SELECT * FROM user WHERE username = '$nama'";
        if ($result = mysqli_query($conn, $query)) return mysqli_num_rows($result);
    }
    ?>

    <section class="container-fluid mb-4">
        <!-- justify-content-center untuk mengatur posisi form agar berada di tengah -->
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
                <form class="form-container" action="register.php" method="POST">
                    <h4 class="text-center font-weight-bold">Sign-Up</h4>
                    <?php if ($error != '') { ?>
                    <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>

                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Alamat Email</label>
                        <input type="text" class="form-control" id="inputEmail" name="email"
                            aria-describedby="emailHelp" placeholder="Masukan Email">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            aria-describedby="emailHelp" placeholder="Masukan Username">
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
                        <label for="inputPassword">Re-Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="repassword"
                            placeholder="Re-Password">
                        <?php if ($validate != '') { ?>
                        <p class="text-danger"><?= $validate; ?></p>
                        <?php } ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-outline-light me-1 btn-block">Register</button>
                    <div class="form-footer mt-2">
                        <p>Sudah punya account?</p> <a href="login.php">Login</a>
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