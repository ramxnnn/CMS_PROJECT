<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <style>
        .box2 {
            margin-top: 20px;
            width: 100%;
            display: flex;
            justify-content: center;
            position: relative;
        }

        .rectangle2 {
            -webkit-backdrop-filter: blur(4px) brightness(100%);
            backdrop-filter: blur(4px) brightness(100%);
            background-color: #d9d9d91a;
            border: 2px solid #ffffff80;
            border-radius: 20px;
            height: 90px;
            width: 90%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 1000;
        }

        .navbar {
            display: flex;
            width: 100%;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-brand {
            flex-grow: 1;
            display: flex;
        }

        .navbar-nav {
            display: flex;
            flex-direction: row;
            gap: 20px;
            font-size: 1rem;
            font-weight: bold;
            font-family: 'Helvetica Neue', sans-serif;
        }

        .nav-item a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .nav-item a:hover {
            color: #ffbb33;
        }

    </style>
</head>
<body>
    <div class="box2">
        <div class="rectangle2">
            <nav class="navbar">
                <div class="navbar-brand">
                    <a href="index.php">
                        <img src="Image/SmallVersionLogo.png" alt="Game Central Logo" style="max-height: 80px; max-width: 80px;">
                    </a>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link-active" href="add.php">Add</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-logout" href="logout.php">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>
</html>
