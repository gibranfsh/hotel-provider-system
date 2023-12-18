<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
    <link href="/css/styles.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <style>
        .flash-container {
            max-width: 600px;
            /* Set the desired max-width */
            margin: 0 auto;
            /* Center the container */
        }
    </style>
</head>

<body class="bg-[#FF834F]">
    <!-- flash data -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="flash-container">
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="container px-8 mx-auto space-y-4 pb-24 bg-slate-100">
        <h1 class="text-center my-5">Your Bookings</h1>

        <!-- Loop through each booking -->
        <?php foreach ($bookings as $booking) : ?>
            <div class="bg-white p-4 rounded-md mb-4">
                <p><strong>Booking ID:</strong> <?= $booking['id'] ?></p>
                <p><strong>Check-in Date:</strong> <?= $booking['check_in_date'] ?></p>
                <p><strong>Check-out Date:</strong> <?= $booking['check_out_date'] ?></p>
                <p><strong>Total Amount:</strong> <?= $booking['payment']['bill_total'] ?></p>
                <p><strong>Payment Method:</strong> <?= $booking['payment']['payment_method'] ?></p>
                <p><strong>Payment Status:</strong> <?= $booking['payment']['payment_status'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>