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
    <h1 class="text-center">Payment</h1>
    <div class="mt-25 container px-8 mx-auto space-y-4 pb-24 bg-slate-100">
        <h2>GIN Hotel</h2>
        <div class="divide-y divide-dashed divide-black outline-5">
            <div>
                <h3 class="text-center">Recap</h3>
                <h4>Check in</h4>
                <h5>DD/MM/YY</h5>
                <h4>Check out</h4>
                <h5>DD/MM/YY</h5>
            </div>
            <div>
                <h3 class="text-center">Subtotal</h3>
                <h4>Rp xxx.xxx</h4>
            </div>
            <div>
                <h3 class="text-center">Payment Method</h3>
                <div class="sm:w-1/2 mb-5">
                    <label for="payment" class="block text-gray-700 font-medium mb-2">Payment Method</label>
                    <select id="roomtype" name="roomtype" class="border border-gray-400 p-2 w-96 rounded-lg focus:outline-none focus:border-blue-400" required>
                        <option value="Debit">Debit</option>
                        <option value="Kredit">Kredit</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="justify-center">
            <button class="mx-auto items-center hover:shadow-form w-72 rounded-md bg-[#FF834F] py-3 px-8 text-center text-base font-bold text-black outline-none">
                <a href='/booking'>Pay</a>
            </button>
        </div>
    </div>
</body>