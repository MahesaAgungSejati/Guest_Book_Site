<!-- resources/views/rooms_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ruang Acara</title>
    <style>
        body {
            font-family: "Poppins";
            margin: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #00a8aa;
            color: white;
            text-transform: uppercase;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            margin: 10px 0;
            color: white;
            background-color: #00a8aa;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-transform: uppercase;
            font-size: 14px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn:active {
            background-color: #004494;
        }

        .btn-danger {
            background-color: #f44336;
        }

        .btn-danger:hover {
            background-color: #e53935;
        }

        .btn-container {
            text-align: right;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <!-- Menyisipkan Navbar -->
    <?= $this->include('navbar'); ?>

    <h1>Daftar Ruang Acara</h1>
        <a href="<?= site_url('room/create'); ?>" class="btn">Tambah Ruang Baru</a>
    <table>
        <thead>
            <tr>
                <th>Nama Ruang</th>
                <th>Lokasi</th>
                <th>Kapasitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rooms as $room): ?>
                <tr>
                    <td><?= $room['name']; ?></td>
                    <td><?= $room['location']; ?></td>
                    <td><?= $room['capacity']; ?></td>
                    <td>
                        <a href="<?= site_url('room/edit/' . $room['id']); ?>" class="btn">Edit</a>
                        <a href="<?= site_url('room/delete/' . $room['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus ruang ini?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
