<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Data Produk</title>
<style>
    /* content tabel */
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
    /* sidebar */
    
</style>
</head>
<body>
    <?php //require_once 'menu.php'; ?> 
    <div class="content">
        <h2>Bahan 6 Bulan</h2>
        <div class="mb-3">
        <a href="kartumasuk.php"><button type="button" class="btn btn-primary">kembali</button></a>
        </div>
        <table>
            <tr>
                <th> Kode Masuk</th>
                <th> Kode Detail Masuk</th>
                <th>Tanggal Masuk</th>
                <th>Nama Buyer</th>
                <th>Nama Artikel</th>
                <th>Nama Supplier</th>
                <th>No Invoice</th>
                <th>No PO</th>
                <th>QTY Masuk</th>
                <th>No Roll</th>
                <th>Nama Color</th>
                <th>Nama Rak</th>
                <th>Nama Slot</th>
                <th>Nama Admin</th>
                <!-- <th>Nama Slot</th> -->
            </tr>
            
            <?php
            // Mengambil data produk dari database
            require_once 'config.php';

            $sql = "SELECT * FROM vkartumasuk WHERE tgl_masuk <= DATE_SUB(NOW(), INTERVAL 6 MONTH)";
       
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["kode_masuk"] . "</td>";
                    echo "<td>" . $row["kode_detailmsk"] . "</td>";
                    echo "<td>" . $row["tgl_masuk"] . "</td>";
                    echo "<td>" . $row["nama_buyer"] . "</td>";
                    echo "<td>" . $row["nama_artikel"] . "</td>";
                    echo "<td>" . $row["nama_color"] . "</td>";
                    echo "<td>" . $row["nama_supplier"] . "</td>";
                    echo "<td>" . $row["no_invoice"] . "</td>";
                    echo "<td>" . $row["no_po"] . "</td>";
                    echo "<td>" . $row["no_roll"] . "</td>";
                    echo "<td>" . $row["qty_masuk"] . "</td>";
                    echo "<td>" . $row["no_roll"] . "</td>";
                    echo "<td>" . $row["nama_rak"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data produk.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>