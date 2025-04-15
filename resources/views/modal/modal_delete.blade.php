<div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black/50 hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-md w-96 text-center">
        <div class="flex flex-col items-center gap-4">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                    <path fill="#fd2323"
                        d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6zm3.17-6.41a.996.996 0 1 1 1.41-1.41L12 12.59l1.41-1.41a.996.996 0 1 1 1.41 1.41L13.41 14l1.41 1.41a.996.996 0 1 1-1.41 1.41L12 15.41l-1.41 1.41a.996.996 0 1 1-1.41-1.41L10.59 14zM18 4h-2.5l-.71-.71c-.18-.18-.44-.29-.7-.29H9.91c-.26 0-.52.11-.7.29L8.5 4H6c-.55 0-1 .45-1 1s.45 1 1 1h12c.55 0 1-.45 1-1s-.45-1-1-1" />
                </svg>
            </div>
            <div class="text-center gap-3">
                <h2 class="text-xl font-semibold  text-red-600">Menghapus Tugas</h2>
                <p class="">Apakah kamu yakin ingin menghapus <span id="deleteItemName" class="font-bold"></span>?
                </p>
            </div>
        </div>
        <div class="flex justify-center gap-4 mt-6">
            <button type="button" onclick="closeDeleteModal()" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                Batal
            </button>
            <button onclick="submitDelete()"
                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Hapus</button>
        </div>
    </div>
</div>

<script>
    let selectedTodoId = null;

    function showDeleteModal(id, title) {
        selectedTodoId = id;
        document.getElementById('deleteItemName').textContent = title;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        selectedTodoId = null;
        document.getElementById('deleteModal').classList.add('hidden');
    }

    function submitDelete() {
        if (selectedTodoId !== null) {
            document.getElementById('delete-form-' + selectedTodoId).submit();
        }
    }
</script>
