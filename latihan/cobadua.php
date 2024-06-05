<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no_roll = $_POST['no_roll'];
    $qty = $_POST['qty'];

    if (!isset($_SESSION['data_detail_masuk'])) {
        $_SESSION['data_detail_masuk'] = [];
    }

    $_SESSION['data_detail_masuk'][] = [
        'no_roll' => $no_roll,
        'qty' => $qty
    ];

    if (isset($_POST['next'])) {
        header("Location: cobatiga.php"); // Redirect ke sesi ketiga
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sesi Kedua - Pendataan Detail Masuk</title>
</head>
<body>
    <form method="POST">
        <label>No Roll:</label><input type="text" name="no_roll" required><br>
        <label>Quantity:</label><input type="number" name="qty" required><br>
        <button type="submit" name="add">Tambah Roll</button>
        <button type="submit" name="next">Selanjutnya</button>
    </form>
    
    <table>
        <tr>
            <th>No Roll</th>
            <th>Quantity</th>
        </tr>
        <?php if (isset($_SESSION['data_detail_masuk'])): ?>
            <?php foreach ($_SESSION['data_detail_masuk'] as $detail): ?>
                <tr>
                    <td><?php echo htmlspecialchars($detail['no_roll']); ?></td>
                    <td><?php echo htmlspecialchars($detail['qty']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</body>
</html>
