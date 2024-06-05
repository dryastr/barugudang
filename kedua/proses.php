<?php
// Pastikan form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai kode masuk dari form
    $kode_masuk = $_POST['kode_masuk'];

    // Lakukan sesuai kebutuhan (misalnya, simpan ke database, dll.)
    // Contoh:
    // $koneksi = mysqli_connect("localhost", "username", "password", "nama_database");
    // $query = "INSERT INTO masuk (kode_masuk) VALUES ('$kode_masuk')";
    // $result = mysqli_query($koneksi, $query);
    
    // Tampilkan pesan sukses atau redirect ke halaman lain
    echo "Kode masuk berhasil ditambahkan: " . $kode_masuk;
} else {
    // Jika tidak disubmit, redirect ke halaman formmasuk.php
    header("Location: latid.php");
    exit();
}
?>
