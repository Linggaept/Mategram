<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <title>Register</title>
</head>
<body>
<section class="bg-gray-50 pt-8 pb-12">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
            <img class="h-8 mr-2" src="<?php echo base_url('assets/brand/logo-mategram.svg'); ?>" alt="logo">
            Mategram   
        </a>
        <div class="w-full bg-white rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight text-gray-900 md:text-2xl">
                    Sign in to your account
                </h1>
                <?php echo validation_errors('<p class="text-red-500">', '</p>'); ?>
                <?php echo form_open('auth/do_register', array('method' => 'post', 'class' => 'space-y-4 md:space-y-6', 'enctype' => 'multipart/form-data')); ?>
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Your username</label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="username" required="">
                    </div>
                    <div>
                        <label for="nickname" class="block mb-2 text-sm font-medium text-gray-900">Your nickname</label>
                        <input type="text" name="nickname" id="nickname" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="nickname" required="">
                    </div>
                    <div>
                        <label for="profilepicture" class="block mb-2 text-sm font-medium text-gray-900">Profile Picture</label>
                        <input class="block w-full text-sm text-gray-400 bg-gray-50 border border-gray-300 rounded-lg cursor-pointer bg-gray-0 focus:outline-none placeholder-gray-300" name="profilepicture" id="profilepicture" type="file">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="8 characters" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                    </div>
                    <div>
                        <label for="kode" class="block mb-2 text-sm font-medium text-gray-900">Code</label>
                        <input type="password" name="kode" id="kode" placeholder="6 Characters" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-5">Sign up</button>
                    <?php echo form_close(); ?>
                    <p class="text-sm font-light text-gray-500">
                        Do have an account yet? <a href="<?php echo base_url('auth/login'); ?>" class="font-medium text-primary-600 hover:underline">Sign in</a>
                    </p>

                </form>
            </div>
        </div>
    </div>
</section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>