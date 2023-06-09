<?php
$conn = mysqli_connect("localhost:3306", "root", "", "pw2023_223040056");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function tambah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form

    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);


    // upload gambar 
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // query insert data

    $query = "INSERT INTO mahasiswa
    VALUES
    (null, '$nrp', '$nama', '$email', '$jurusan', '$gambar')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{

    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang di upload
    if ($error === 4) {
        echo "<script>
        alert('Pilih gambar terlebih dahulu')
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar')
        </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranfile > 1000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar')
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap di upload
    // generate nama gambar baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'img/' . $namafilebaru);

    return $namafilebaru;
}


function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $id = ($data["id"]);
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarlama = htmlspecialchars($data["gambarlama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }
    // query insert data

    $query = "UPDATE mahasiswa SET

     nrp = '$nrp', 
     nama = '$nama', 
     email = '$email',
     jurusan = '$jurusan', 
     gambar = '$gambar'
     WHERE id = $id
     ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa
                WHERE 
            nama LIKE '%$keyword%' or
            nrp LIKE '%$keyword%' or
            email LIKE '%$keyword%' or
            jurusan LIKE '%$keyword%'
        ";
    return query($query);
}
