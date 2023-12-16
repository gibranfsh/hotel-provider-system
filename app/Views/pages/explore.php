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
        <div class="flex items-center justify-center ">
            <div class="bg-white w-[60%] mx-12 p-12 items-center justify-center">
                <form class=" sm:w-1/2">
                    <div class="mb-5">
                        <label for="hotelname" class="mb-3 block text-base font-medium text-[#07074D]">
                            Nama Hotel
                        </label>
                        <input type="text" name="hotelname" id="name" placeholder="Nama Hotel" class="w-96 rounded-md border border-[#e0e0e0] bg-white py-1 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>

                    <div class="flex ">
                        <div class="mb-5 sm:w-1/2">
                            <div class="">
                                <label for="checkin" class="mb-3  text-base font-medium text-[#07074D]">
                                    Check in
                                </label>
                                <input type="date" name="checkin" id="date" class="w-44 rounded-md border border-[#e0e0e0] bg-white py-1 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>

                        <div class=" sm:w-1/2">
                            <div class=" ml-8">
                                <label for="checkout" class="mb-3  text-base font-medium text-[#07074D]">
                                    Check out
                                </label>
                                <input type="date" name="checkout" id="date" class="w-44 rounded-md border border-[#e0e0e0] bg-white py-1 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>

                    </div>
                    <div class="justify-center">
                        <button class="mx-auto items-center hover:shadow-form w-72 rounded-md bg-[#FF834F] py-3 px-8 text-center text-base font-bold text-black outline-none">
                            <a href='/hotel'>Search</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>