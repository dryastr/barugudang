<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title> Detail Penjualan </title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #007bff;
        color: #fff;
    }
</style>
</head>
<body>
<div class="content">
    <h2> Detail Penjualan </h2>
<?php
// Ambil nomor struk dari parameter GET
$kode_masuk = $_GET['id']; // Ubah 'No_Struk' menjadi 'id'

// Ambil data detail penjualan dari database berdasarkan nomor struk
require_once 'config.php';

// Query untuk mengambil data detail masuk berdasarkan kode masuk
$query = "SELECT dm.*, r.nama_rak, s.nama_slot
FROM detail_masuk dm
INNER JOIN rak r ON dm.kode_rak = r.kode_rak
INNER JOIN slot s ON dm.kode_slot = s.kode_slot
WHERE dm.kode_masuk = '$kode_masuk'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>
    <th>Kode Masuk</th>
    <th>No Roll</th>
    <th>Qty Masuk</th>
    <th>Nama Rak</th>
    <th>Nama Slot</th>
        </tr>";

        while ($row = $result->fetch_assoc()) {
            $kode_masuk = $row["kode_masuk"];
            $no_roll = $row["no_roll"];
            $qty_masuk = $row["qty_masuk"];
            $nama_rak = $row["nama_rak"];
            $nama_slot = $row["nama_slot"];
    
            echo "<tr>";
            echo "<td>$kode_masuk</td>";
            echo "<td>$no_roll</td>";
            echo "<td>$qty_masuk</td>";
            echo "<td>$nama_rak</td>";
            echo "<td>$nama_slot</td>";
            echo "</tr>";
        }

    echo "</table>";
} else {
    echo "Tidak ada detail penjualan untuk nomor struk tersebut.";
}

$conn->close();
?>

</div>
</body>
</html>