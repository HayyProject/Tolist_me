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
        <div class="flex flex-col md:flex-row md:justify-between items-center space-x-15 mt-5">
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
    </div>

</body>

</html>
