<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_rak = $_POST['nama_rak'];
    $nama_slot = $_POST['nama_slot'];

    // Ambil kode_rak dan kode_slot dari tabel rak dan slot berdasarkan nama_rak dan nama_slot
    $query_rak = $conn->prepare("SELECT kode_rak FROM rak WHERE nama_rak = ?");
    if (!$query_rak) {
        die("Prepare statement untuk rak gagal: " . $conn->error);
    }
    $query_rak->bind_param("s", $nama_rak);
    $query_rak->execute();
    $result_rak = $query_rak->get_result();
    if ($result_rak->num_rows > 0) {
        $kode_rak = $result_rak->fetch_assoc()['kode_rak'];
    } else {
        die("Rak tidak ditemukan.");
    }

    $query_slot = $conn->prepare("SELECT kode_slot FROM slot WHERE nama_slot = ?");
    if (!$query_slot) {
        die("Prepare statement untuk slot gagal: " . $conn->error);
    }
    $query_slot->bind_param("s", $nama_slot);
    $query_slot->execute();
    $result_slot = $query_slot->get_result();
    if ($result_slot->num_rows > 0) {
        $kode_slot = $result_slot->fetch_assoc()['kode_slot'];
    } else {
        die("Slot tidak ditemukan.");
    }

    // Simpan data ke tabel masuk
    $stmt_masuk = $conn->prepare("INSERT INTO masuk (kode_masuk, kode_buyer, kode_color, kode_artikel, tgl_masuk, unit, kode_supplier, no_invoice, no_po, lot) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt_masuk) {
        die("Prepare statement untuk masuk gagal: " . $conn->error);
    }
    $data_masuk = $_SESSION['data_masuk'];
    $stmt_masuk->bind_param("ssssssssss", $data_masuk['kode_masuk'], $data_masuk['nama_buyer'], $data_masuk['nama_color'], $data_masuk['nama_artikel'], $data_masuk['tgl_masuk'], $data_masuk['unit'], $data_masuk['nama_supplier'], $data_masuk['no_invoice'], $data_masuk['no_po'], $data_masuk['lot']);
    if (!$stmt_masuk->execute()) {
        die("Eksekusi statement untuk masuk gagal: " . $stmt_masuk->error);
    }
    $stmt_masuk->close();

    // Simpan data ke tabel detail_masuk
    if (isset($_SESSION['data_detail_masuk']) && !empty($_SESSION['data_detail_masuk'])) {
        $stmt_detail = $conn->prepare("INSERT INTO detail_masuk (kode_masuk, no_roll, qty_masuk, kode_rak, kode_slot) VALUES (?, ?, ?, ?, ?)");
        if (!$stmt_detail) {
            die("Prepare statement untuk detail_masuk gagal: " . $conn->error);
        }

        $kode_masuk = $data_masuk['kode_masuk'];
        foreach ($_SESSION['data_detail_masuk'] as $detail) {
            $stmt_detail->bind_param("iisii", $kode_masuk, $detail['no_roll'], $detail['qty_masuk'], $kode_rak, $kode_slot);
            echo "Menyimpan data detail masuk: kode_masuk={$kode_masuk}, no_roll={$detail['no_roll']}, qty_masuk={$detail['qty_masuk']}, kode_rak=$kode_rak, kode_slot=$kode_slot<br>";
            if (!$stmt_detail->execute()) {
                die("Eksekusi statement untuk detail_masuk gagal: " . $stmt_detail->error);
            }
        }

        $stmt_detail->close();
        echo "Data detail masuk disimpan<br>";
    } else {
        die("Tidak ada data detail masuk yang ditemukan di sesi.");
    }

    // Hapus data sesi setelah selesai
    unset($_SESSION['data_masuk']);
    unset($_SESSION['data_detail_masuk']);

    echo "Data berhasil disimpan.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sesi Ketiga - Pendataan Rak</title>
</head>
<body>
    <form method="POST">
        <label>Nama Rak:</label><input type="text" name="nama_rak" required><br>
        <label>Nama Slot:</label><input type="text" name="nama_slot" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
