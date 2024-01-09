<?php 
require 'functions.php';

//jika tidak ada id di url
if (!isset($_GET['id'])){
  header("Location: index.php");
  exit;
}

//amnil id dari url
$id = $_GET['id'];

//query mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");

//cek apakah tombol ubah sudah ditekan
if(isset($_POST['ubah'])){
  if (ubah($_POST) > 0){
    echo "<script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
         </script>";
  } else {
    echo "data gagal diubah";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ubah Data Mahasiswa</title>
</head>
<body>
  <h3>Form ubah Data Mahasiswa</h3>
  <form action="" method="POST">
      <input type="hidden" name="id" value="<?= $mhs['id']; ?>"><!--inputannya gak keliatan-->
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" autofocus required value="<?= $mhs['nama']; ?>"> <!--required biar data tdk terkirim saat kosong, value untuk nampilin value datanya ke input di form-->
        </label>
      </li>
      <li>
        <label>
          NRP : 
          <input type="text" name="nrp" required value="<?= $mhs['nrp']; ?>">
        </label>
      </li>
      <li>
        <label>
          Email : 
          <input type="text" name="email" required value="<?= $mhs['email']; ?>">
        </label>
      </li>
      <li>
        <label>
          Jurusan : 
          <input type="text" name="jurusan" required value="<?= $mhs['jurusan']; ?>">
        </label>
      </li>
      <li>
        <label>
          Gambar :
          <input type="text" name="gambar" required value="<?= $mhs['gambar']; ?>">
        </label>
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data</button>
      </li>
    </ul>
  </form>
</body>
</html>

<!-- action pada form kosong apabila di submit mengembalikan ke halaman yang sama -->