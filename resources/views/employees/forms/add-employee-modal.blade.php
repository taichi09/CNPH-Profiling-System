<!-- Backdrop -->
<div id="modal-backdrop" style="display:none;position:fixed;inset:0;background:rgba(17,24,39,0.6);z-index:9998;"></div>

<!-- Modal -->
<div id="add-employee-modal"
    style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:9999;padding-top:5rem;padding-left:clamp(1rem, 20vw, 22rem);"
    class="flex items-start justify-center"
    role="dialog"
    aria-modal="true"
    aria-labelledby="add-employee-modal-label">

    <!-- Modal Box -->
    <div id="modal-box" class="relative bg-white border border-gray-200 rounded-xl shadow-xl w-full max-w-lg transform transition-all duration-300 scale-95 opacity-0">

        <!-- Modal Header -->
        <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
            <h3 id="add-employee-modal-label" class="font-bold text-gray-800 text-lg">Add Employee</h3>
            <button type="button" id="modal-close-x" class="size-8 inline-flex justify-center items-center rounded-full bg-gray-100 text-gray-800 hover:bg-gray-200">
                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                </svg>
            </button>
        </div>

        <!-- Modal Body (your form goes here) -->
        <div class="p-4 sm:p-6">
            <p class="text-gray-500 text-sm">Form content will go here.</p>
        </div>

        <!-- Modal Footer -->
        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200">
            <button type="button" id="modal-cancel-btn" class="py-2 px-4 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50">
                Cancel
            </button>
            <button type="submit" form="add-employee-form" class="py-2 px-4 text-sm font-semibold rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                Save Employee
            </button>
        </div>
    </div>
</div>

<!-- Modal Script -->
<script>
    const modal     = document.getElementById('add-employee-modal');
    const modalBox  = document.getElementById('modal-box');
    const backdrop  = document.getElementById('modal-backdrop');
    const openBtn   = document.getElementById('open-add-employee-modal');
    const closeXBtn = document.getElementById('modal-close-x');
    const cancelBtn = document.getElementById('modal-cancel-btn');

    function openModal() {
        modal.style.display = 'flex';
        backdrop.style.display = 'block';
        document.body.classList.add('overflow-hidden');
        requestAnimationFrame(() => {
            modalBox.classList.remove('scale-95', 'opacity-0');
            modalBox.classList.add('scale-100', 'opacity-100');
        });
    }

    function closeModal() {
        modalBox.classList.remove('scale-100', 'opacity-100');
        modalBox.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.style.display = 'none';
            backdrop.style.display = 'none';
            document.body.classList.remove('overflow-hidden');
        }, 200);
    }

    openBtn.addEventListener('click', openModal);
    closeXBtn.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);

    backdrop.addEventListener('click', closeModal);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.style.display === 'flex') closeModal();
    });
</script>