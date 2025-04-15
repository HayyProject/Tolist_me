<div id="editModal-{{ $todo->id }}"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-5 md:p-0">
    <div class="bg-white rounded-lg shadow-lg  w-full md:max-w-lg mx-auto overflow-hidden">
        <!-- Modal Header -->
        <div class="flex justify-between items-center p-4 border-b">
            <h2 class="text-lg font-semibold">Edit Tugas</h2>
            <button onclick="toggleModalEdit({{ $todo->id }})" class="text-gray-500 hover:text-gray-700 text-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 5L5 19M5 5l14 14" color="#c6c6c6" />
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <form action="{{ route('todos.update', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="p-4 space-y-4">
                <div>
                    <label for="edit-title-{{ $todo->id }}" class="block font-medium mb-1">Name</label>
                    <input type="text" name="title" id="edit-title-{{ $todo->id }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500 @error('title') border-red-500 @enderror"
                        required value="{{ $todo->title }}">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="edit-description-{{ $todo->id }}" class="block font-medium mb-1">Deskripsi</label>
                    <textarea name="description" id="edit-description-{{ $todo->id }}" rows="3"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500 @error('description') border-red-500 @enderror"
                        required>{{ $todo->description }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="edit-status-{{ $todo->id }}" class="block font-medium mb-1">Status</label>
                    <select name="status" id="edit-status-{{ $todo->id }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500 @error('status') border-red-500 @enderror"
                        required>
                        <option value="pending" {{ $todo->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ $todo->status == 'in_progress' ? 'selected' : '' }}>In Progress
                        </option>
                        <option value="completed" {{ $todo->status == 'completed' ? 'selected' : '' }}>Completed
                        </option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="edit-start_date-{{ $todo->id }}" class="block font-medium mb-1">Start Date</label>
                    <input type="date" name="start_date" id="edit-start_date-{{ $todo->id }}" value="{{ $todo->start_date }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500 @error('start_date') border-red-500 @enderror"
                        required>
                    @error('start_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="edit-end_date-{{ $todo->id }}" class="block font-medium mb-1">End Date</label>
                    <input type="date" name="end_date" id="edit-end_date-{{ $todo->id }}"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500 @error('end_date') border-red-500 @enderror"
                        value="{{ $todo->end_date }}" required>
                    @error('end_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end gap-2 px-4 pb-3 ">
                <button type="submit"
                    class="px-4 py-2 border rounded-lg border-[#4291B0] text-black hover:text-white rounded hover:bg-[#4291B0] ">Save</button>

            </div>
        </form>
    </div>
</div>
<script>
    function toggleModalEdit(id) {
        const modal = document.getElementById('editModal-' + id);
        if (modal) {
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }
    }
</script>
