<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard Posyandu</title>

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet" />

    <style>
        /* Reset and base styles */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
            color: #fff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 3rem 1rem 4rem;
            line-height: 1.5;
        }

        h1, h2 {
            font-weight: 800;
            letter-spacing: 0.05em;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
            margin-bottom: 1rem;
        }

        h1 {
            font-size: 3.25rem;
        }

        h2 {
            font-size: 1.75rem;
            color: #ffe5d0;
            margin-bottom: 2rem;
        }

        /* Container styling */
        .container {
            max-width: 700px;
            width: 100%;
            background: rgba(255 255 255 / 0.1);
            border-radius: 1.25rem;
            box-shadow:
                0 8px 24px rgba(0,0,0,0.3),
                inset 0 0 50px rgba(255, 75, 43, 0.7);
            padding: 3rem 4rem;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 2px solid rgba(255,75,43,0.6);
        }

        /* Logout button */
        a[href="logout.php"] {
            display: inline-block;
            background: #ff4b2b;
            color: #fff;
            text-decoration: none;
            padding: 0.85rem 2rem;
            border-radius: 2rem;
            font-weight: 700;
            font-size: 1.05rem;
            box-shadow: 0 6px 20px rgba(255,75,43,0.6);
            transition: background-color 0.3s cubic-bezier(0.4,0,0.2,1), 
                        box-shadow 0.3s ease, 
                        transform 0.3s ease;
            user-select: none;
            margin-bottom: 2.5rem;
            cursor: pointer;
            text-align: center;
            letter-spacing: 0.03em;
        }

        a[href="logout.php"]:hover,
        a[href="logout.php"]:focus {
            background: #ff2d08;
            box-shadow: 0 8px 32px rgba(255,45,8,0.9);
            transform: scale(1.05);
            outline-offset: 4px;
            outline-color: #ff2d08;
            outline-style: solid;
            outline-width: 2px;
        }

        /* Navigation */
        nav {
            border-top: 2px solid rgba(255, 75, 43, 0.7);
            padding-top: 1.5rem;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: flex-start;
            gap: 2rem;
            flex-wrap: wrap;
        }

        nav ul li a {
            font-weight: 700;
            font-size: 1.2rem;
            color: #fff;
            text-decoration: none;
            padding: 0.75rem 1.75rem;
            border-radius: 2rem;
            background: linear-gradient(135deg, #ff715b, #ff3e1d);
            box-shadow: 0 6px 22px rgba(255,62,29,0.7);
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
            user-select: none;
        }

        nav ul li a:hover,
        nav ul li a:focus {
            background: linear-gradient(135deg, #ff3e1d, #ff715b);
            box-shadow: 0 12px 28px rgba(255,62,29,1);
            transform: scale(1.1) translateY(-2px);
            outline-offset: 4px;
            outline-color: #ff3e1d;
            outline-style: solid;
            outline-width: 2px;
        }

        .material-icons-outlined {
            font-size: 1.55rem;
            color: #ffe3d1;
            transition: color 0.3s ease;
            flex-shrink: 0;
        }

        nav ul li a:hover .material-icons-outlined,
        nav ul li a:focus .material-icons-outlined {
            color: #fff;
        }

        /* Responsive adjustments */
        @media (max-width: 767px) {
            h1 {
                font-size: 2.5rem;
            }
            h2 {
                font-size: 1.4rem;
                margin-bottom: 1.25rem;
                color: #ffd9c7;
            }
            .container {
                padding: 2rem 2.5rem;
            }
            nav ul {
                flex-direction: column;
                gap: 1.25rem;
            }
            nav ul li a {
                font-size: 1.1rem;
                padding: 0.75rem 1.5rem;
                justify-content: center;
            }
        }

    </style>
</head>
<body>
    <main class="container" role="main">
        <h1>Sistem Posyandu</h1>
        <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['nama'], ENT_QUOTES, 'UTF-8') ?>!</h2>
        <a href="logout.php" role="button" aria-label="Logout">Logout</a>

        <nav aria-label="Primary navigation">
            <ul>
                <?php if ($_SESSION['role'] == 'admin') : ?>
                    <li>
                        <a href="pengguna.php" class="data-pengguna" aria-label="Data Pengguna">
                            <span class="material-icons-outlined" aria-hidden="true">people_outline</span> Data Pengguna
                        </a>
                    </li>
                <?php endif; ?>

                <li>
                    <a href="bayi.php" class="data-bayi" aria-label="Data Bayi">
                        <span class="material-icons-outlined" aria-hidden="true">child_friendly</span> Data Bayi
                    </a>
                </li>
                <li>
                    <a href="catat.php" class="catat-pertumbuhan" aria-label="Catat Pertumbuhan">
                        <span class="material-icons-outlined" aria-hidden="true">timeline</span> Catat Pertumbuhan
                    </a>
                </li>
            </ul>
        </nav>
    </main>
</body>
</html>

