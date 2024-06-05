<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Masuk</title>
</head>
<body>
    <h2>Form Masuk</h2>
    <form action="proses_masuk.php" method="post">
        <label for="kode_masuk">Kode Masuk:</label><br>
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
        <input type="submit" value="Submit">
    </form>
</body>
</html>