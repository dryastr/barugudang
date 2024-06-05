<?php
  session_start();
  include 'config.php'; // File untuk koneksi database

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Mendapatkan data dari form
    $kode_masuk = $_POST['kode_masuk'];
    $nama_buyer = $_POST['nama_buyer'];
    $nama_color = $_POST['nama_color'];
    $nama_artikel = $_POST['nama_artikel'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $unit = $_POST['unit'];
    $nama_supplier = $_POST['nama_supplier'];
    $no_invoice = $_POST['no_invoice'];
    $no_po = $_POST['no_po'];
    $lot = $_POST['lot'];

    // Function to get kode by name
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

    // Konversi nama menjadi kode
    $kode_buyer = getKode($conn, "buyer", "nama_buyer", $nama_buyer);
    $kode_color = getKode($conn, "color", "nama_color", $nama_color);
    $kode_artikel = getKode($conn, "artikel", "nama_artikel", $nama_artikel);
    $kode_supplier = getKode($conn, "supplier", "nama_supplier", $nama_supplier);

    // Query SQL untuk menyimpan data ke tabel 'masuk'
    $sql = "INSERT INTO masuk (kode_masuk, kode_buyer, kode_color, kode_artikel, tgl_masuk, unit, kode_supplier, no_invoice, no_po, lot) 
            VALUES ('$kode_masuk', '$kode_buyer', '$kode_color', '$kode_artikel', '$tgl_masuk', '$unit', '$kode_supplier', '$no_invoice', '$no_po', '$lot')";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
      // Jika berhasil disimpan, simpan data ke session dan arahkan ke tahap dua
      $_SESSION['data_masuk'] = [
        'kode_masuk' => $kode_masuk,
        'kode_buyer' => $kode_buyer,
        'kode_color' => $kode_color,
        'kode_artikel' => $kode_artikel,
        'tgl_masuk' => $tgl_masuk,
        'unit' => $unit,
        'kode_supplier' => $kode_supplier,
        'no_invoice' => $no_invoice,
        'no_po' => $no_po,
        'lot' => $lot,
      ];
      header('Location: mskdua.php');
      exit();
    } else {
      // Jika terjadi kesalahan, tampilkan pesan error
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="formmsk.css">
    </head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav_logo"> 
                    <i class='bx bx-layer nav_logo-icon'></i> 
                    <span class="nav_logo-name">PT. GLOBALINDO INTIMATES</span> 
                </a>
                <div class="nav_list"> 
                    <a href="dashboard.php" class="nav_link active"><i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span></a> 
                    <a href="kartumasuk.php" class="nav_link"><i class='bx bx-user nav_icon'></i> <span class="nav_name">Kartu Masuk</span></a> 
                    <a href="kartukeluar.php" class="nav_link"><i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Kartu Keluar</span> </a> 
                    <a href="reminder.php" class="nav_link"><i class='bx bx-home nav_icon'></i> <span class="nav_name">Barang 6 bulan</span></a> 
                    <a href="#" class="nav_link"><i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a>
                    <a href="#" class="nav_link"><i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a> 
                </div>
            </div>
            <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
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
                        <label for="kode_masuk">Kode masuk:</label>
                        <?php
                        require_once 'config.php';
                        // Query untuk mendapatkan kode masuk terakhir
                        $query = "SELECT kode_masuk FROM masuk ORDER BY kode_masuk DESC LIMIT 1";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);
                        $next_code = $row ? $row['kode_masuk'] + 1 : 1; // Kode masuk berikutnya
                        // Menampilkan input kode masuk berikutnya
                        echo '<input type="text" id="kode_masuk" name="kode_masuk" value="' . $next_code . '" readonly><br>';
                        ?>

                        <label for="nama_buyer">Nama Buyer:</label>
                        <select id="nama_buyer" name="nama_buyer" required>
                            <option value="" disabled selected>Pilih Buyer</option>
                            <?php
                            $query = "SELECT nama_buyer FROM buyer";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['nama_buyer'] . '">' . $row['nama_buyer'] . '</option>';
                            }
                            ?>
                        </select>

                        <!-- <label for="nama_color">Color:</label>
                        <input type="text" id="nama_color" name="nama_color" required> -->
                        <label for="nama_color">Color:</label>
                        <select id="nama_color" name="nama_color" required>
                            <option value="" disabled selected>Pilih Color</option>
                            <?php
                            $query = "SELECT nama_color FROM color";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['nama_color'] . '">' . $row['nama_color'] . '</option>';
                            }
                            ?>
                        </select>

                        <!-- <label for="nama_artikel">Artikel:</label>
                        <input type="text" id="nama_artikel" name="nama_artikel" required> -->
                        <label for="nama_artikel">Artikel:</label>
                        <select id="nama_artikel" name="nama_artikel" required>
                            <option value="" disabled selected>Pilih Artikel</option>
                            <?php
                            $query = "SELECT nama_artikel FROM artikel";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['nama_artikel'] . '">' . $row['nama_artikel'] . '</option>';
                            }
                            ?>
                        </select>

                        <label for="tgl_masuk">Tanggal masuk:</label>
                        <input type="date" id="tgl_masuk" name="tgl_masuk" required>

                        <label for="unit">Unit:</label>
                        <input type="text" id="unit" name="unit" required>

                        <!-- <label for="nama_supplier">Nama Supplier:</label>
                        <input type="text" id="nama_supplier" name="nama_supplier" required> -->
                        <label for="nama_supplier">Supplier:</label>
                        <select id="nama_supplier" name="nama_supplier" required>
                            <option value="" disabled selected>Pilih Supplier</option>
                            <?php
                            $query = "SELECT nama_supplier FROM supplier";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['nama_supplier'] . '">' . $row['nama_supplier'] . '</option>';
                            }
                            ?>
                        </select>
                        
                        <label for="no_invoice">No Invoice:</label>
                        <textarea id="no_invoice" name="no_invoice" required></textarea>

                        <label for="no_po">No PO:</label>
                        <input type="text" id="no_po" name="no_po" required>

                        <label for="lot">Lot:</label>
                        <input type="text" id="lot" name="lot" required>

                        <br>
                        <div class="mb-3">
                            <input type="submit" value="Selanjutnya">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Container Main end-->
    <script src="formmsk.js"></script>
</body>
</html>
