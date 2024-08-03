
<!-- MENGECEK APAKAH SUDAH LOGIN -->
<?php if (!$this->session->userdata('email')) : ?>
    <?php
    $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div>
        <span class="font-medium">Must login first!</span>
        </div>
    </div>');
    redirect('auth')
    ?>
<?php endif ?>

<body class="w-full h-full" id="up">
    <div class="pt-24 px-3">
        <div class="relative lg:w-1/2 w-full m-auto px-10 lg:px-20 mt-20 justify-items-center bg-gray-50 rounded-xl p-4 shadow-md">
            <h1 class="font-montserrat my-5 lg:my-10 text-base lg:text-2xl font-bold text-center"><?= $title; ?></h1>

                <!-- FORM -->
                <form class="space-y-6" action="<?= base_url('user/order/' . $product['id']); ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">User Name</label>
                        <input type="text" value="<?= $user['name'] ?>" readonly class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 focus:ring-lime-500 focus:border-lime-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500">
                    </div>

                    <div class="form-group">
                        <label for="product_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product Name</label>
                        <input type="text" value="<?= $product['product_name'] ?>" readonly class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 focus:ring-lime-500 focus:border-lime-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500">
                    </div>

                    <div>
                        <label for="Price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Price</label>
                        <input type="text" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 focus:ring-lime-500 focus:border-lime-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500" value="USD <?= number_format($product['price'] / 2) ?>" readonly>

                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="image_review">Quantity</label>
                        <input class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 focus:ring-lime-500 focus:border-lime-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500" name="quantity" id="image_review" type="number" value="1" required>
                    </div>

                    <div>
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Customer Address</label>
                        <textarea name="address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 focus:ring-lime-500 focus:border-lime-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500"></textarea>
                    </div>

                    <div>
                        <label for="service" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Shipping Service</label>
                        <textarea name="service" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 focus:ring-lime-500 focus:border-lime-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500"></textarea>
                    </div>

                    <div>
                        <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Customer Contact</label>
                        <textarea name="contact" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 focus:ring-lime-500 focus:border-lime-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500"></textarea>
                    </div>
                    <div class="flex w-full justify-center">
                        <div class="text-red-600 font-semibold">*Before submit your order, please check the shipping services that connected with Us and make sure you have checked the product's price, product's name, your address, your contact and shipping price correctly!</div>
                    </div>
                    <div class="flex w-full justify-center">
                        <button type="submit" class="lg:w-1/2 w-full right-1/2 text-white bg-lime-700 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-lg lg:text-base px-5 py-2.5 ml-1 text-center dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-800">Submit Order</button>
                    </div>
                    <br>
                </form>
        </div>
    </div>