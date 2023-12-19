<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="/css/styles.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
</head>

<body class="bg-[#FF834F] font-sans">
    <div class="container mx-auto mt-16 p-8 bg-white shadow-lg rounded-md">

        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Payment</h1>

        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">GIN Hotel</h2>

            <div class="divide-y divide-dashed divide-gray-300">
                <div class="py-4">
                    <h3 class="text-lg font-semibold mb-2">Reservation Details</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p><span class="font-semibold">Check-In Date:</span> <?= esc($checkInDate) ?></p>
                            <p><span class="font-semibold">Check-Out Date:</span> <?= esc($checkOutDate) ?></p>
                        </div>
                        <div>
                            <p><span class="font-semibold">Room ID:</span> <?= esc($roomID) ?></p>
                            <p><span class="font-semibold">Room Number:</span> <?= esc($roomNumber) ?></p>
                            <p><span class="font-semibold">Floor:</span> <?= esc($floor) ?></p>
                            <p><span class="font-semibold">Room Type:</span> <?= esc($roomType) ?></p>
                        </div>
                    </div>
                </div>
                <div class="py-4">
                    <h3 class="text-lg font-semibold mb-2">Subtotal</h3>
                    <p class="text-xl font-bold text-gray-800">Rp <?= number_format($price, 0, ',', '.') ?></p>
                </div>
            </div>
        </div>

        <!-- Payment Form Section -->
        <form id="paymentForm" action="/booking/create" method="post">
            <input type="hidden" name="checkInDate" value="<?= esc($checkInDate) ?>">
            <input type="hidden" name="checkOutDate" value="<?= esc($checkOutDate) ?>">
            <input type="hidden" name="hotelID" value="<?= esc($hotelID) ?>">
            <input type="hidden" name="roomID" value="<?= esc($roomID) ?>">
            <input type="hidden" name="roomNumber" value="<?= esc($roomNumber) ?>">
            <input type="hidden" name="floor" value="<?= esc($floor) ?>">
            <input type="hidden" name="roomType" value="<?= esc($roomType) ?>">
            <input type="hidden" name="price" value="<?= esc($price) ?>">
            <div class="py-4">
                <h3 class="text-lg font-semibold mb-2">Payment Method</h3>
                <div class="sm:w-1/2">
                    <label for="payment" class="block text-gray-700 font-medium mb-2">Select Payment Method</label>
                    <select id="payment" name="paymentMethod" class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                        <option value="Debit">Debit</option>
                        <option value="Card">Card</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-[#FF834F] text-white px-6 py-3 rounded-full hover:bg-[#FF6F3E] focus:outline-none">
                    Pay Now
                </button>
            </div>
        </form>
    </div>
</body>

</html>