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
    <nav class=" w-full bg-white shadow border-b border-purple-600 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{route('todos.home')}}" class="text-xl font-bold text-purple-700">ToDoApp</a>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition">Log out</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition">Login</a>
                    @endauth
                    <!-- Mobile menu button -->
                    <button id="mobile-menu-button" class="md:hidden focus:outline-none">
                        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
            <a href="#about" class="block py-2 text-gray-700 hover:text-purple-600">Tentang</a>
            <a href="#features" class="block py-2 text-gray-700 hover:text-purple-600">Fitur</a>
        </div>
    </nav>
    <div class="flex flex-col mt-5 container mx-auto">
        <div class="flex flex-row justify-between items-center mb-6">
            <h1 class="text-lg font-normal">Todo List Min</h1>
            <button
                class="px-4 py-2 rounded-full border border-purple-600 text-purple-600 hover:bg-purple-600 hover:text-white  active:text-white text-sm md:text-md"
                onclick="toggleModal()">Tambah Task</button>
        </div>
    
        <!-- Board Layout -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Belum Mulai Board -->
            <div class="bg-gray-100 rounded-lg shadow p-4">
                <h2 class="text-lg font-medium mb-4 text-red-700">Belum Mulai</h2>
                <div class="space-y-3">
                    @if (isset($notStart) && count($notStart) > 0)
                        @foreach ($notStart as $todo)
                            <div class="bg-white p-4 rounded-lg shadow border-l-4 border-red-400">
                                <div class="flex justify-between items-start">
                                    <h3 class="font-medium">{{ $todo->title }}</h3>
                                    <span class="px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">
                                        {{ $todo->status }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 mt-2">{{ $todo->description }}</p>
                                <div class="mt-3 text-xs text-gray-500">
                                    <div>Mulai: {{ $todo->start_date }}</div>
                                    <div>Deadline: {{ $todo->end_date }}</div>
                                </div>
                                <div class="flex justify-end gap-2 mt-3">
                                    <button class="px-3 py-1 text-sm rounded-full border border-[#4291B0] active:bg-[#4291B0] active:text-white"
                                        onclick="toggleModalEdit({{ $todo->id }})">Edit</button>
                                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                        class="d-inline" id="delete-form-{{ $todo->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="px-3 py-1 text-sm rounded-full border border-red-400 active:bg-red-400 active:text-white"
                                            onclick="confirmDelete({{ $todo->id }}, '{{ $todo->title }}')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                                @include('modal.modal_edit', ['todo' => $todo])
                            </div>
                        @endforeach
                    @else
                        <div class="bg-white p-4 rounded-lg shadow text-center text-gray-500">
                            Data belum ada/belum dibuat
                        </div>
                    @endif
                </div>
            </div>
    
            <!-- Sedang Berjalan Board -->
            <div class="bg-gray-100 rounded-lg shadow p-4">
                <h2 class="text-lg font-medium mb-4 text-yellow-700">Sedang Berjalan</h2>
                <div class="space-y-3">
                    @if (isset($willStart) && count($willStart) > 0)
                        @foreach ($willStart as $todo)
                            <div class="bg-white p-4 rounded-lg shadow border-l-4 border-yellow-400">
                                <div class="flex justify-between items-start">
                                    <h3 class="font-medium">{{ $todo->title }}</h3>
                                    <span class="px-2 py-1 text-xs font-semibold text-yellow-700 bg-yellow-100 rounded-full">
                                        {{ $todo->status }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 mt-2">{{ $todo->description }}</p>
                                <div class="mt-3 text-xs text-gray-500">
                                    <div>Mulai: {{ $todo->start_date }}</div>
                                    <div>Deadline: {{ $todo->end_date }}</div>
                                </div>
                                <div class="flex justify-end gap-2 mt-3">
                                    <button class="px-3 py-1 text-sm rounded-full border border-[#4291B0] active:bg-[#4291B0] active:text-white"
                                        onclick="toggleModalEdit({{ $todo->id }})">Edit</button>
                                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                        class="d-inline" id="delete-form-{{ $todo->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="px-3 py-1 text-sm rounded-full border border-red-400 active:bg-red-400 active:text-white"
                                            onclick="confirmDelete({{ $todo->id }}, '{{ $todo->title }}')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                                @include('modal.modal_edit', ['todo' => $todo])
                            </div>
                        @endforeach
                    @else
                        <div class="bg-white p-4 rounded-lg shadow text-center text-gray-500">
                            Data belum ada/belum dibuat
                        </div>
                    @endif
                </div>
            </div>
    
            <!-- Selesai Board -->
            <div class="bg-gray-100 rounded-lg shadow p-4">
                <h2 class="text-lg font-medium mb-4 text-green-700">Selesai</h2>
                <div class="space-y-3">
                    @if (isset($finished) && count($finished) > 0)
                        @foreach ($finished as $todo)
                            <div class="bg-white p-4 rounded-lg shadow border-l-4 border-green-400">
                                <div class="flex justify-between items-start">
                                    <h3 class="font-medium">{{ $todo->title }}</h3>
                                    <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">
                                        {{ $todo->status }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 mt-2">{{ $todo->description }}</p>
                                <div class="mt-3 text-xs text-gray-500">
                                    <div>Mulai: {{ $todo->start_date }}</div>
                                    <div>Deadline: {{ $todo->end_date }}</div>
                                </div>
                                <div class="flex justify-end gap-2 mt-3">
                                    <button class="px-3 py-1 text-sm rounded-full border border-[#4291B0] active:bg-[#4291B0] active:text-white"
                                        onclick="toggleModalEdit({{ $todo->id }})">Edit</button>
                                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                        class="d-inline" id="delete-form-{{ $todo->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="px-3 py-1 text-sm rounded-full border border-red-400 active:bg-red-400 active:text-white"
                                            onclick="confirmDelete({{ $todo->id }}, '{{ $todo->title }}')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                                @include('modal.modal_edit', ['todo' => $todo])
                            </div>
                        @endforeach
                    @else
                        <div class="bg-white p-4 rounded-lg shadow text-center text-gray-500">
                            Data belum ada/belum dibuat
                        </div>
                    @endif
                </div>
            </div>
        </div>
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
