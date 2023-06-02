<?php
require '../php/functions.php';

if (isset($_POST["register"])) {

  if (registrasi($_POST) > 0) {
    echo "<script>
            alert('Berhasil ditambahkan');
            window.location = 'login.php';
          </script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <!--  -->
  <link rel="stylesheet" href="../css/login-register/register.css" />
  <link rel="stylesheet" href="../css/login-register/responsive-login.css" />
</head>

<div class="card card-login">
  <form action="" method="post">
    <!--  -->
    <div class="mb-3">
      <label for="nama_lengkap" class="form-label">Nama lengkap</label>
      <input type="text" class="form-control" name="nama_lengkap" aria-describedby="emailHelp" placeholder="Masukkan nama lengkap anda" />
    </div>
    <!--  -->
    <div class="mb-3">
      <label for="nomor_hp" class="form-label">Nomer Handphone</label>
      <input type="text" class="form-control" name="nomor_hp" aria-describedby="emailHelp" placeholder="Masukkan nomer hp anda" />
    </div>
    <!--  -->
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
    <div class="mb-3">
      <label for="password2" class="form-label">Konfirmasi Password</label>
      <input type="text" class="form-control" name="password2" placeholder="Masukkan password anda" />
    </div>
    <!--  -->
    <button type="submit" name="register" class="btn btn-primary">Kirim</button>
    <!--  -->
    <div class="register text-center mt-5">
      <p>
        Sudah memiliki akun ?<a class="text-decoration-none" href="login.php">
          Login</a>
      </p>
    </div>
  </form>
</div>

<body>
  <!-- Script Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>