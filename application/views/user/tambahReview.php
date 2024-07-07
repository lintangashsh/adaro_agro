<!-- MENGECEK APAKAH SUDAH LOGIN -->
<?php if (!$this->session->userdata('email')) : ?>
    <?php
    $this->session->set_flashdata('message', '<div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        <svg aria-hidden="true" class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div>
        <span class="font-medium">Must be login first!</span>
        </div>
    </div>');
    redirect('auth')
    ?>
<?php endif ?>

<body class="w-full h-full" id="up">
    <div class="pt-24 px-3">
        <div class="relative lg:w-1/2 w-full m-auto px-10 lg:px-20 mt-20 justify-items-center bg-gray-50 rounded-xl p-4 shadow-md">
            <h1 class="font-montserrat my-5 lg:my-10 text-base lg:text-2xl font-bold text-center">Add New Review</h1>
            <!-- FORM -->
            <form class="space-y-6" action="<?= base_url('user/tambah_aksi_testimoni'); ?>" method="post" enctype="multipart/form-data">
                <div class="hidden">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                    <input type="text" name="name" id="name" value="<?= $user['name'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div>

                <div class="hidden">
                    <label for="image_profile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Image Profile</label>
                    <input type="text" name="image_profile" id="image_profile" value="<?= $user['image'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                </div>

                <div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Review</label>
                    <textarea id="review" name="review" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 focus:ring-lime-500 focus:border-lime-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-lime-500 dark:focus:border-lime-500"></textarea>

                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="image_review">Image or Video</label>
                    <input class="block mb-5 w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="image_review" id="image_review" type="file">
                </div>

                <div class="flex w-full justify-center">
                    <button type="submit" class="lg:w-1/2 w-full right-1/2 text-white bg-lime-600 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-lg lg:text-base px-5 py-2.5 ml-1 text-center dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-800">Submit Review</button>
                </div>
            </form>
            <!-- END PERULANGAN -->
        </div>
    </div>