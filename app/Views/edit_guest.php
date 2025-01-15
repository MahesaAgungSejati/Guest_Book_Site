<!-- resources/views/edit_guest.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tamu</title>
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

        input, select, textarea, button {
            width: 97%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.3);
        }

        textarea {
            resize: none;
            height: 100px;
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
    </style>
</head>
<body>
    <h1>Edit Tamu</h1>

    <form action="<?= site_url('guest/update/' . $guest['id']); ?>" method="POST">
        <?= csrf_field(); ?>

        <label for="event_id">Pilih Acara:</label>
        <select name="event_id" id="event_id" required>
            <?php foreach ($events as $event): ?>
                <option value="<?= $event['id']; ?>" <?= ($guest['event_id'] == $event['id']) ? 'selected' : ''; ?>><?= $event['name']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" value="<?= old('name', $guest['name']); ?>" placeholder="Masukkan nama tamu" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= old('email', $guest['email']); ?>" placeholder="Masukkan email tamu" required>

        <label for="message">Pesan:</label>
        <textarea id="message" name="message" placeholder="Tulis pesan"><?= old('message', $guest['message']); ?></textarea>

        <button type="submit">Update</button>
    </form>

    <a href="<?= site_url('guest'); ?>">Kembali ke Daftar Tamu</a>
</body>
</html>
