<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <title>Guest Dashboard</title>
</head>
<body>
    
    <nav class="bg-white border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img class="h-8" src="<?php echo base_url('assets/brand/logo-mategram.svg'); ?>" alt="logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-900">Mategram</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:flex md:items-center md:w-auto" id="navbar-default">
            <ul class="font-medium flex md:flex md:items-center p-4 md:p-0 mt-4 border border-gray-200 rounded-lg bg-white space-x-2 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="<?php echo base_url('Guest_dashboard/logout'); ?>">
                        <button type="button" class="w-full md:max-w-xs text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Log out</button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </nav>

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

    
<!--
    <form action="" method="post" class="mb-4">
        <div class="relative w-full">
            <label for="search" class="sr-only">Search</label>
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                </svg>
            </div>
            <input type="text" id="search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 placeholder-gray-400" placeholder="Search for images by title..." required>
        </div>
        <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            <span class="sr-only">Search</span>
        </button>
    </form>
-->   

    <hr class="border-t border-gray-300 mx-auto mt-8 mb-4 w-full max-w-screen-xl">

    <?php if (!empty($images)): ?>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-3 max-w-screen-xl mx-auto px-4 mb-6">
            <?php foreach ($images as $image): ?>
                <a href="<?php echo base_url('guest_dashboard/view_image/' . $image->gambar); ?>">
                    <img src="<?php echo base_url('assets/upload/' . $image->gambar); ?>" class="aspect-square h-full max-w-auto rounded-lg object-cover object-center" alt="<?php echo $image->judul; ?>">
                </a>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
    <p class="text-center text-xl font-normal whitespace-nowrap text-gray-500">
        No images found.
    </p>
    <?php endif; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>