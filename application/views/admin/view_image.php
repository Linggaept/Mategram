<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Image</title>
    <!-- Tambahkan Tailwind CSS dan Flowbite CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <!-- Gaya untuk lapisan hitam -->
</head>

<body class="bg-gray-50">
    <?php $this->load->view('partials/navbar'); ?>

    <section class="bg-gray-50 mt-4 mb-8">
        <div class="flex flex-col items-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="h-auto max-w-xl bg-white border border-gray-200 rounded-lg shadow mb-16">
                <img src="<?php echo base_url('assets/upload/' . $image->gambar); ?>" class="max-h-full max-w-auto rounded-lg" alt="<?php echo $image->judul; ?>">
                <div class="p-5">
                    <h5 class="mb-5 text-2xl font-bold tracking-tight text-gray-900">
                        <?php echo $image->judul; ?>
                    </h5>
                    <h5 class="mb-5 text-xl font-normal tracking-tight text-gray-800">
                        <?php echo $image->deskripsi; ?>
                    </h5>
                    <div class="flex flex-row gap-3">
                        <a href="<?php echo base_url('auth/dashboard'); ?>" class="flex-1">
                            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Back</button>
                        </a>
                        <a href="<?php echo base_url('dashboard/edit_image/' . $image->gambar); ?>" class="flex-1">
                            <button class="w-full py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700">Edit</button>
                        </a>
                        <a href="#" onclick="deleteImage('<?php echo $image->gambar; ?>')" class="flex-1">
                            <button class="w-full py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700">Delete</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript untuk deteksi tombol dan menampilkan lapisan hitam -->
    <script>
        function deleteImage(gambar) {
            if (confirm('Are you sure you want to delete this image?')) {
                // Implementasi logika hapus, memanggil fungsi delete_image di controller
                window.location.href = '<?php echo base_url('dashboard/delete_image/'); ?>' + gambar;
            }
        }e
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>