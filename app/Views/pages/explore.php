<div class="flex items-center justify-center h-screen">
    <div class="bg-white p-12 items-center justify-center">
        <form class="w-full max-w-lg">
            <div class="mb-5">
                <label for="hotelname" class="mb-3 block text-base font-medium text-[#07074D]">
                    Nama Hotel
                </label>
                <input type="text" name="hotelname" id="name" placeholder="Nama Hotel" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>

            <div class="-mx-3 flex flex-wrap">
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="checkin" class="mb-3 block text-base font-medium text-[#07074D]">
                            Check in
                        </label>
                        <input type="date" name="checkin" id="date" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>

                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="checkout" class="mb-3 block text-base font-medium text-[#07074D]">
                            Check out
                        </label>
                        <input type="date" name="checkout" id="date" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                </div>

            </div>

            <div class="mb-4">
                <label for="quantity" class="block text-gray-700 font-medium mb-2">Jumlah Kamar</label>
                <select id="quantity" name="quantity" class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                    <option value="">Jumlah kamar</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="roomtype" class="block text-gray-700 font-medium mb-2">Tipe kamar</label>
                <select id="roomtype" name="roomtype" class="border border-gray-400 p-2 w-full rounded-lg focus:outline-none focus:border-blue-400" required>
                    <option value="">Tipe kamar</option>
                    <option value="Deluxe">Deluxe</option>
                    <option value="Superior">Superior</option>
                    <option value="Family">Family</option>
                    <option value="Suite">Suite</option>
                </select>
            </div>


            <div>
                <button class="hover:shadow-form w-full rounded-md bg-[#FF834F] py-3 px-8 text-center text-base font-bold text-black outline-none">
                    <a href='/hotel'>Search</a>
                </button>
            </div>
        </form>
    </div>
</div>