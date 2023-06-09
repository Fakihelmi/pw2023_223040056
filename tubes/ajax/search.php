<?php
require '../php/functions.php';
$keyword = $_GET['keyword'];
$query = "SELECT * FROM user WHERE nama_lengkap LIKE '%$keyword%' OR username LIKE '%$keyword%'  OR nomor_hp LIKE '%$keyword%'";
$Tampil = query($query);
$i = 1;
?>

<?php if ($Tampil) : ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Username</th>
                <th scope="col">Nomor HP</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Tampil as $t) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $t['nama_lengkap']; ?></td>
                    <td><?= $t['username']; ?></td>
                    <td><?= $t['nomor_hp']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else :  ?>
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-danger" role="alert">
                Student not found!
            </div>
        </div>
    </div>
<?php endif; ?>