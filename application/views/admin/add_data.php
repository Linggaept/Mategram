<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <title>Add Data</title>
</head>

<body>
    <?php $this->load->view('partials/navbar'); ?>

    <section class="bg-gray-50 pt-8 pb-12">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 mt-[-2rem]">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                <img class="h-8 mr-2" src="<?php echo base_url('assets/brand/logo-mategram.svg'); ?>" alt="logo">
                Mategram
            </a>
            <div class="w-full bg-white rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight text-gray-900 md:text-2xl">
                        Add your images
                    </h1>
                    <?php echo validation_errors('<p class="text-red-500">', '</p>'); ?>
                    <?php echo form_open('dashboard/add_data', array('method' => 'post', 'class' => 'space-y-4 md:space-y-6', 'enctype' => 'multipart/form-data')); ?>
                    <div>
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Image titles</label>
                        <input type="text" name="judul" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Image titles" required>
                    </div>
                    <div>
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Image descriptions</label>
                        <textarea name="deskripsi" id="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Image descriptions" required></textarea>
                    </div>
                    <div>
                        <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900">Image files</label>
                        <input class="block w-full text-sm text-gray-400 bg-gray-50 border border-gray-300 rounded-lg cursor-pointer bg-gray-0 focus:outline-none placeholder-gray-300 mb-3" name="gambar[]" id="gambar[]" type="file" multiple required>
                    </div>
                    <div class="flex flex-row gap-3 ">
                        <button type="submit" class="mb-3 flex-1 h-full w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center">Add images</button>
                    </div>
                    <?php echo form_close(); ?>
                    <a href="<?php echo base_url('auth/dashboard'); ?>" class="flex-1">
                        <button class="flex-1 h-full w-full py-2.5 px-4 me-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700">Back</button>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>