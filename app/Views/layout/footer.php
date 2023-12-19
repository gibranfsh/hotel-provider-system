<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .flex-grow-1 {
            /* Your main content styles */
            flex-grow: 1;
            margin-bottom: 100px;
            /* Add margin at the bottom to move the footer down */
        }

        footer {
            width: 100%;
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        .footer-container {
            max-width: 500px;
            /* Adjust the max-width to make the footer less wide */
            margin: 0 auto;
        }
    </style>
</head>

<body class="d-flex flex-column">

    <div class="flex-grow-1">
        <!-- Your main content goes here -->
    </div>

    <footer>
        <div class="container-fluid bg-dark text-light py-4">
            <div class="footer-container">
                <p class="mb-0">Copyright Gibeh - Ilma - Nadine</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>