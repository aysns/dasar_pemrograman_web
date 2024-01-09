<?php 

function koneksi(){
  return mysqli_connect('localhost','root','','dbwebdasar');
}

function query($query){
  $conn = koneksi();
  $result = mysqli_query($conn,$query);

  //jika hasilnya hanya 1 data
  if(mysqli_num_rows($result)==1){
    return mysqli_fetch_assoc($result);
  }

  $rows = [];

  while($row = mysqli_fetch_assoc($result))
  {
  $rows[] = $row;
  }

  return $rows;

}

//dikirim post diterima data

function tambah($data){

  $conn = koneksi();

  //htmlspecialchars utk ngecek apakah data yg dimasukin user ada elemennya < enggak biar elemen itu gak berubah jadi html

  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO
              mahasiswa
            VALUES
            (null,'$nama', '$nrp', '$email', '$jurusan', '$gambar');
            ";

  mysqli_query($conn,$query);

  //untuk ngasi tau ke mysql nya bahwa ada baris yang brubah di database, entah itu nambah, kurang atau ngehapus
  //kode dibawah menghasikn angka kl angkanya 1 berarti ada yg ditambah/dihapus, kl 0 berarti gadak berubah, kalo -1 berarti error
  return mysqli_affected_rows($conn);
  //biar tau salahnya dimana
  echo mysqli_error($conn);
  //mysqli membutuhkan 2 param yaitu koneksi dan query nya
}

function hapus($id){
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data){

  $conn = koneksi();

  //htmlspecialchars utk ngecek apakah data yg dimasukin user ada elemennya < enggak biar elemen itu gak berubah jadi html
  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "UPDATE mahasiswa SET
              nama = '$nama',
              nrp = '$nrp',
              email = '$email',
              jurusan = '$jurusan',
              gambar = '$gambar'
            WHERE id = $id";

  mysqli_query($conn,$query);

  //untuk ngasi tau ke mysql nya bahwa ada baris yang brubah di database, entah itu nambah, kurang atau ngehapus
  //kode dibawah menghasikn angka kl angkanya 1 berarti ada yg ditambah/dihapus, kl 0 berarti gadak berubah, kalo -1 berarti error
  return mysqli_affected_rows($conn);
  //biar tau salahnya dimana
  echo mysqli_error($conn);
  //mysqli membutuhkan 2 param yaitu koneksi dan query nya
}
?>