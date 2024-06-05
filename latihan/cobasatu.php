<?php
session_start();
include 'config.php'; // File untuk koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Konversi nama menjadi kode
    $kode_buyer = getKode($conn, "buyer", "nama_buyer", $nama_buyer);
    $kode_color = getKode($conn, "color", "nama_color", $nama_color);
    $kode_artikel = getKode($conn, "artikel", "nama_artikel", $nama_artikel);
    $kode_supplier = getKode($conn, "supplier", "nama_supplier", $nama_supplier);
  

    // Simpan data ke sesi
    $_SESSION['data_masuk'] = [
      'kode_masuk' => $_POST['kode_masuk'],
        'kode_masuk' => $kode_masuk,
        'kode_buyer' => $kode_buyer,
        'kode_color' => $kode_color,
        'kode_artikel' => $kode_artikel,
        'tgl_masuk' => $_POST['tgl_masuk'],
        'unit' => $_POST['unit'],
        'kode_supplier' => $kode_supplier,
        'no_invoice' => $_POST['no_invoice'],
        'no_po' => $_POST['no_po'],
        'lot' => $_POST['lot'],
    ];
    header('Location: cobadua.php');
    exit();
}

    // Fungsi untuk mengambil kode berdasarkan nama dari tabel tertentu
    function getKode($conn, $table, $column_name, $name) {
        $query = "SELECT kode_$table FROM $table WHERE $column_name = '$name'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row["kode_$table"];
        } else {
            return null;
        }
    }
?>

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sesi Pertama - Pendataan Masuk</title>
</head>
<body>
    <form method="POST">
        <!-- Form input untuk data masuk -->
        <label>Kode Buyer:</label><input type="text" name="kode_buyer" required><br>
        <label>Kode Color:</label><input type="text" name="kode_color" required><br>
        <label>Kode Artikel:</label><input type="text" name="kode_artikel" required><br>
        <label>Tanggal Masuk:</label><input type="date" name="tgl_masuk" required><br>
        <label>Unit:</label><input type="text" name="unit" required><br>
        <label>Kode Supplier:</label><input type="text" name="kode_supplier" required><br>
        <label>No Invoice:</label><input type="text" name="no_invoice" required><br>
        <label>No PO:</label><input type="text" name="no_po" required><br>
        <label>Lot:</label><input type="text" name="lot" required><br>
        <button type="submit" name="next">Selanjutnya</button>
    </form>
</body>
</html>
