<?php
session_start();
include 'config.php'; // Pastikan Anda telah membuat koneksi database

// Menangani pengiriman formulir
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $kode_masuk = $_GET['kode_masuk'];
    $nama_rak = $_POST['nama_rak'];
    $nama_slot = $_POST['nama_slot'];

    if ($conn) {
        // Simpan data ke tabel rak (pastikan tabel ini sudah ada)
        $query = "INSERT INTO rak (nama_rak) VALUES ('$nama_rak') ON DUPLICATE KEY UPDATE nama_rak='$nama_rak'";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "Error: " . mysqli_error($conn);
        }

        // Simpan data ke tabel slot (pastikan tabel ini sudah ada)
        $query = "INSERT INTO slot (nama_slot) VALUES ('$nama_slot') ON DUPLICATE KEY UPDATE nama_slot='$nama_slot'";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "Error: " . mysqli_error($conn);
        }

        // Simpan data ke tabel detail_masuk
        if (isset($_SESSION['data_detail_masuk'])) {
            foreach ($_SESSION['data_detail_masuk'] as $detail) {
                $no_roll = $detail['no_roll'];
                $qty_masuk = $detail['qty_masuk'];

                // Mendapatkan kode_rak dari nama_rak
                $query = "SELECT kode_rak FROM rak WHERE nama_rak = '$nama_rak'";
                $result = mysqli_query($conn, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $kode_rak = $row['kode_rak'];

                    // Mendapatkan kode_slot dari nama_slot
                    $query = "SELECT kode_slot FROM slot WHERE nama_slot = '$nama_slot'";
                    $result = mysqli_query($conn, $query);
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $kode_slot = $row['kode_slot'];

                        // Menyimpan detail roll ke dalam database
                        $query = "INSERT INTO detail_masuk (kode_masuk, no_roll, qty_masuk, kode_rak, kode_slot) VALUES ('$kode_masuk', '$no_roll', '$qty_masuk', '$kode_rak', '$kode_slot')";
                        $result = mysqli_query($conn, $query);

                        if (!$result) {
                            echo "Error: " . mysqli_error($conn);
                        }
                    } else {
                        echo "Kode slot tidak ditemukan.";
                    }
                } else {
                    echo "Kode rak tidak ditemukan.";
                }
            }
        }

        // Hapus data dari sesi
        unset($_SESSION['data_detail_masuk']);

        echo "Data telah berhasil disimpan.";
    } else {
        echo "Koneksi ke database gagal.";
    }
}
?>


<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="msktiga.css">
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
        <div class="progress-bar bg-success" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
        <div class="progress-bar bg-success" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo">
                    <i class='bx bx-layer nav_logo-icon'></i>
                    <span class="nav_logo-name">BBBootstrap</span>
                </a>
                <div class="nav_list">
                    <a href="dashboard.php" class="nav_link active">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="kartumasuk.php" class="nav_link">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Kartu Masuk</span>
                    </a>
                    <a href="kartukeluar.php" class="nav_link">
                        <i class='bx bx-message-square-detail nav_icon'></i>
                        <span class="nav_name">Kartu Keluar</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='bx bx-home nav_icon'></i>
                        <span class="nav_name">Barang 6 bulan</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='bx bx-folder nav_icon'></i>
                        <span class="nav_name">Files</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                        <span class="nav_name">Stats</span>
                    </a>
                </div>
            </div>
            <a href="#" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name"></span>
            </a>
        </nav>
    </div>

    <!--Container Main start-->
    <div class="height-100 bg-light">
        <div class="w3-twothird">
            <div class="w3-container w3-card w3-white w3-margin-bottom" style="margin: 30px">
                <h2 class="w3-text-grey w3-padding-16">KARTU STOK MASUK</h2>
                <div class="w3-container">
                    <h5 class="w3-opacity"><b>Isikan data di bawah ini dengan benar</b></h5>
                    <form method="post">
                        <label for="nama_rak">Nama Rak</label>
                        <select id="nama_rak" name="nama_rak" required>
                            <option value="" disabled selected>Pilih Nama Rak</option>
                            <?php
                            $query = "SELECT nama_rak FROM rak";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['nama_rak'] . '">' . $row['nama_rak'] . '</option>';
                            }
                            ?>
                        </select>

                        <label for="nama_slot">Slot</label>
                        <select id="nama_slot" name="nama_slot" required>
                            <option value="" disabled selected>Pilih Slot</option>
                            <?php
                            $query = "SELECT * FROM slot";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['nama_slot'] . '">' . $row['kode_slot'] . ' - ' . $row['nama_slot'] . '</option>';
                            }
                            ?>
                        </select>

                        <br>
                        <div class="mb-3">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Container Main end-->

    <script src="msktiga.js"></script>
</body>
</html>
