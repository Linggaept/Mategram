<nav class="bg-white border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img class="h-8" src="<?php echo base_url('assets/brand/logo-mategram.svg'); ?>" alt="logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-900">Mategram</span>
        </a>
        <a href="<?php echo base_url('auth/logout'); ?>">
            <button type="button" class="invisible cursor-default md:cursor-pointer md:visible w-full md:max-w-xs text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Log out</button>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:flex md:items-center md:w-auto" id="navbar-default">
            <ul class="font-medium flex md:flex md:items-center p-4 md:p-0 mt-4 border border-gray-200 rounded-lg bg-white space-x-2 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="<?php echo base_url('dashboard/profile'); ?>">
                        <button type="button" class="w-full md:max-w-xs text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Profile</button>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('auth/logout'); ?>">
                        <button type="button" class="w-full md:max-w-xs text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Log out</button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>