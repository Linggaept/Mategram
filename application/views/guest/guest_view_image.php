<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <title>Guest View Image</title>
</head>
<body class="bg-gray-50">

    <section class="bg-gray-50 mt-4 mb-8">
        <div class="flex flex-col items-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="h-auto max-w-xl bg-white border border-gray-200 rounded-lg shadow mb-16">
                <img src="<?php echo base_url('assets/upload/' . $image->gambar); ?>" class="max-h-full max-w-auto rounded-lg" alt="<?php echo $image->judul; ?>">
                <div class="p-5">
                    <h5 class="mb-5 text-2xl font-bold tracking-tight text-gray-900">
                        <?php echo $image->judul; ?>
                    </h5>
                    <div class="flex flex-row gap-3">
                        <a href="<?php echo base_url('guest_dashboard/index'); ?>" class="flex-1">
                            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>