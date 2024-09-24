<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <title>Edit Title</title>
</head>

<body>
    <?php $this->load->view('partials/navbar'); ?>

    <section class="bg-gray-50 pt-8 pb-12">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 mt-[-2rem]">
            <div class="w-full bg-white rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight text-gray-900 md:text-2xl">
                        Edit images title
                    </h1>
                    <?php echo validation_errors('<p class="text-red-500">', '</p>'); ?>
                    <?php echo form_open('dashboard/update_image', array('method' => 'post', 'class' => 'space-y-4 md:space-y-6', 'enctype' => 'multipart/form-data')); ?>
                    <img src="<?php echo base_url('assets/upload/' . $image->gambar); ?>" class="max-h-full max-w-auto rounded-lg" alt="<?php echo $image->judul; ?>">
                    <input type="hidden" name="gambar" value="<?php echo $image->gambar; ?>">
                    <div>
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Image titles</label>
                        <input type="text" name="judul" value="<?php echo $image->judul; ?>" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                    </div>
                    <div>
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Image descriptions</label>
                        <textarea name="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" id="deskripsi" required><?php echo $image->deskripsi; ?></textarea>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5">Save</button>
                    <?php echo form_close(); ?>
                    <a href="<?php echo base_url('dashboard/view_image/' . $image->gambar); ?>">
                        <button class="w-full py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 mt-3">Back</button>
                    </a>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>