<?php
// Koneksi database
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "", "tubes_223040056");

    return $conn;
}

// Fungsi array
function query($sql)
{
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi registrasi
function registrasi($data)
{
    $conn = koneksi();

    $nama_lengkap = mysqli_real_escape_string($conn, $data["nama_lengkap"]);
    $nomor_hp = mysqli_real_escape_string($conn, $data["nomor_hp"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek ketersediaan username
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar')
              </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai)
              </script>";
        return false;
    }

    // enkripsi password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES(null,'$nama_lengkap','$nomor_hp','$username', '$password', 'user')");

    return mysqli_affected_rows($conn);
}
