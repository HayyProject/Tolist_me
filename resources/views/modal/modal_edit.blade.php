<div class="modal fade" id="edit-list" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Todo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit-title" name="title"
                            value="{{ $todo->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit-description" name="description" rows="3" required>{{ $todo->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit-status" class="form-label">Status</label>
                        <select class="form-select" id="edit-status" name="status" required>
                            <option value="pending" {{ $todo->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ $todo->status == 'in_progress' ? 'selected' : '' }}>In
                                Progress</option>
                            <option value="completed" {{ $todo->status == 'completed' ? 'selected' : '' }}>Completed
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="edit-start_date" name="start_date"
                            value="{{ $todo->start_date }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="edit-end_date" name="end_date"
                            value="{{ $todo->end_date }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
