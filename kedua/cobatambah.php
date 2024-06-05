<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $no_rolls = $_POST['no_rolls'];
    $qty_masuks = $_POST['qty_masuks'];

    // Simpan data ke sesi
    $_SESSION['details'] = [];
    foreach ($no_rolls as $index => $no_roll) {
        $_SESSION['details'][] = [
            'no_roll' => $no_roll,
            'qty_masuk' => $qty_masuks[$index]
        ];
    }

    // Redirect ke halaman selanjutnya
    header("Location: msktigas.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input No Roll dan Qty Masuk</title>
    <script>
        function tambahRoll() {
            // Ambil nilai dari input form
            const noRoll = document.getElementById('no_roll').value;
            const qtyMasuk = document.getElementById('qty_masuk').value;

            if (noRoll && qtyMasuk) {
                // Buat baris baru di tabel
                const table = document.getElementById('detailTable');
                const newRow = table.insertRow();

                // Buat sel dan tambahkan nilai input
                const cell1 = newRow.insertCell(0);
                const cell2 = newRow.insertCell(1);

                cell1.innerHTML = noRoll;
                cell2.innerHTML = qtyMasuk;

                // Tambahkan input hidden ke form
                const detailForm = document.getElementById('detailForm');
                const inputNoRoll = document.createElement('input');
                inputNoRoll.type = 'hidden';
                inputNoRoll.name = 'no_rolls[]';
                inputNoRoll.value = noRoll;
                detailForm.appendChild(inputNoRoll);

                const inputQtyMasuk = document.createElement('input');
                inputQtyMasuk.type = 'hidden';
                inputQtyMasuk.name = 'qty_masuks[]';
                inputQtyMasuk.value = qtyMasuk;
                detailForm.appendChild(inputQtyMasuk);

                // Reset input form
                document.getElementById('no_roll').value = '';
                document.getElementById('qty_masuk').value = '';
            }
        }
    </script>
</head>
<body>
    <h2>Form Input No Roll dan Qty Masuk</h2>
    <form onsubmit="event.preventDefault(); tambahRoll();">
        <label for="no_roll">No Roll:</label>
        <input type="text" id="no_roll" name="no_roll" required><br><br>

        <label for="qty_masuk">Qty Masuk:</label>
        <input type="number" id="qty_masuk" name="qty_masuk" required><br><br>

        <button type="submit">Tambah Roll</button>
    </form>

    <h2>Detail</h2>
    <table id="detailTable" border="1">
        <tr>
            <th>No Roll</th>
            <th>Qty Masuk</th>
        </tr>
        <!-- Baris baru akan ditambahkan di sini -->
    </table>

    <br>
    <form id="detailForm" action="simpan_data_sementara.php" method="post">
        <button type="submit">Selanjutnya</button>
    </form>
</body>
</html>

