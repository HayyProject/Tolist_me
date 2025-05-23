<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    @include('modal.modal_create')
    <nav
        class="flex md:justify-between justify-center bg-[#4291B0] text-white fixed top-0 w-full z-10 p-2 md:p-3 rounded-lg rounded-t-none">
        <p class="hidden md:flex md:text-xl font-bold">ToList Me</p>
        <div class="flex space-x-5 justify-center items-center">
            <a href="#home" class="font-normal hover:font-semibold text-md lg:text-lg">Home</a>
            <a href="#about" class="font-normal hover:font-semibold text-md lg:text-lg">About us</a>
            <a href="#task" class="font-normal hover:font-semibold text-md lg:text-lg">Task</a>
        </div>
        <div></div>
    </nav>
    <div class="container mx-auto p-3 mt-10 flex flex-col ">
        <div class="flex flex-col md:flex-row md:justify-between items-center gap-5" id="home">
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
            <div class="w-full bg-[#FEC05D] text-center text-gray-700 p-7 md:rounded-r-lg  space-y-2">
                <p>2</p>
                <h1 class="font-semibold md:text-lg">Start Managing Tasks</h1>
                <p class="text-sm font-light">Add tasks, organize them into lists, and track your progress.</p>
            </div>
        </div>
        <div class="flex flex-col md:flex-row md:justify-between items-center md:space-x-15 mt-5 gap-5" id="about">
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
                <button
                    class="px-4 py-2 rounded-full border border-gray-700 active:bg-gray-700 active:text-white text-sm md:text-md"
                    onclick="toggleModal()">Tambah Task</button>
            </div>


            <div class="w-full overflow-hidden" id="task">
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
                            @if (isset($todos) && count($todos) > 0)
                                @foreach ($todos as $todo)
                                    <tr class="text-gray-700 ">
                                        <td class="px-4 py-3 border border-gray-400">
                                            {{ $todo->title }}
                                        </td>
                                        <td class="px-4 py-3 text-ms  border border-gray-400">{{ $todo->description }}
                                        </td>
                                        <td class="px-4 py-3 text-sm border border-gray-400">
                                            @switch($todo->status)
                                                @case('pending')
                                                    <span
                                                        class="px-3 py-2 font-semibold leading-tight text-red-700 bg-red-100 rounded-lg">
                                                        {{ $todo->status }}
                                                    </span>
                                                @break

                                                @case('in_progress')
                                                    <span
                                                        class="px-3 py-2 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-lg">
                                                        {{ $todo->status }}
                                                    </span>
                                                @break

                                                @case('completed')
                                                    <span
                                                        class="px-3 py-2 font-semibold leading-tight text-green-700 bg-green-100 rounded-lg">
                                                        {{ $todo->status }}
                                                    </span>
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="px-4 py-3 text-sm border border-gray-400">{{ $todo->start_date }}
                                        </td>
                                        <td class="px-4 py-3 text-sm border border-gray-400">{{ $todo->end_date }}</td>
                                        <td class="px-4 py-3 text-sm border border-gray-400">
                                            <div class="flex justify-start gap-2 text-md">
                                                <button
                                                    class="px-4 py-2 rounded-full border border-[#4291B0] active:bg-[#4291B0] active:text-white"
                                                    onclick="toggleModalEdit({{ $todo->id }})">Edit</button>

                                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                                    class="d-inline" id="delete-form-{{ $todo->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="px-4 py-2 rounded-full border border-red-400 active:bg-red-400 active:text-white"
                                                        onclick="confirmDelete({{ $todo->id }}, '{{ $todo->title }}')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                            @include('modal.modal_edit', ['todo' => $todo])

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="text-gray-700 ">
                                    <td class="px-4 py-3 border border-gray-400 text-center" colspan="6">Data belum
                                        ada/belum dibuat</td>
                                </tr>
                            @endif
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
                            @if (isset($notStart) && count($notStart) > 0)
                                @foreach ($notStart as $todo)
                                    <tr class="text-gray-700 ">
                                        <td class="px-4 py-3 border border-gray-400">
                                            {{ $todo->title }}
                                        </td>
                                        <td class="px-4 py-3 text-ms  border border-gray-400">{{ $todo->description }}
                                        </td>
                                        <td class="px-4 py-3 text-sm border border-gray-400">
                                            @switch($todo->status)
                                                @case('pending')
                                                    <span
                                                        class="px-3 py-2 font-semibold leading-tight text-red-700 bg-red-100 rounded-lg">
                                                        {{ $todo->status }}
                                                    </span>
                                                @break

                                                @case('in_progress')
                                                    <span
                                                        class="px-3 py-2 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-lg">
                                                        {{ $todo->status }}
                                                    </span>
                                                @break

                                                @case('completed')
                                                    <span
                                                        class="px-3 py-2 font-semibold leading-tight text-green-700 bg-green-100 rounded-lg">
                                                        {{ $todo->status }}
                                                    </span>
                                                @break
                                            @endswitch
                                        </td>
                                        <td class="px-4 py-3 text-sm border border-gray-400">{{ $todo->start_date }}
                                        </td>
                                        <td class="px-4 py-3 text-sm border border-gray-400">{{ $todo->end_date }}
                                        </td>
                                        <td class="px-4 py-3 text-sm border border-gray-400">
                                            <div class="flex justify-start gap-2 text-md">
                                                <button
                                                    class="px-4 py-2 rounded-full border border-[#4291B0] active:bg-[#4291B0] active:text-white"
                                                    onclick="toggleModalEdit({{ $todo->id }})">Edit</button>
                                                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                                    class="d-inline" id="delete-form-{{ $todo->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="px-4 py-2 rounded-full border border-red-400 active:bg-red-400 active:text-white"
                                                        onclick="confirmDelete({{ $todo->id }}, '{{ $todo->title }}')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                            @include('modal.modal_edit', ['todo' => $todo])

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="text-gray-700 ">
                                    <td class="px-4 py-3 border border-gray-400 text-center" colspan="6">Data belum
                                        ada/belum dibuat</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
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
                        @if (isset($willStart) && count($willStart) > 0)
                            @foreach ($willStart as $todo)
                                <tr class="text-gray-700 ">
                                    <td class="px-4 py-3 border border-gray-400">
                                        {{ $todo->title }}
                                    </td>
                                    <td class="px-4 py-3 text-ms  border border-gray-400">{{ $todo->description }}
                                    </td>
                                    <td class="px-4 py-3 text-sm border border-gray-400">
                                        @switch($todo->status)
                                            @case('pending')
                                                <span
                                                    class="px-3 py-2 font-semibold leading-tight text-red-700 bg-red-100 rounded-lg">
                                                    {{ $todo->status }}
                                                </span>
                                            @break

                                            @case('in_progress')
                                                <span
                                                    class="px-3 py-2 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-lg">
                                                    {{ $todo->status }}
                                                </span>
                                            @break

                                            @case('completed')
                                                <span
                                                    class="px-3 py-2 font-semibold leading-tight text-green-700 bg-green-100 rounded-lg">
                                                    {{ $todo->status }}
                                                </span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td class="px-4 py-3 text-sm border border-gray-400">{{ $todo->start_date }}</td>
                                    <td class="px-4 py-3 text-sm border border-gray-400">{{ $todo->end_date }}</td>
                                    <td class="px-4 py-3 text-sm border border-gray-400">
                                        <div class="flex justify-start gap-2 text-md">
                                            <button
                                                class="px-4 py-2 rounded-full border border-[#4291B0] active:bg-[#4291B0] active:text-white"
                                                onclick="toggleModalEdit({{ $todo->id }})">Edit</button>
                                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                                class="d-inline" id="delete-form-{{ $todo->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="px-4 py-2 rounded-full border border-red-400 active:bg-red-400 active:text-white"
                                                    onclick="confirmDelete({{ $todo->id }}, '{{ $todo->title }}')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                        @include('modal.modal_edit', ['todo' => $todo])

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-gray-700 ">
                                <td class="px-4 py-3 border border-gray-400 text-center" colspan="6">Data belum
                                    ada/belum dibuat</td>
                            </tr>
                        @endif
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
                        @if (isset($finished) && count($finished) > 0)
                            @foreach ($finished as $todo)
                                <tr class="text-gray-700 ">
                                    <td class="px-4 py-3 border border-gray-400 ">
                                        {{ $todo->title }}
                                    </td>
                                    <td class="px-4 py-3 text-ms  border border-gray-400">{{ $todo->description }}
                                    </td>
                                    <td class="px-4 py-3 text-sm border border-gray-400">
                                        @switch($todo->status)
                                            @case('pending')
                                                <span
                                                    class="px-3 py-2 font-semibold leading-tight text-red-700 bg-red-100 rounded-lg ">
                                                    {{ $todo->status }}
                                                </span>
                                            @break

                                            @case('in_progress')
                                                <span
                                                    class="px-3 py-2 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-lg">
                                                    {{ $todo->status }}
                                                </span>
                                            @break

                                            @case('completed')
                                                <span
                                                    class="px-3 py-2 font-semibold leading-tight text-green-700 bg-green-100 rounded-lg">
                                                    {{ $todo->status }}
                                                </span>
                                            @break
                                        @endswitch
                                    </td>
                                    <td class="px-4 py-3 text-sm border border-gray-400">{{ $todo->start_date }}</td>
                                    <td class="px-4 py-3 text-sm border border-gray-400">{{ $todo->end_date }}</td>
                                    <td class="px-4 py-3 text-sm border border-gray-400">
                                        <div class="flex justify-start gap-2 text-md">
                                            <button
                                                class="px-4 py-2 rounded-full border border-[#4291B0] active:bg-[#4291B0] active:text-white"
                                                onclick="toggleModalEdit({{ $todo->id }})">Edit</button>
                                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                                class="d-inline" id="delete-form-{{ $todo->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="px-4 py-2 rounded-full border border-red-400 active:bg-red-400 active:text-white"
                                                    onclick="confirmDelete({{ $todo->id }}, '{{ $todo->title }}')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                        @include('modal.modal_edit', ['todo' => $todo])
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-gray-700 ">
                                <td class="px-4 py-3 border border-gray-400 text-center" colspan="6">Data belum
                                    ada/belum dibuat</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="w-full p-4 lg:py-5  bg-[#4291B0] mt-5">
        <div class="flex flex-col md:flex-row md:justify-between gap-5 md:gap-10 mditems-center xl:px-15">
            <div class="flex flex-col text-white text-md space-y-2 ">
                <h1 class="font-semibold text-lg">ToList Me</h1>
                <p class="">This simple to-do list is designed to help you stay focused, organized, and
                    motivated. It’s a space to plan your day, track progress, and celebrate every small win. Whether
                    it’s a big project or a quick reminder, everything starts with writing it down.</p>
            </div>
            <div class="flex flex-col md:flex-row space-x-5 md:items-center md:mb-5 gap-5 ">
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
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                toggleModal();
                toggleModalEdit()
            });
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(id, name) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                html: `Anda akan menghapus todo <strong>${name}</strong>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${id}`).submit();
                    Swal.fire({
                        title: 'Menghapus...',
                        html: 'Sedang memproses penghapusan',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                }
            });
        }

        $(document).ready(function() {
            function checkTodoStatus() {
                var currentDate = new Date();
                currentDate.setHours(0, 0, 0, 0);

                $('tbody tr').each(function() {
                    var $row = $(this);
                    var $statusBadge = $row.find('td:nth-child(3) span');
                    var currentStatus = $statusBadge.text().trim();
                    var startDateStr = $row.find('td:nth-child(4)').text().trim();
                    var endDateStr = $row.find('td:nth-child(5)').text().trim();
                    var todoId = $row.find('button[onclick^="toggleModalEdit"]').attr('onclick').match(
                        /\d+/)[0];

                    var startDate = new Date(startDateStr);
                    var endDate = new Date(endDateStr);
                    startDate.setHours(0, 0, 0, 0);
                    endDate.setHours(0, 0, 0, 0);

                    // Debugging
                    console.log(`Todo ${todoId}:`, {
                        currentStatus,
                        startDate,
                        endDate,
                        currentDate
                    });

                    // Logika update status yang lebih komprehensif
                    if (currentDate >= startDate && currentDate <= endDate) {
                        if (currentStatus !== 'in_progress') {
                            updateTodoStatus(todoId, 'in_progress', $statusBadge);
                        }
                    } else if (currentDate > endDate) {
                        if (currentStatus !== 'completed') {
                            updateTodoStatus(todoId, 'completed', $statusBadge);
                        }
                    } else if (currentDate < startDate) {
                        if (currentStatus !== 'pending') {
                            updateTodoStatus(todoId, 'pending', $statusBadge);
                        }
                    }
                });
            }

            function updateTodoStatus(todoId, newStatus, $statusElement) {
                $.ajax({
                    url: '/todos/' + todoId + '/status',
                    type: 'PUT',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        status: newStatus
                    },
                    success: function(response) {
                        updateStatusBadge($statusElement, newStatus);
                        updateTableRowPosition($statusElement.closest('tr'), newStatus);
                    },
                    error: function(xhr) {
                        console.error('Error updating status:', xhr.responseText);
                    }
                });
            }

            function updateStatusBadge($element, newStatus) {
                $element.removeClass('bg-red-100 bg-yellow-100 bg-green-100')
                    .removeClass('text-red-700 text-yellow-700 text-green-700')
                    .text(newStatus);

                var newClass = '';
                switch (newStatus) {
                    case 'pending':
                        newClass = 'bg-red-100 text-red-700';
                        break;
                    case 'in_progress':
                        newClass = 'bg-yellow-100 text-yellow-700';
                        break;
                    case 'completed':
                        newClass = 'bg-green-100 text-green-700';
                        break;
                }
                $element.addClass(newClass);
            }

            function updateTableRowPosition($row, newStatus) {
                var $targetTable = $('#task');

                if (newStatus === 'pending') {
                    $targetTable = $('h1:contains("Belum Mulai")').closest('div').next().find('table');
                } else if (newStatus === 'in_progress') {
                    $targetTable = $('h1:contains("Sedang Berjalan")').closest('div').next().find('table');
                } else if (newStatus === 'completed') {
                    $targetTable = $('h1:contains("Selesai")').closest('div').next().find('table');
                }

                $row.detach().appendTo($targetTable.find('tbody'));
            }

            checkTodoStatus();
        });
    </script>
</body>

</html>
