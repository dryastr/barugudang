<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tombol dalam Kolom</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn-container {
            text-align: center;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 3px;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Tombol dalam Kolom</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <td>John Doe</td>
            <td class="btn-container"><button class="btn">Edit</button></td>
        </tr>
        <tr>
            <td>Jane Smith</td>
            <td class="btn-container"><button class="btn">Edit</button></td>
        </tr>
        <tr>
            <td>Michael Johnson</td>
            <td class="btn-container"><button class="btn">Edit</button></td>
        </tr>
    </table>
</body>
</html>
