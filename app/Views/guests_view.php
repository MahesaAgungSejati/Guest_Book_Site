<!-- resources/views/guests_view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tamu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 50px;
            font-family: "Poppins";
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-family: "Poppins";
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
            color: #4CAF50;
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
            font-family: "Poppins";
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn:active {
            background-color: #3e8e41;
        }

        .btn-danger {
            background-color: #f44336;
        }

        .btn-danger:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <!-- Menyisipkan Navbar -->
    <?= $this->include('navbar'); ?>
    <h1>Daftar Tamu Acara</h1>
    <a href="<?= site_url('guest/create'); ?>" class="btn">Tambah Tamu Baru</a>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Nama Acara</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($guests as $guest): ?>
                <tr>
                    <td><?= $guest['name']; ?></td>
                    <td><?= $guest['email']; ?></td>
                    <td><?= $guest['message']; ?></td>
                    <td><?= $guest['event_name']; ?></td>
                    <td>
                        <a href="<?= site_url('guest/edit/' . $guest['id']); ?>" class="btn">Edit</a>
                        <a href="<?= site_url('guest/delete/' . $guest['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus tamu ini?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    
</body>
</html>
