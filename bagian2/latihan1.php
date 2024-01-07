<?php 
//KONEKSI KE DATABASE & PILIH DATABASE 
$conn = mysqli_connect('localhost','root','','dbwebdasar');

//QUERY KE TABEL MAHASISWA
$result = mysqli_query($conn,"SELECT * FROM mahasiswa");
// var_dump($result); melihat isi variabel

//UBAH DATA KE DALAM ARRAY
// $row = mysqli_fetch_row($result); array numerik
// $row = mysqli_fetch_assoc($result); array associative tiap tiap key nya ngambil nama field dari database
// $row = mysqli_fetch_array($result); keduanya

//SELAMA MASIH ADA DATANYA LAKUKAN LOOPING
$rows = []; //array ini kosong, dan isinya nanti adalah yg berada di dalam variabel row
while($row = mysqli_fetch_assoc($result)){
  // echo $row['nama'];
  $rows[] = $row;
}

//TAMPUNG KE VARIABEL MAHASISWA
$mahasiswa = $rows;

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

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>NRP</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
      <th>Aksi</th>
    </tr>

    <?php $i =1;
    foreach($mahasiswa as $mhs) : ?>
    <tr>
      <td><?= $i++; ?></td>
      <td><img src="img/<?= $mhs['gambar']; ?> " width="60"></td>
      <td><?= $mhs['nrp']; ?></td>
      <td><?= $mhs['nama']; ?></td>
      <td><?= $mhs['email']; ?></td>
      <td><?= $mhs['jurusan']; ?></td>
      <td>
        <a href="">ubah</a> | <a href="">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>