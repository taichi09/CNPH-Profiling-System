<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('PDS OCR Extractor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            {{-- Error Messages --}}
            @if ($errors->any())
                <div class="mb-6 rounded-xl bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 p-4">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-red-500 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd"/>
                        </svg>
                        <ul class="text-sm text-red-600 dark:text-red-400 list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            {{-- Upload Card --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">

                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white">Personal Data Sheet Scanner</h3>
                            <p class="text-blue-100 text-sm">Powered by Google Vision API</p>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    <form
                        method="POST"
                        action="{{ route('pds.extract') }}"
                        enctype="multipart/form-data"
                        x-data="pdsUploader()"
                        @submit="submitting = true"
                    >
                        @csrf

                        {{-- Dropzone --}}
                        <div
                            class="relative border-2 border-dashed rounded-xl p-10 text-center transition-all duration-200 cursor-pointer"
                            :class="dragging
                                ? 'border-blue-500 bg-blue-50 dark:bg-blue-900/20'
                                : 'border-gray-200 dark:border-gray-600 hover:border-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700/30'"
                            @dragover.prevent="dragging = true"
                            @dragleave.prevent="dragging = false"
                            @drop.prevent="onDrop($event)"
                            @click="$refs.fileInput.click()"
                        >
                            <input
                                type="file"
                                name="pds_image"
                                accept="image/*"
                                class="hidden"
                                x-ref="fileInput"
                                @change="onFileSelect($event)"
                            >

                            {{-- Preview --}}
                            <template x-if="preview">
                                <div class="space-y-3">
                                    <img :src="preview" class="max-h-64 mx-auto rounded-lg shadow-md object-contain" alt="Preview">
                                    <p class="text-sm text-gray-500 dark:text-gray-400" x-text="fileName"></p>
                                    <button
                                        type="button"
                                        class="text-xs text-red-500 hover:text-red-700 underline"
                                        @click.stop="clearFile()"
                                    >Remove</button>
                                </div>
                            </template>

                            {{-- Placeholder --}}
                            <template x-if="!preview">
                                <div class="space-y-3">
                                    <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/30 rounded-2xl flex items-center justify-center mx-auto">
                                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-700 dark:text-gray-300">Drop your PDS image here</p>
                                        <p class="text-sm text-gray-400 dark:text-gray-500 mt-1">or click to browse &mdash; JPG, PNG, WEBP up to 10MB</p>
                                    </div>
                                </div>
                            </template>
                        </div>

                        {{-- Submit --}}
                        <div class="mt-6 flex items-center justify-between">
                            <p class="text-xs text-gray-400 dark:text-gray-500 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                </svg>
                                Image is sent directly to Google Vision API
                            </p>

                            <button
                                type="submit"
                                :disabled="!preview || submitting"
                                class="inline-flex items-center gap-2 px-6 py-2.5 bg-blue-600 hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed text-white text-sm font-semibold rounded-xl transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            >
                                <template x-if="submitting">
                                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 22 6.477 22 12h-4z"></path>
                                    </svg>
                                </template>
                                <template x-if="!submitting">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </template>
                                <span x-text="submitting ? 'Extracting...' : 'Extract Info'"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <script>
        function pdsUploader() {
            return {
                preview: null,
                fileName: '',
                dragging: false,
                submitting: false,

                onFileSelect(e) {
                    const file = e.target.files[0];
                    if (file) this.loadPreview(file);
                },

                onDrop(e) {
                    this.dragging = false;
                    const file = e.dataTransfer.files[0];
                    if (file && file.type.startsWith('image/')) {
                        this.$refs.fileInput.files = e.dataTransfer.files;
                        this.loadPreview(file);
                    }
                },

                loadPreview(file) {
                    this.fileName = file.name;
                    const reader = new FileReader();
                    reader.onload = (e) => this.preview = e.target.result;
                    reader.readAsDataURL(file);
                },

                clearFile() {
                    this.preview = null;
                    this.fileName = '';
                    this.$refs.fileInput.value = '';
                }
            }
        }
    </script>
    @endpush
</x-app-layout>