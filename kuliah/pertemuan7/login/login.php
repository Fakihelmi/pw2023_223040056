<?php
// cek apakah tombol submit sudah tekan atau belum
if (isset($_POST["Submit"])) {
    // cek username & password
    if ($_POST["Username"] == "Admin" && $_POST["Password"] == "123") {
        // Jika benar, redirect ke halaman admin
        header("Location: admin.php");
        exit;
    } else {
        // jika salah tampilkan pesan error
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login Admin</h1>
    <?php if (isset($error)) : ?>
        <p>username / password salah </p>
    <?php endif; ?>
    <ul>
        <form action="" method="post">
            <li>
                <label for="Username">Username : </label>
                <input type="text" name="Username" id="Username">
            </li>
            <li>
                <label for="Password">Password : </label>
                <input type="Password" name="Password" id="Password">
            </li>
            <li>
                <button type="submit" name="Submit">
                    Login
                </button>
            </li>
        </form>
    </ul>

</body>

</html>