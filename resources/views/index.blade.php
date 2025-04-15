<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <nav
        class="flex md:justify-between justify-center bg-[#4291B0] text-white fixed top-0 w-full z-10 p-2 md:p-3 rounded-lg rounded-t-none">
        <p class="hidden md:flex md:text-xl font-bold">ToList Me</p>
        <div class="flex space-x-5 justify-center items-center">
            <a href="" class="font-normal hover:font-semibold text-md">Home</a>
            <a href="" class="font-normal hover:font-semibold text-md">About us</a>
            <a href="" class="font-normal hover:font-semibold text-md">Task</a>
        </div>
        <div></div>
    </nav>
    <div class="container mx-auto p-3 mt-10 flex flex-col ">
        <div class="flex flex-col md:flex-row md:justify-between items-center gap-5">
            <div class="space-y-2 flex-col ">
                <p class="text-sm lg:text-lg font-light font-sans">⭐ Start your productivity journey today</p>
                <h1 class="text-lg lg:text-2xl font-semibold font-sans">Where every Task is a new Achievement</h1>
                <p class="text-sm lg:text-lg font-light font-sans text text-justify">Welcome to your to-do list, where
                    progress
                    begins
                    one task at a time. Organize your goals, stay inspired, and transform your day with small wins.
                    Let’s
                    start ticking things off and making things happen!</p>
            </div>
            <div>
                <img src="{{ asset('images/buku.png') }}" alt="" class="w-full">
            </div>
        </div>
        <div class="flex md:flex-row flex-col justify-center">
            <div class="w-full bg-[#98DCEE] text-center text-gray-700 p-7 md:rounded-l-lg  space-y-2">
                <p>1</p>
                <h1 class="font-semibold md:text-lg">Clear Your Task</h1>
                <p class="text-sm font-light">Set up task Table for your project tasks with customizable backgrounds.
                </p>
            </div>
            <div class="w-full bg-red-200 text-center text-gray-700 p-7 md:rounded-r-lg  space-y-2">
                <p>2</p>
                <h1 class="font-semibold md:text-lg">Start Managing Tasks</h1>
                <p class="text-sm font-light">Add tasks, organize them into lists, and track your progress.</p>
            </div>
        </div>
        <div class="flex flex-col md:flex-row md:justify-between items-center md:space-x-15 mt-5">
            <div>
                <h1 class="text-lg font-semibold mb-2"># About this To - Do</h1>
                <p class="text-sm font-light text-justify lg:text-lg">This simple to-do list is designed to help you
                    stay focused, organized, and motivated. It’s a space to plan your day, track progress, and celebrate
                    every small win. Whether it’s a big project or a quick reminder, everything starts with writing it
                    down.</p>
            </div>
            <div class="md:max-w-md w-full">
                <img src="{{ asset('images/todo.png') }}" alt="" class="w-full">
            </div>
        </div>
        <div class="w-full bg-[#4291B0] p-3 text-center text-white mt-5 rounded-lg">
            <p class="text-sm md:text-lg">Okay Now Let’s Go to My To-Do</p>
        </div>

        <div class="flex flex-col mt-5">
            <div class="flex flex-row justify-between items-center">
                <h1 class="text-lg font-normal">Semua Tugas</h1>
                <button class="px-4 py-2 rounded-full border border-gray-700 active:bg-gray-700 active:text-white text-sm md:text-md" data-bs-toggle="modal" data-bs-target="#create-list">Tambah Task</button>
            </div>
            <div class="w-full overflow-hidden ">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-600 text-sm">
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Deskripsi</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Tanggal Mulai</th>
                                <th class="px-4 py-3">Deadline</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="text-gray-700 ">
                                <td class="px-4 py-3 border border-gray-400">
                                    Project Laravel To Do List dengan menggunakan javascript
                                </td>
                                <td class="px-4 py-3 text-ms  border border-gray-400">Membuat Project To Do list dengan
                                    Tailwind dan laravel</td>
                                <td class="px-4 py-3 text-xs border border-gray-400">
                                    <span
                                        class="px-3 py-2 font-semibold leading-tight text-green-700 bg-green-100 rounded-lg">
                                        Selesai </span>
                                </td>
                                <td class="px-4 py-3 text-sm border border-gray-400">2025-02-15 20:28:01</td>
                                <td class="px-4 py-3 text-sm border border-gray-400">2025-02-15 20:28:01</td>
                                <td class="px-4 py-3 text-sm border border-gray-400">
                                    <div class="flex justify-start gap-2 text-md">
                                        <button
                                            class="px-4 py-2 rounded-full border border-[#4291B0] active:bg-[#4291B0] active:text-white">Edit</button>
                                        <button
                                            class="px-4 py-2 rounded-full border border-red-400 active:bg-red-400 active:text-white">Delete</button>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h1 class="mt-5 text-lg font-normal">Sedang Berjalan</h1>
            <div class="w-full overflow-hidden ">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-600 text-sm">
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Deskripsi</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Tanggal Mulai</th>
                                <th class="px-4 py-3">Deadline</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="text-gray-700 ">
                                <td class="px-4 py-3 border border-gray-400">
                                    Project Laravel To Do List dengan menggunakan javascript
                                </td>
                                <td class="px-4 py-3 text-ms  border border-gray-400">Membuat Project To Do list dengan
                                    Tailwind dan laravel</td>
                                <td class="px-4 py-3 text-xs border border-gray-400">
                                    <span
                                        class="px-3 py-2 font-semibold leading-tight text-green-700 bg-green-100 rounded-lg">
                                        Selesai </span>
                                </td>
                                <td class="px-4 py-3 text-sm border border-gray-400">2025-02-15 20:28:01</td>
                                <td class="px-4 py-3 text-sm border border-gray-400">2025-02-15 20:28:01</td>
                                <td class="px-4 py-3 text-sm border border-gray-400">
                                    <div class="flex justify-start gap-2 text-md">
                                        <button
                                            class="px-4 py-2 rounded-full border border-[#4291B0] active:bg-[#4291B0] active:text-white">Edit</button>
                                        <button
                                            class="px-4 py-2 rounded-full border border-red-400 active:bg-red-400 active:text-white">Delete</button>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h1 class="mt-5 text-lg font-normal">Selesai</h1>
            <div class="w-full overflow-hidden ">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-600 text-sm">
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Deskripsi</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Tanggal Mulai</th>
                                <th class="px-4 py-3">Deadline</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="text-gray-700 ">
                                <td class="px-4 py-3 border border-gray-400 ">
                                    Project Laravel To Do List dengan menggunakan javascript
                                </td>
                                <td class="px-4 py-3 text-ms  border border-gray-400">Membuat Project To Do list dengan
                                    Tailwind dan laravel</td>
                                <td class="px-4 py-3 text-xs border border-gray-400">
                                    <span
                                        class="px-3 py-2 font-semibold leading-tight text-white bg-[#64748B] rounded-lg flex justify-start">
                                        Berjalan </span>
                                </td>
                                <td class="px-4 py-3 text-sm border border-gray-400">2025-02-15 20:28:01</td>
                                <td class="px-4 py-3 text-sm border border-gray-400">2025-02-15 20:28:01</td>
                                <td class="px-4 py-3 text-sm border border-gray-400">
                                    <div class="flex justify-start gap-2 text-md">
                                        <button
                                            class="px-4 py-2 rounded-full border border-[#4291B0] active:bg-[#4291B0] active:text-white">Edit</button>
                                        <button
                                            class="px-4 py-2 rounded-full border border-red-400 active:bg-red-400 active:text-white">Delete</button>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h1 class="mt-5 text-lg font-normal">Belum Mulai</h1>
            <div class="w-full overflow-hidden ">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-600 text-sm">
                                <th class="px-4 py-3">Nama</th>
                                <th class="px-4 py-3">Deskripsi</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Tanggal Mulai</th>
                                <th class="px-4 py-3">Deadline</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="text-gray-700 ">
                                <td class="px-4 py-3 border border-gray-400">
                                    Project Laravel To Do List dengan menggunakan javascript
                                </td>
                                <td class="px-4 py-3 text-ms  border border-gray-400">Membuat Project To Do list dengan
                                    Tailwind dan laravel</td>
                                <td class="px-4 py-3 text-xs border border-gray-400">
                                    <span
                                        class="px-3 py-2 font-semibold leading-tight text-gray-500 bg-[#E2E8F0] rounded-lg flex  justify-start ">
                                        Belum Mulai </span>
                                </td>
                                <td class="px-4 py-3 text-sm border border-gray-400">2025-02-15 20:28:01</td>
                                <td class="px-4 py-3 text-sm border border-gray-400">2025-02-15 20:28:01</td>
                                <td class="px-4 py-3 text-sm border border-gray-400">
                                    <div class="flex justify-start gap-2 text-md">
                                        <button
                                            class="px-4 py-2 rounded-full border border-[#4291B0] active:bg-[#4291B0] active:text-white">Edit</button>
                                        <button
                                            class="px-4 py-2 rounded-full border border-red-400 active:bg-red-400 active:text-white">Delete</button>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full p-4 lg:py-5  bg-[#4291B0] mt-5">
        <div class="flex flex-col md:flex-row md:justify-between gap-5 md:gap-10 mditems-center xl:px-15">
            <div class="flex flex-col text-white text-md space-y-2 ">
                <h1 class="font-semibold text-lg">ToList Me</h1>
                <p class="">This simple to-do list is designed to help you stay focused, organized, and motivated. It’s a space to plan your day, track progress, and celebrate every small win. Whether it’s a big project or a quick reminder, everything starts with writing it down.</p>
            </div>
            <div class="flex flex-col md:flex-row space-x-5 md:items-center md:mb-5 gap-5 md:gap-0">
                <div class="flex flex-col text-start text-white gap-3">
                    <h1 class="font-semibold text-lg">Company</h1>
                    <p>About</p>
                    <p>Blog</p>
                    <p>Contact</p>
                </div>
                <div class="flex flex-col md:flex-row space-x-5 ">
                    <div class="flex flex-col text-start text-white gap-3">
                        <h1 class="font-semibold text-lg">Legal</h1>
                        <p>Privacy</p>
                        <p>Terms</p>
                        <p>Security</p>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center text-white text-sm md:text-md border-t">Copyright &copy; 2023, All Right Reserved</p>
    </div>

</body>

</html>
