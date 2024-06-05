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
    <div class="content">
        <h2>Data Pengajuan</h2>
        <div class="mb-3">
        <button type="button" class="btn btn-primary"> Tambah Pengajuan </button>
        </div>
        <table>
            <tr>
                <th> Nama </th>
                <th> Tanggal Pengajuan</th>
                <th> Status Pengajuan </th>
                <th> Sisa Cuti </th>
                <th> Detail Informasi </th>
            </tr>
            <?php
            // Mengambil data produk dari database
            require_once 'config.php';

            $sql = "SELECT * FROM tabel_cuti_kry
                    INNER JOIN tabel_karyawan on tabel_cuti_kry.NIK = tabel_karyawan.NIK
                    INNER JOIN tabel_karyawan on tabel_cuti_kry.NIK = tabel_karyawan.NIK";
                    
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["nama_karyawan"] . "</td>";
                    echo "<td>" . $row["tgl_pengajuan"] . "</td>";
                    echo "<td>" . $row["sisa_cuti"] . "</td>";
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