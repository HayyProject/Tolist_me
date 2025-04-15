<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-list">
        Create List
    </button>
    @include('modal.modal_create')

    <div class="container">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($todos as $todo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $todo->title }}</td>
                                <td>{{ $todo->description }}</td>
                                <td>{{ $todo->status }}</td>
                                <td>{{ $todo->start_date }} & {{ $todo->end_date }}</td>
                                <td>
                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-primary edit-btn" type="button" data-bs-toggle="modal"
                                            data-bs-target="#edit-list" data-id="{{ $todo->id }}">Edit</button>
                                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                            class="d-inline" id="delete-form-{{ $todo->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger delete-btn"
                                                onclick="confirmDelete({{ $todo->id }}, '{{ $todo->title }}')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                    @include('modal.modal_edit', ['todo' => $todo])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h1>Sedang Berjalan</h1>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($willStart as $todo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $todo->title }}</td>
                                <td>{{ $todo->description }}</td>
                                <td>{{ $todo->status }}</td>
                                <td>{{ $todo->start_date }} & {{ $todo->end_date }}</td>
                                <td>
                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-primary edit-btn" type="button" data-bs-toggle="modal"
                                            data-bs-target="#edit-list" data-id="{{ $todo->id }}">Edit</button>
                                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                            class="d-inline" id="delete-form-{{ $todo->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger delete-btn"
                                                onclick="confirmDelete({{ $todo->id }}, '{{ $todo->title }}')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                    @include('modal.modal_edit', ['todo' => $todo])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h1>Selesai</h1>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($finished as $todo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $todo->title }}</td>
                                <td>{{ $todo->description }}</td>
                                <td>{{ $todo->status }}</td>
                                <td>{{ $todo->start_date }} & {{ $todo->end_date }}</td>
                                <td>
                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-primary edit-btn" type="button" data-bs-toggle="modal"
                                            data-bs-target="#edit-list" data-id="{{ $todo->id }}">Edit</button>
                                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                            class="d-inline" id="delete-form-{{ $todo->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger delete-btn"
                                                onclick="confirmDelete({{ $todo->id }}, '{{ $todo->title }}')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                    @include('modal.modal_edit', ['todo' => $todo])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h1>Belum Mulai</h1>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notStart as $todo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $todo->title }}</td>
                                <td>{{ $todo->description }}</td>
                                <td>{{ $todo->status }}</td>
                                <td>{{ $todo->start_date }} & {{ $todo->end_date }}</td>
                                <td>
                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-primary edit-btn" type="button" data-bs-toggle="modal"
                                            data-bs-target="#edit-list" data-id="{{ $todo->id }}">Edit</button>
                                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                                            class="d-inline" id="delete-form-{{ $todo->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger delete-btn"
                                                onclick="confirmDelete({{ $todo->id }}, '{{ $todo->title }}')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                    @include('modal.modal_edit', ['todo' => $todo])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
    function confirmDelete(id, name) {
        if (confirm(`Apakah Anda yakin ingin menghapus todo "${name}"?`)) {
            document.getElementById(`delete-form-${id}`).submit();
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js"
    integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous">
</script>

</html>
