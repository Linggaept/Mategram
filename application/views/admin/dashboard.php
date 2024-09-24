<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <title>Dashboard</title>
</head>

<body class="bg-gray-200 bg-opacity-30">

    <?php $this->load->view('partials/navbar'); ?>

    <!-- Tampilkan profilepicture disini -->
    <img src="<?php echo base_url('assets/profile/' . $profile_picture); ?>" alt="Profile Picture" class="rounded-full h-36 w-36 object-cover object-center mx-auto mt-12 mb-4">

    <div class="mb-4">
        <p class="text-center text-4xl font-bold whitespace-nowrap text-gray-900">
            <?php echo $this->session->userdata('nickname'); ?>
        </p>
        <p class="text-center text-xl font-normal whitespace-nowrap text-gray-500">
            @<?php echo $this->session->userdata('username'); ?>
        </p>
    </div>

    <hr class="border-t border-gray-300 mx-auto mt-8 mb-4 w-full max-w-screen-xl">

    <?php if (!empty($images)): ?>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-3 max-w-screen-xl mx-auto px-4 mb-6">
            <?php foreach ($images as $image): ?>
                <a href="<?php echo base_url('dashboard/view_image/' . $image->gambar); ?>">
                    <img src="<?php echo base_url('assets/upload/' . $image->gambar); ?>" class="aspect-square h-full max-w-auto rounded-lg object-cover object-center" alt="<?php echo $image->judul; ?>">
                </a>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-center text-xl font-normal whitespace-nowrap text-gray-500">
            No images found.
        </p>
    <?php endif; ?>






    <a href="<?php echo base_url('dashboard/add_data'); ?>">
        <button type="button" class="fixed bottom-8 left-1/2 transform -translate-x-1/2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xl px-5 py-2.5 text-center inline-flex items-center" style="box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.2), 8px 8px 10px -6px rgb(0 0 0 / 0.2);">
            <svg class="w-5 h-5 text-gray-800 me-3 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 1v16M1 9h16" />
            </svg>
            Add Images
        </button>
    </a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>