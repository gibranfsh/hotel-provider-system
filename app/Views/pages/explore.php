<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>
    <link href="/css/styles.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body class="bg-[#FF834F]">
    <div class="mt-25 container px-8 mx-auto space-y-4 pb-24">
        <h1 class="text-center">Explore Hotel</h1>

        <!-- Search Form ... (your existing form) -->

        <div class="flex items-center justify-center">
            <div class="bg-white w-[60%] mx-12 p-12 items-center justify-center">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <?php foreach ($data as $hotel) : ?>
                        <div class="mb-4">
                            <div class="bg-gray-100 p-4 rounded-md">
                                <h3 class="text-lg font-semibold mb-2"><?= $hotel['name'] ?></h3>
                                <p class="text-sm mb-2"><?= $hotel['description'] ?></p>
                                <p class="text-sm text-gray-500">Location: <?= $hotel['location'] ?> | Rating: <?= $hotel['rating'] ?></p>

                                <!-- Check the status and set the button accordingly -->
                                <?php if ($hotel['status'] === 'AVAILABLE') : ?>
                                    <button class="bg-[#FF834F] text-white py-2 px-4 rounded-md" data-toggle="modal" data-target="#bookingModal<?= $hotel['id'] ?>">
                                        Book Now
                                    </button>
                                <?php else : ?>
                                    <button class="bg-gray-400 text-white py-2 px-4 rounded-md" disabled>
                                        Not Available
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Booking Modal -->
                        <div class="modal" id="bookingModal<?= $hotel['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="bookingModalLabel">Want to book this hotel?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Hotel: <?= $hotel['name'] ?></p>
                                        <!-- Add more details as needed -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <a href="/booking/<?= $hotel['id'] ?>" class="btn btn-primary">Book</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>