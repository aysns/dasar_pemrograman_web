<?php 
//MENGHUBUNGKAN DENGAN FUNCTIONS PHP
require 'functions.php';

//mahasiswa isinya adalah fungsi query dengan parameter sbb
$mahasiswa = query("SELECT * FROM mahasiswa");

//ketika tombol cari di klik
if(isset($_POST['cari'])){
  $mahasiswa = cari($_POST['keyword']);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>
<body>
  <h3>Dafar Mahasiswa</h3>
  <a href="tambah.php">Tambah Data Mahasiswa</a>
  <br><br>

  <!-- post : data tidak terlihat di url -->
  <form action="" method="POST">
      <input type="text" name="keyword" size="40" placeholder="masukkan keyword pencarian.." autocomplete="off" autofocus> 
      <button type="submit" name="cari">Cari</button>
  </form>
  <br>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>

    <?php if(empty($mahasiswa)) : ?>
    <tr>
      <td colspan="4"><p style="color:red; font-style:italic;">Data mahasiswa tidak ditemukan</p></td>
    </tr>
    <?php endif; ?>

    <?php $i =1;
    foreach($mahasiswa as $mhs) : ?>
    <tr>
      <td><?= $i++; ?></td>
      <td><img src="img/<?= $mhs['gambar']; ?> " width="60"></td>
      <td><?= $mhs['nama']; ?></td>
      <td>
        <a href="detail.php?id=<?= $mhs['id']; ?>">lihat detail</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>