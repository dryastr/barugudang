<?php
require_once 'config.php';

// Pastikan form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir
    $kode_color = $_POST['kode_color'];
    $nama_color = $_POST['nama_color'];

    // Query untuk menyimpan data ke dalam database
    $query = "INSERT INTO color (kode_color, nama_color) VALUES ('$kode_color', '$nama_color')";

    // Jalankan query
    if (mysqli_query($conn, $query)) {
        // Jika berhasil disimpan, redirect ke halaman form_simpan.php
        header("Location: formcolor.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>