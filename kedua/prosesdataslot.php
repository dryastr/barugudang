<?php
require_once 'config.php';

// Pastikan form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir
    $kode_slot = $_POST['kode_slot'];
    $nama_rak = $_POST['nama_rak'];

    // Query untuk mendapatkan kode_rak berdasarkan nama_rak
    $query = "SELECT kode_rak FROM rak WHERE nama_rak = '$nama_rak'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Jika rak ditemukan, ambil kode_rak
        $row = mysqli_fetch_assoc($result);
        $kode_rak = $row['kode_rak'];

        // Query untuk menyimpan data ke dalam tabel slot
        $query_insert = "INSERT INTO slotbaru (kodeslot, kode_rak) VALUES ('$kode_slot', '$kode_rak')";

        // Jalankan query
        if (mysqli_query($conn, $query_insert)) {
            echo "Data berhasil disimpan.";
        } else {
            echo "Error: " . $query_insert . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Nama rak tidak ditemukan dalam database.";
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>