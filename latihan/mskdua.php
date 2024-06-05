<?php
include 'config.php';

// Menginisialisasi kode masuk yang akan ditampilkan
$display_kode_masuk = '';

// Query untuk mendapatkan kode masuk terbaru
$sql = "SELECT kode_masuk FROM masuk ORDER BY kode_masuk DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $display_kode_masuk = $row['kode_masuk'];
} else {
    echo "Error fetching data: " . mysqli_error($conn);
}

// Menangani pengiriman formulir
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menyimpan data masuk dari formulir
    $kode_masuk = $_POST['kode_masuk'];

    // Menambah roll
    if (isset($_POST['tambah_roll'])) {
        $no_roll = $_POST['no_roll'];
        $qty_masuk = $_POST['qty_masuk'];
        $kodeDetailMasuk = $_POST['kode_detailmsk'];
        $namaRak = $_POST['nama_rak'];
        $namaSlot = $_POST['nama_slot'];

        // Memastikan input tidak kosong
        if (!empty($no_roll) && !empty($qty_masuk) && !empty($kodeDetailMasuk) && !empty($namaRak) && !empty($namaSlot)) {
            // Mendapatkan kode_rak dari nama_rak
            $query = "SELECT kode_rak FROM rak WHERE nama_rak = '$namaRak'";
            $result = mysqli_query($conn, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $kode_rak = $row['kode_rak'];

                // Mendapatkan kode_slot dari nama_slot
                $query = "SELECT kode_slot FROM slot WHERE nama_slot = '$namaSlot'";
                $result = mysqli_query($conn, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $kode_slot = $row['kode_slot'];

                    // Menyimpan detail roll ke dalam database
                    $query = "INSERT INTO detail_masuk (kode_masuk, no_roll, qty_masuk, kode_rak, kode_slot, kode_detailmsk) VALUES ('$kode_masuk', '$no_roll', '$qty_masuk', '$kode_rak', '$kode_slot', '$kodeDetailMasuk')";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        echo "Data berhasil disimpan.";
                        header("Location: kartumasuk.php");
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                } else {
                    echo "Kode slot tidak ditemukan.";
                }
            } else {
                echo "Kode rak tidak ditemukan.";
            }
        } else {
            echo "Semua input harus diisi.";
        }
    }

    // Navigasi ke tahap 3
    if (isset($_POST['next'])) {
        header("Location: msktiga.php?kode_masuk=$kode_masuk");
        exit();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="mskdua.css">
    <script src="mskdua.js"></script>

</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
        <div class="progress-bar bg-success" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
        <div class="progress-bar bg-success" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo">
                    <i class='bx bx-layer nav_logo-icon'>

                    </i>
                    <span class="nav_logo-name">BBBootstrap</span> </a>
                <div class="nav_list"> <a href="#" class="nav_link active">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span> </a> <a href="#" class="nav_link">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Users</span> </a> <a href="#" class="nav_link">
                        <i class='bx bx-message-square-detail nav_icon'></i>
                        <span class="nav_name">Messages</span> </a> <a href="#" class="nav_link">
                        <i class='bx bx-home nav_icon'></i>
                        <span class="nav_name">Bookmark</span> </a> <a href="#" class="nav_link">
                        <i class='bx bx-folder nav_icon'></i>
                        <span class="nav_name">Files</span> </a> <a href="#" class="nav_link">
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                        <span class="nav_name">Stats</span> </a> </div>
            </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>

    <!--Container Main start-->
    <div class="height-100 bg-light">
        <?php
        //require_once 'menu.php'; 
        ?>

        <div class="w3-twothird">

            <div class="w3-container w3-card w3-white w3-margin-bottom" style="margin: 30px">
                <h2 class="w3-text-grey w3-padding-16">KARTU STOK MASUK</h2>
                <div class="w3-container">
                    <h5 class="w3-opacity"><b>isikan data dibawah ini dengan benar</b></h5>
                    <form method="POST">
                        <label for="kode_detailmsk" style="display: none;">Kode Detail Masuk:</label>
                        <?php
                        // Mendapatkan kode detail masuk berikutnya
                        $query = "SELECT kode_detailmsk FROM detail_masuk ORDER BY kode_detailmsk DESC LIMIT 1";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);
                        $next_code = $row['kode_detailmsk'] + 1;

                        echo '<input type="hidden" id="kode_detailmsk" name="kode_detailmsk" value="' . $next_code . '" readonly><br>';
                        ?>

                        <label for="kode_masuk">Kode Masuk:</label>
                        <input type="text" id="kode_masuk" name="kode_masuk" value="<?= $display_kode_masuk; ?>" readonly><br>

                        <!-- <label for="no_roll">No Roll:</label>
                        <input type="text" id="no_roll" name="no_roll" required><br><br> -->
                        <label for="no_roll">Roll:</label>
                        <select id="no_roll" name="no_roll" required>
                            <option value="" disabled selected>Pilih Roll</option>
                            <?php
                            $query = "SELECT no_roll FROM roll";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['no_roll'] . '">' . $row['no_roll'] . '</option>';
                            }
                            ?>
                        </select>

                        <label for="qty_masuk">QTY</label>
                        <input type="text" id="qty_masuk" name="qty_masuk" required>

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
                        
                        <button type="submit" name="tambah_roll">Tambah Roll</button>
                    </form>
                </div>
                <br><br>

                <!-- <form method="post">
                    <button type="submit" name="next">Selanjutnya</button>
                </form> -->
            </div>
        </div>