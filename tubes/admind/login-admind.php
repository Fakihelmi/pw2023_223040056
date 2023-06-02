<?php
session_start();

require '../php/functions.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $conn = koneksi();

    if ($username === "admind" && $password === "admind") {
        // set session
        $_SESSION["login"] = true;
        $_SESSION["user_id"] = "admind";

        // set cookie
        setcookie("username", $username, time() + 3600);

        header("location: dashboard.php");
        exit;
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!--  -->
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="../css/login-register/responsive-login.css" />
</head>

<body>
    <div class="card card-login">
        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder="Masukkan username anda" />
            </div>
            <!--  -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan password anda" />
            </div>
            <!--  -->
            <button class="btn btn-primary" type="submit" name="login">Masuk</button>
            <!--  -->
            <div class="register text-center mt-5">
                <p>
                    Belum memiliki akun ?<a class="text-decoration-none" href="register.php">
                        Daftar</a>
                </p>
                <p>Login sebagai <a href="../website/login.php">user</a></p>
            </div>
        </form>
    </div>
    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f697c7e8ed.js" crossorigin="anonymous"></script>
</body>

</html>