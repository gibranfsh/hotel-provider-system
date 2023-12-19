<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>HOTELOKA</title>
    <style>
        body {
            padding-top: 56px;
        }

        .navbar {
            background-color: #f8f9fa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: #007bff;
        }

        .navbar-nav .nav-link {
            color: #343a40;
        }

        .navbar-nav .nav-link:hover {
            color: #0056b3;
        }

        /* Style for the logout button */
        .navbar-nav .nav-item .nav-logout {
            background-color: #dc3545;
            color: #fff;
            border-radius: 5px;
            padding: 8px 15px;
        }

        .navbar-nav .nav-item .nav-logout:hover {
            background-color: #c82333;
            color: #fff;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">HOTELOKA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/explore">Explore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/bookings">Bookings</a>
                </li>
                <?php
                helper('cookie');

                $token = get_cookie('login_token');

                if ($token) {
                    echo '<li class="nav-item"><a class="nav-link nav-logout" href="/logout">Logout</a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>