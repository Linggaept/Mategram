<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <title>Profile</title>
</head>
<body>

<nav class="bg-white border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img class="h-8" src="<?php echo base_url('assets/brand/logo-mategram.svg'); ?>" alt="logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-900">Mategram</span>
        </a>
    </div>
    </nav>

    <!-- Tampilkan profilepicture disini -->
    <img src="<?php echo base_url('assets/profile/' . $profile_picture); ?>" alt="Profile Picture" class="rounded-full h-36 w-36 object-cover object-center mx-auto mt-12 mb-4">
    
    <div class="mb-4">
        <p class="text-center text-4xl font-bold whitespace-nowrap text-gray-900">
            <?php echo $user->nickname; ?>
        </p>
        <p class="text-center text-xl font-normal whitespace-nowrap text-gray-500 mb-2">
            @<?php echo $user->username; ?>
        </p>
        <p class="text-center text-base font-normal whitespace-nowrap text-gray-400">
            Password: <?php echo $user->password; ?>
        </p>
        <p class="text-center text-base font-normal whitespace-nowrap text-gray-400">
            Code: <?php echo $user->kode; ?>
        </p>
    </div>

    <div class="flex flex-col lg:flex-row gap-3 max-w-md mx-auto px-8 justify-center">
        <a href="#" class="flex-1">
            <button onclick="copyToClipboard()" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center lg:mb-0">Copy</button>
        </a>
        <a href="<?php echo base_url('auth/dashboard'); ?>" class="flex-1">
            <button class="w-full py-2.5 px-3 me-2 mb-2 lg:mb-0 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700">Back</button>
        </a>
        <a href="<?php echo base_url('authguest/guestlogin'); ?>" class="flex-1">
            <button class="w-full py-2.5 px-3 me-2 mb-2 lg:mb-0 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700">Guest</button>
        </a>
    </div>
   

    <script>
    function copyToClipboard() {
            const username = "<?php echo $user->username; ?>";
            const kode = "<?php echo $user->kode; ?>";
            const url = `link: https://mategram.xyz/authguest/guestlogin \nusername: ${username} \nkode: ${kode}`;

            const textArea = document.createElement("textarea");
            textArea.value = url;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);

            alert("URL login berhasil disalin!");
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>