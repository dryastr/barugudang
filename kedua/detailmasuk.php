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
        <h2>Data Detail Kartu Masuk</h2>
        <div class="mb-3">
        <a href="kartumasuk.php"><button type="button" class="btn btn-primary">kembali</button></a>
        </div>
        <table>
            <tr>
                <th> Kode Detail </th>
                <th> Kode Masuk</th>
                <th>No Roll</th>
                <th>QTY Masuk</th>
                <th>Nama Rak</th>
                <!-- <th>Nama Slot</th> -->
            </tr>
            
            <?php
            // Mengambil data produk dari database
            require_once 'config.php';

            $sql = "SELECT * FROM detail_masuk
                    INNER JOIN rak on detail_masuk.kode_rak = rak.kode_rak";

                    
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["kode_detailmsk"] . "</td>";
                    echo "<td>" . $row["kode_masuk"] . "</td>";
                    echo "<td>" . $row["no_roll"] . "</td>";
                    echo "<td>" . $row["qty_masuk"] . "</td>";
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