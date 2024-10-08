<body class="w-full h-full" id="up">
    <div class="pt-24">
        <div class="relative w-full px-10 lg:px-20 lg:mt-20 mt-10 justify-items-center">
            <h1 class="font-montserrat pb-10 my-5 lg:mt-20 text-xl lg:text-5xl text-center font-bold text-lime-500">Our North <span class="text-white bg-lime-500 rounded-md py-2 px-3">Sumatera Tea</span> Products</h1>

            <!-- KATEGORI -->
            <div class="lg:w-6/12 w-full lg:m-auto grid lg:grid-cols-2 grid-cols-1 text-center">
                <div class="lg:px-2" data-aos="fade-right">
                    <a href="#gradeI">
                        <button class="lg:w-full w-full mx-1 text-montserrat lg:text-xl text-base lg:p-4 p-2 my-1 m-auto bg-lime-600 hover:bg-lime-800 rounded-xl text-white font-semibold hover:scale-105 duration-300">
                            Black Tea Grade I
                        </button>
                    </a>
                </div>
                <div class="lg:px-2" data-aos="fade-left">
                    <a href="#gradeII">
                        <button class="lg:w-full w-full mx-1 text-montserrat lg:text-xl text-base lg:p-4 p-2 my-1 m-auto bg-lime-600 hover:bg-lime-800 rounded-xl text-white font-semibold hover:scale-105 duration-300">
                            Black Tea Grade II
                        </button>
                    </a>
                </div>
            </div>


            <!-- GRADE I -->
            <div id="gradeI"></div>
            <div class="w-full mt-10 lg:bg-gray-50 rounded-xl lg:pl-9 pb-5">
                <div class="lg:text-3xl text-base underline font-montserrat font-bold pt-5 mt-16 mb-5">
                    Black Tea Grade I
                </div>

                <div class="grid lg:grid-cols-4 grid-cols-1 gap-x-2 gap-y-7 text-center">

                    <?php
                    $delay = 0;
                    $sql = "SELECT * FROM `tb_produk` WHERE `category` = ? ";
                    $produk  = $this->db->query($sql, array('Grade I'))->result();
                    ?>

                    <?php foreach ($produk as $pdk) : ?>
                        <!-- Produk 1 -->
                        <div class="max-w-sm bg-white rounded-lg shadow-md" data-aos-delay="<?= $delay; ?>" data-aos="fade-right">
                            <div>
                                <div class="w-full h-96 m-auto">
                                    <img class="rounded-lg w-full h-full m-auto" src=" <?= base_url('assets/img/produk/') . $pdk->product_image ?> " />
                                </div>
                            </div>
                            <div class="px-5 py-5">
                                <div>
                                    <h5 class="mb-3 text-xl font-semibold font-montserrat tracking-tight text-gray-900"><?= $pdk->product_name ?></h5>
                                </div>

                                <div class="flex justify-between items-center mt-4 mb-5">
                                    <span class="text-2xl font-bold text-gray-900">USD <?= number_format($pdk->price, 1, ',', '.')  ?>/Kg</span>
                                    <?= anchor('user/detail_produk/' . $pdk->id, '<button class="text-white bg-lime-600 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center duration-300">See Details</button>') ?>
                                </div>
                            </div>
                        </div>
                        <?php $delay += 100; ?>

                    <?php endforeach ?>

                </div>
            </div>

            <!-- GRADE II -->
            <div id="gradeII"></div>
            <div class="w-full mt-10 lg:bg-gray-50 rounded-xl lg:pl-9 pb-5">
                <div class="lg:text-3xl text-base underline font-montserrat font-bold pt-5 mt-16 mb-5">
                    Black Tea Grade II
                </div>

                <div class="grid lg:grid-cols-4 grid-cols-1 gap-x-2 gap-y-7 text-center">

                    <?php
                    $delay = 0;
                    $sql = "SELECT * FROM `tb_produk` WHERE `category` = ? ";
                    $produk  = $this->db->query($sql, array('Grade II'))->result();
                    ?>

                    <?php foreach ($produk as $pdk) : ?>
                        <!-- Produk 1 -->
                        <div class="max-w-sm bg-white rounded-lg shadow-md" data-aos-delay="<?= $delay; ?>" data-aos="fade-right">
                            <div>
                                <div class="w-full h-96 m-auto">
                                    <img class="rounded-lg w-full h-full m-auto" src=" <?= base_url('assets/img/produk/') . $pdk->product_image ?> " />
                                </div>
                            </div>
                            <div class="px-5 py-5">
                                <div>
                                    <h5 class="mb-3 text-xl font-semibold font-montserrat tracking-tight text-gray-900"><?= $pdk->product_name ?></h5>
                                </div>
                                <div class="flex justify-between items-center mt-4 mb-5">
                                    <span class="text-2xl font-bold text-gray-900">USD <?= number_format($pdk->price, 1, ',', '.')  ?>/Kg</span>
                                    <?= anchor('user/detail_produk/' . $pdk->id, '<button class="text-white bg-lime-600 hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center duration-300">See Details</button>') ?>
                                </div>
                            </div>
                        </div>
                        <?php $delay += 100; ?>
                    <?php endforeach ?>
                </div>
            </div>
            
            <!-- Logo Site -->
            <div class="relative w-full px-10 lg:px-20 lg:mt-20 mt-10 justify-items-center">
                <div class="w-full mt-10 lg:bg-gray-50 rounded-xl lg:pl-9 pb-5">
                    <h1 class="font-montserrat pb-10 pt-10 my-5 text-xl lg:text-5xl text-center font-bold text-lime-500">Our <span class="text-white bg-lime-500 rounded-md py-2 px-3">Shipping Services</span> Around The World</h1>
                    <div class="grid lg:grid-cols-4 grid-cols-1 gap-x-1 gap-y-7 pt-3">
                        <a href="https://www.dhlexpress.nl/en">
                            <img src="<?php echo base_url('assets/img/logo/DHL Express Logo.png') ?>" alt="DHL Express Logo" class="h-16 hover:h-20 lg:ml-20 transition-all duration-200">
                        </a>
                        <a href="https://lionparcel.com/">
                            <img src="<?php echo base_url('assets/img/logo/Lion Parcel Logo.png') ?>" alt="Lion Parcel Logo" class="h-16 hover:h-20 lg:ml-20 transition-all duration-200">
                        </a>
                        <a href="https://www.maersk.com/">
                            <img src="<?php echo base_url('assets/img/logo/Maersk Logo.png') ?>" alt="Maersk Logo" class="h-16 hover:h-20 lg:ml-20 transition-all duration-200">
                        </a>
                        <a href="https://samudera.id/">
                            <img src="<?php echo base_url('assets/img/logo/Samudera Logo.png') ?>" alt="Samudera Logo" class="h-10 hover:h-14 lg:ml-20 transition-all duration-200">
                        </a>
                        <a href="https://www.posindonesia.co.id/en">
                            <img src="<?php echo base_url('assets/img/logo/Pos Indonesia Logo.png') ?>" alt="Pos Indonesia Logo" class="h-16 hover:h-20 lg:ml-20 transition-all duration-200">
                        </a>
                        <a href="https://www.jne.co.id/">
                            <img src="<?php echo base_url('assets/img/logo/JNE Logo.png') ?>" alt="JNE Logo" class="h-16 hover:h-20 lg:ml-20 transition-all duration-200">
                        </a>
                        <a href="https://www.ninjaxpress.co/en-id">
                            <img src="<?php echo base_url('assets/img/logo/Ninja Express.png') ?>" alt="Ninja Express Logo" class="h-16 hover:h-20 lg:ml-20 transition-all duration-200">  
                        </a>
                        <a href="https://www.fedex.com/global/choose-location.html">
                            <img src="<?php echo base_url('assets/img/logo/FedEx Logo.png') ?>" alt="FedEx Logo" class="h-16 hover:h-20 lg:ml-20 transition-all duration-200">
                        </a>
                        <a href="https://www.sicepat.com/">
                            <img src="<?php echo base_url('assets/img/logo/SiCepat Express Logo.png') ?>" alt="SiCepat Express Logo" class="h-20 hover:h-24 lg:ml-20 transition-all duration-200">
                        </a>
                        <a href="https://www.sapx.id/en">
                            <img src="<?php echo base_url('assets/img/logo/SAP Express Logo.png') ?>" alt="SAP Express Logo" class="h-20 hover:h-24 lg:ml-20 transition-all duration-200">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>