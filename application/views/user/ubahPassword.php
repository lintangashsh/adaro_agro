<body class="w-full h-full">
    <div class="mt-24">
        <div class="w-1/2 m-auto p-3">
            <h1 class="font-montserrat my-10 lg:my-20 text-xl lg:text-4xl text-center font-bold">Change your password here!</h1>
            <?= $this->session->flashdata('message'); ?>

            <form action=" <?= base_url('user/ubah_password') ?>" method="post">
                <div class="mb-6">
                    <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 ">Old Password</label>
                    <input type="password" id="current_password" name="current_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <!-- Text Error -->
                    <small class="text-red-600 font-montserrat duration-300">
                        <?= form_error('current_password') ?>
                    </small>
                </div>

                <div class="mb-6">
                    <label for="new_password1" class="block mb-2 text-sm font-medium text-gray-900 ">New Password</label>
                    <input type="password" id="new_password1" name="new_password1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <!-- Text Error -->
                    <small class="text-red-600 font-montserrat duration-300">
                        <?= form_error('new_password1') ?>
                    </small>
                </div>

                <div class="mb-6">
                    <label for="new_password2" class="block mb-2 text-sm font-medium text-gray-900 ">Repeat New Password</label>
                    <input type="password" id="new_password2" name="new_password2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <!-- Text Error -->
                    <small class="text-red-600 font-montserrat duration-300">
                        <?= form_error('new_password2') ?>
                    </small>
                </div>

                <button type="submit" class="py-3 px-20 bg-lime-600 hover:bg-lime-800 rounded-full text-white font-bold uppercase text-lg mt-5 transform hover:translate-y-1 transition-all duration-300">Change Password!</button>

            </form>
        </div>
    </div>
</body>