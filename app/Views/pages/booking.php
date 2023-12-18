<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link href="/css/styles.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-[#FF834F] font-sans">

    <div class="container mx-auto p-8 bg-white shadow-lg rounded-md mt-8">

        <h1 class="text-3xl font-bold text-gray-800 mb-8">Booking</h1>

        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2"><?= $hotel['name']; ?></h2>
            <p class="text-gray-600 mb-2"><?= $hotel['description']; ?></p>
            <p class="text-gray-600 mb-2">Location: <?= $hotel['location']; ?></p>
            <p class="text-gray-600">Rating: <?= $hotel['rating']; ?> / 5</p>
        </div>

        <h2 class="text-xl font-semibold text-gray-700 mb-4">Rooms</h2>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4">Room Number</th>
                    <th class="py-2 px-4">Floor</th>
                    <th class="py-2 px-4">Room Type</th>
                    <th class="py-2 px-4">Availability</th>
                    <th class="py-2 px-4">Price</th>
                    <th class="py-2 px-4">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rooms as $room) : ?>
                    <tr class="border-b border-gray-300">
                        <td class="py-2 px-4"><?= $room['roomNumber']; ?></td>
                        <td class="py-2 px-4"><?= $room['floor']; ?></td>
                        <td class="py-2 px-4"><?= $room['roomType']; ?></td>
                        <td class="py-2 px-4"><?= $room['availability']; ?></td>
                        <td class="py-2 px-4"><?= $room['price']; ?></td>
                        <td class="py-2 px-4">
                            <?php if ($room['availability'] === 'Available') : ?>
                                <!-- Button to trigger the modal -->
                                <button class="bg-blue-500 text-white px-3 py-1 rounded" data-toggle="modal" data-target="#bookingModal" data-room-id="<?= $room['id']; ?>" data-room-number="<?= $room['roomNumber']; ?>" data-room-floor="<?= $room['floor']; ?>" data-room-type="<?= $room['roomType']; ?>" data-room-price="<?= $room['price']; ?>">
                                    Choose Room
                                </button>
                            <?php else : ?>
                                <!-- Disabled button with gray background -->
                                <button class="bg-gray-400 text-white px-3 py-1 rounded" disabled>Unavailable</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Choose Check-In and Check-Out Dates</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add your form inputs for check-in and check-out dates here -->
                    <label for="checkInDate">Check-In Date:</label>
                    <input type="date" id="checkInDate" name="checkInDate" class="form-control mb-2" required>

                    <label for="checkOutDate">Check-Out Date:</label>
                    <input type="date" id="checkOutDate" name="checkOutDate" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="continueToPayment()">Continue to Payment</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function continueToPayment() {
            const hotelID = <?= $hotel['id']; ?>;

            // Get the selected check-in and check-out dates
            const checkInDate = document.getElementById('checkInDate').value;
            const checkOutDate = document.getElementById('checkOutDate').value;

            // Get room details from the button that triggered the modal
            const selectedRoomId = document.querySelector('[data-target="#bookingModal"]').getAttribute('data-room-id');
            const selectedRoomNumber = document.querySelector('[data-target="#bookingModal"]').getAttribute('data-room-number');
            const selectedRoomFloor = document.querySelector('[data-target="#bookingModal"]').getAttribute('data-room-floor');
            const selectedRoomType = document.querySelector('[data-target="#bookingModal"]').getAttribute('data-room-type');
            const selectedRoomPrice = document.querySelector('[data-target="#bookingModal"]').getAttribute('data-room-price');

            // Redirect to the /payment page with query parameters
            const redirectURL = `/payment?hotelID=${hotelID}&checkInDate=${checkInDate}&checkOutDate=${checkOutDate}&roomID=${selectedRoomId}&roomNumber=${selectedRoomNumber}&floor=${selectedRoomFloor}&roomType=${selectedRoomType}&price=${selectedRoomPrice}`;
            window.location.href = redirectURL;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>