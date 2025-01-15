<!-- resources/views/edit_room.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ruang</title>
    <style>
        body {
            font-family: "Poppins";
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input, select, button {
            width: 97%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.3);
        }

        button {
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -15px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Edit Ruang Acara</h1>

    <!-- Form untuk mengedit ruang -->
    <form action="<?= site_url('room/update/' . $room['id']); ?>" method="POST">
        <?= csrf_field(); ?>

        <label for="name">Nama Ruang:</label>
        <input type="text" id="name" name="name" value="<?= old('name', $room['name']); ?>" required>
        <?= isset($errors['name']) ? '<div class="error">' . $errors['name'] . '</div>' : ''; ?>

        <label for="location">Lokasi:</label>
        <input type="text" id="location" name="location" value="<?= old('location', $room['location']); ?>" required>
        <?= isset($errors['location']) ? '<div class="error">' . $errors['location'] . '</div>' : ''; ?>

        <label for="capacity">Kapasitas:</label>
        <input type="number" id="capacity" name="capacity" value="<?= old('capacity', $room['capacity']); ?>" required>
        <?= isset($errors['capacity']) ? '<div class="error">' . $errors['capacity'] . '</div>' : ''; ?>

        <button type="submit">Update Ruang</button>
    </form>

    <a href="<?= site_url('room'); ?>">Kembali ke Daftar Ruang</a>
</body>
</html>
