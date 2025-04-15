<div id="create-list" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50">
    <div class="bg-white rounded-md md:w-full md:max-w-lg mx-auto shadow-lg">
      <div class="flex items-center justify-between p-4 border-b">
        <h3 class="text-lg font-semibold">Tambahkan tugas mu</h3>
        <button onclick="toggleModal()" class="text-gray-500 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 5L5 19M5 5l14 14" color="#c6c6c6"/></svg>
        </button>
      </div>
      <div class="p-4">
        <form action="{{ route('todos.store') }}" method="POST">
          @csrf
          <div class="mb-4">
            <label for="title" class="block font-medium mb-1">Name</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500 @error('title') border-red-500 @enderror"
              required>
            @error('title')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
  
          <div class="mb-4">
            <label for="description" class="block font-medium mb-1">Deskripsi</label>
            <textarea name="description" id="description" rows="3"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500 @error('description') border-red-500 @enderror"
              required>{{ old('description') }}</textarea>
            @error('description')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
  
          <div class="mb-4">
            <label for="status" class="block font-medium mb-1">Status</label>
            <select name="status" id="status"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500 @error('status') border-red-500 @enderror"
              required>
              <option value="" disabled selected>Pilih status</option>
              <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
              <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
  
          <div class="mb-4">
            <label for="start_date" class="block font-medium mb-1">Start Date</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500 @error('start_date') border-red-500 @enderror"
              required>
            @error('start_date')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
  
          <div class="mb-4">
            <label for="end_date" class="block font-medium mb-1">End Date</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500 @error('end_date') border-red-500 @enderror"
              required>
            @error('end_date')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
  
          <div class="flex justify-end gap-2">
            <button type="submit" class="px-4 py-2 border rounded-lg border-[#4291B0] text-black hover:text-white rounded hover:bg-[#4291B0] ">Add Todo</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <script>
    function toggleModal() {
      const modal = document.getElementById('create-list');
      modal.classList.toggle('hidden');
      modal.classList.toggle('flex');
    }
  </script>