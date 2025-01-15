<!-- resources/views/navbar.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <style>
        /* Styling khusus untuk navbar */
        .navbar-container {
            width: 100%; /* Mengatur panjang navbar agar penuh */
            max-width: 1200px; /* Memberikan batas maksimal */
            margin: 20px auto; /* Membuat navbar berada di tengah */
            box-sizing: border-box;
            font-family: "Poppins";
        }

        .navbar {
            background: rgb(76,26,87);
            background: linear-gradient(163deg, rgba(76,26,87,1) 10%, rgba(0,168,170,1) 100%);
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
        }

        .navbar .links {
            display: flex;
            gap: 1rem;
        }

        .navbar a {
            text-decoration: none;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .navbar a:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
                padding: 1rem 2rem;
            }

            .navbar .logo {
                margin-bottom: 1rem;
            }

            .navbar .links {
                flex-direction: column;
                width: 100%;
            }

            .navbar a {
                width: 100%;
                text-align: center;
                font-weight: 600;

            }
        }
    </style>
</head>
<body>
    <div class="navbar-container">
        <div class="navbar">
            <div class="logo">
                Guest Book
            </div>
            <div class="links">
                <a href="<?= site_url('guest'); ?>">Guests</a>
                <a href="<?= site_url('room'); ?>">Rooms</a>
                <a href="<?= site_url('event'); ?>">Events</a>
            </div>
        </div>
    </div>
</body>
</html>
