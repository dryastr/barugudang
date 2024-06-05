<?php
session_start();
require 'config.php'; // File ini berisi koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        header('Location: dashboard.php');
    } else {
        $error = "Username atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Boostrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    /* Mengubah warna tombol submit menjadi biru */
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 mt-5">
        <h2 class="text-center mb-4">Login</h2>
        <form action="dashboard.php" method="post">
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Boostrap JS (Optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

              <?php
   session_start();
  //  require_once 'config.php';

   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
       $nik = $_POST['nik'];
       $password = $_POST['password'];

       $sql = "SELECT * FROM user WHERE nik = '$nik' AND password = '$password'";
       $result = $conn->query($sql);

       if ($result->num_rows == 1) {
           // Jika login sukses, set session dan redirect ke halaman dashboard atau halaman lainnya
           $_SESSION['nik'] = $nik;
           header("Location:kartumasuk.php");
           exit();
       } else {
           // Jika login gagal, tampilkan pesan error
           echo '<div style="color: red; text-align: center;">NIK atau password salah.</div>';
       }
   }

   $conn->close();
  ?>
            </div>
        </form>

  
</body>
</html>