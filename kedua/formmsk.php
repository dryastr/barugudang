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
  <link rel="stylesheet" href="formmsk.css">
    </head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
  </header>
  <div class="progress">
  <div class="progress-bar bg-success" role="progressbar" style="width: 11%" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar bg-success" role="progressbar" style="width: 11%" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar bg-success" role="progressbar" style="width: 11%" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"></div>
</div>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> 
                <i class='bx bx-layer nav_logo-icon'>

                </i> 
                <span class="nav_logo-name">PT. GLOBALINDO INTIMATES</span> </a>
                <div class="nav_list"> 
                <a href="dashboard.php" class="nav_link active"><i class='bx bx-grid-alt nav_icon'></i> 
                <span class="nav_name">Dashboard</span></a> 

                <a href="kartumasuk.php" class="nav_link"><i class='bx bx-user nav_icon'></i> 
                <span class="nav_name">Kartu Masuk</span></a> 

                <a href="kartukeluar.php" class="nav_link"><i class='bx bx-message-square-detail nav_icon'></i> 
                <span class="nav_name">Kartu Keluar</span> </a> 

                <a href="reminder.php" class="nav_link"><i class='bx bx-home nav_icon'></i> 
                <span class="nav_name">Barang 6 bulan</span></a> 

                <a href="#" class="nav_link"><i class='bx bx-folder nav_icon'></i>

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
 <form action="proses.php" method="post">
    <label for="kode_masuk">Kode masuk:</label>
    <?php
         require_once 'config.php';
            // Query untuk mendapatkan kode masuk terakhir
            $query = "SELECT kode_masuk FROM masuk ORDER BY kode_masuk DESC LIMIT 1";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            $next_code = $row['kode_masuk'] + 1; // Kode masuk berikutnya

            // Menampilkan input kode masuk berikutnya
            echo '<input type="text" id="kode_masuk" name="kode_masuk" value="' . $next_code . '" readonly><br>';
        ?>

    <label for="tgl_masuk">Tanggal masuk:</label>
    <input type="date" id="tgl_masuk" name="Tanggal-masuk" required>

    <label for="nama_supplier">Nama Supplier:</label>
    <input type="text" id="nama_supplier" name="nama_supplier" required>
    
    <label for="no_invoice">No Invoice:</label>
    <input type="text" id="no_invoice" name="no_invoice" required>


    <label for="no_po">No PO:</label>
    <input type="text" id="no_po" name="no_po" required>

    <label for="nama_admin">Nama Admin:</label>
    <input type="text" id="nama_admin" name="nama_admin" required>

    <label for="nama_buyer">Nama Buyer:</label>
    <input type="text" id="nama_buyer" name="nama_buyer" required>

    <br><tr>
    <div class="mb-3">
    <input type="submit" value="Selanjutnya">
    </div>
    </tr>
    </div>
</form>
</div>

<?php
  require_once 'config.php';
// Pastikan form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir
    $kode_masuk = $_POST['kode_masuk'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $nama_supplier = $_POST['nama_supplier'];
    $no_invoice = $_POST['no_invoice'];
    $no_po = $_POST['no_po'];
    $nama_admin = $_POST['nama_admin'];
    $nama_buyer = $_POST['nama_buyer'];

    // konversi kode ke nama
    // / Query untuk mendapatkan kode_supplier berdasarkan nama_supplier
    $query_supplier = "SELECT kode_supplier FROM supplier WHERE nama_supplier = '$nama_supplier'";
    $result_supplier = mysqli_query($conn, $query_supplier);

// / Query untuk mendapatkan kode_admin berdasarkan nama_admin
    $query_admin = "SELECT kode_admin FROM buyer WHERE nama_admin = '$nama_admin'";
    $result_admin = mysqli_query($conn, $query_admin);

    // / Query untuk mendapatkan kode_buyer berdasarkan nama_buyer
    $query_buyer = "SELECT kode_buyer FROM buyer WHERE nama_buyer = '$nama_buyer'";
    $result_buyer = mysqli_query($conn, $query_buyer);

// / Query untuk menyimpan data ke dalam tabel dengan kode-kode yang sesuai
    $query = "INSERT INTO masuk (kode_masuk, tgl_masuk, kode_supplier, no_invoice, no_po, kode_admin, kode_buyer) 
              VALUES ('$kode_masuk', '$tgl_masuk', '$kode_supplier', '$no_invoice, '$no_po', '$kode_admin', '$kode_buyer')";

}
// Redirect ke halaman formulir kedua
header("Location: formcolor.php?kode_masuk=$kode_masuk&tgl_masuk=$tgl_masuk&nama_supplier=$nama_supplier&no_invoice=$no_invoice
&no_po= $no_po&nama_admin=$nama_admin&nama_buyer=$nama_buyer");
exit();
?>

    </div>
     <!--Container Main end-->
     <script>
        document.addEventListener("DOMContentLoaded", function(event) {
   
   const showNavbar = (toggleId, navId, bodyId, headerId) =>{
   const toggle = document.getElementById(toggleId),
   nav = document.getElementById(navId),
   bodypd = document.getElementById(bodyId),
   headerpd = document.getElementById(headerId)
   
   // Validate that all variables exist
   if(toggle && nav && bodypd && headerpd){
   toggle.addEventListener('click', ()=>{
   // show navbar
   nav.classList.toggle('show')
   // change icon
   toggle.classList.toggle('bx-x')
   // add padding to body
   bodypd.classList.toggle('body-pd')
   // add padding to header
   headerpd.classList.toggle('body-pd')
   })
   }
   }
   
   showNavbar('header-toggle','nav-bar','body-pd','header')
   
   /*===== LINK ACTIVE =====*/
   const linkColor = document.querySelectorAll('.nav_link')
   
   function colorLink(){
   if(linkColor){
   linkColor.forEach(l=> l.classList.remove('active'))
   this.classList.add('active')
   }
   }
   linkColor.forEach(l=> l.addEventListener('click', colorLink))
   
    // Your code to run since DOM is loaded and ready
   });
   </script>
</body>
</html>