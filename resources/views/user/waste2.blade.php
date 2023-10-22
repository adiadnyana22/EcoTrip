@extends('user.component.user_default_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="h-screen w-screen grid grid-cols-2">
        <div class="shadow-xl max-h-screen max-w-full pl-24 pt-12 pr-16 sticky top-0 left-0" x-data="{ modelOpen: false }">
            <div class="flex items-center gap-8">
                <i class='bx bx-chevron-left text-4xl'></i>
                <img src="{{ asset('assets/user/images/homeLogo.png') }}" alt="Logo" class="w-32">
            </div>
            <a href="#" class="my-12 shadow px-6 py-4 rounded-xl block" @click="modelOpen = true">
                <h2>Apa itu EcoWaste?</h2>
                <div class="flex justify-between items-center text-gray">
                    <p>Klik untuk ketahui lebih detail</p>
                </div>
            </a>
            <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="fixed inset-0 transition-opacity bg-gray bg-opacity-40" aria-hidden="true"
                    ></div>

                    <div x-cloak x-show="modelOpen"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
                    >
                        <div class="flex items-center justify-between space-x-4">
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('assets/user/images/ecoWasteLogo.png') }}" alt="EcoWaste" class="w-14 h-14">
                                <h1 class="text-2xl font-bold text-gray-800">EcoWaste</h1>
                            </div>

                            <!-- <button type="button" @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button> -->
                        </div>

                        <div class="mt-6 flex flex-col gap-4">
                            <p>
                                EcoWaste adalah fitur yang dapat mendukung wisatawan dalam melakukan pengelolaan sampah secara mandiri saat melakukan ekowisata.
                            </p>
                            <strong>Cara pengiriman sampah,</strong>
                            <ul class="flex flex-col gap-3">
                                <li class="flex items-center gap-3">
                                    <i class='bx bx-check flex items-center justify-center w-5 h-5 p-4 rounded-full bg-primary/10 text-primary'></i>
                                    <p>
                                        Wisatawan harus taat dan patuh dengan peraturan penerapan ekowisata yang ada di tempat wisata
                                    </p>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class='bx bx-check flex items-center justify-center w-5 h-5 p-4 rounded-full bg-primary/10 text-primary'></i>
                                    <p>
                                        Wisatawan tidak boleh membuang sampah sembarang dan harus membuang sampah pada tempatnya
                                    </p>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class='bx bx-check flex items-center justify-center w-5 h-5 p-4 rounded-full bg-primary/10 text-primary'></i>
                                    <p>
                                        Wisatawan dapat mengumpulkan sampah anorganik ke dalam plastik yang telah diberikan dan nantinya sampah akan dikumpulkan di meeting point terakhir
                                    </p>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class='bx bx-check flex items-center justify-center w-5 h-5 p-4 rounded-full bg-primary/10 text-primary'></i>
                                    <p>
                                        Wisatawan wajib melakukan pengisian informasi kode unik yang ada di tampilan e-tiket di eco waste
                                    </p>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class='bx bx-check flex items-center justify-center w-5 h-5 p-4 rounded-full bg-primary/10 text-primary'></i>
                                    <p>
                                        Wisatawan wajib melakukan upload foto terkait sampah yang sudah terkumpul
                                    </p>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class='bx bx-check flex items-center justify-center w-5 h-5 p-4 rounded-full bg-primary/10 text-primary'></i>
                                    <p>
                                        Wisatawan wajib mengunggah foto yang jelas dan terlihat semua sampah yang telah dikumpulkan dalam 1 frame foto
                                    </p>
                                </li>
                            </ul>
                            <div class="flex justify-center gap-6 mt-4">
                                <button type="button" class="px-4 py-2 bg-primary text-white rounded-lg" @click="modelOpen = false">Ya, saya mengerti</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-6">
                <h2 class="text-primary font-bold text-2xl">EcoWaste</h2>
                <ul class="flex flex-col gap-8 mt-6 relative">
                    <li class="flex items-center gap-8 relative z-10">
                        <div class="bg-primary w-10 h-10 text-white rounded-full flex justify-center items-center">1</div>
                        <div class="text-lg">Pilih Tiket</div>
                    </li>
                    <li class="flex items-center gap-8 relative z-10">
                        <div class="bg-primary w-10 h-10 text-white rounded-full flex justify-center items-center">2</div>
                        <div class="text-lg">Dokumentasikan Sampah</div>
                    </li>
                    <li class="flex items-center gap-8 relative z-10">
                        <div class="bg-gray w-10 h-10 text-white rounded-full flex justify-center items-center">3</div>
                        <div class="text-lg text-gray">Kirimkan Sampahmu!</div>
                    </li>
                    <div class="absolute left-5 top-4 border-l-2 border-dotted border-gray z-0" style="height: calc(100% - 2rem)"></div>
                </ul>
            </div>
        </div>
        <div class="max-h-screen max-w-full bg-[#F4F4F4] pl-24 pt-12 pr-16 pb-16 overflow-auto">
            <form action="{{ route('mtdWaste2') }}" method="POST" enctype="multipart/form-data" x-data="dataFileDnD()">
                @csrf
                <div class="mt-6 mb-4">
                    <h1 class="text-3xl font-bold">Dokumentasi Sampah</h1>
                </div>
                <div class="bg-white rounded-lg shadow mb-5">
                    <div class="flex justify-between items-center font-medium px-6 pt-4"><span>Foto Sampah</span></div>
                    <div class="relative flex flex-col p-4 text-black rounded">
                        <div x-ref="dnd"
                            class="relative flex flex-col text-gray border border-gray border-dashed rounded cursor-pointer">
                            <input accept=".jpg,.jpeg,.png" type="file" name="file[]" multiple
                                class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
                                @change="addFiles($event)"
                                @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
                                @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                title="" />

                            <div class="flex flex-col items-center justify-center py-10 text-center">
                                <svg class="w-6 h-6 mr-1 text-current-50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="m-0">Drag your files here or click in this area.</p>
                            </div>
                        </div>

                        <template x-if="files.length > 0">
                            <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-4" @drop.prevent="drop($event)"
                                @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                                <template x-for="(_, index) in Array.from({ length: files.length })">
                                    <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none"
                                        style="padding-top: 100%;" @dragstart="dragstart($event)" @dragend="fileDragging = null"
                                        :class="{'border-blue-600': fileDragging == index}" draggable="true" :data-index="index">
                                        <button class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none" type="button" @click="remove(index)">
                                            <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                        <template x-if="files[index].type.includes('audio/')">
                                            <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                            </svg>
                                        </template>
                                        <template x-if="files[index].type.includes('application/') || files[index].type === ''">
                                            <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                        </template>
                                        <template x-if="files[index].type.includes('image/')">
                                            <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview"
                                                x-bind:src="loadFile(files[index])" />
                                        </template>
                                        <template x-if="files[index].type.includes('video/')">
                                            <video
                                                class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                                <fileDragging x-bind:src="loadFile(files[index])" type="video/mp4">
                                            </video>
                                        </template>

                                        <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                            <span class="w-full font-bold text-gray-900 truncate"
                                                x-text="files[index].name">Loading</span>
                                            <span class="text-xs text-gray-900" x-text="humanFileSize(files[index].size)">...</span>
                                        </div>

                                        <div class="absolute inset-0 z-40 transition-colors duration-300" @dragenter="dragenter($event)"
                                            @dragleave="fileDropping = null"
                                            :class="{'bg-blue-200 bg-opacity-80': fileDropping == index && fileDragging != index}">
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>
                </div>
                
                <div class="flex justify-end">
                    <input type="hidden" name="ticketId" value="{{ $ticketId }}">
                    <button class="rounded-lg px-4 py-2 text-white" x-bind:class="(files.length == 0) ? 'bg-gray' : 'bg-black'" x-bind:disabled="files.length == 0">Selanjutnya</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('footExtention')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/create-file-list"></script>
    <script>
    function dataFileDnD() {
        return {
            files: [],
            fileDragging: null,
            fileDropping: null,
            humanFileSize(size) {
                const i = Math.floor(Math.log(size) / Math.log(1024));
                return (
                    (size / Math.pow(1024, i)).toFixed(2) * 1 +
                    " " +
                    ["B", "kB", "MB", "GB", "TB"][i]
                );
            },
            remove(index) {
                let files = [...this.files];
                files.splice(index, 1);

                this.files = createFileList(files);
            },
            drop(e) {
                let removed, add;
                let files = [...this.files];

                removed = files.splice(this.fileDragging, 1);
                files.splice(this.fileDropping, 0, ...removed);

                this.files = createFileList(files);

                this.fileDropping = null;
                this.fileDragging = null;
            },
            dragenter(e) {
                let targetElem = e.target.closest("[draggable]");

                this.fileDropping = targetElem.getAttribute("data-index");
            },
            dragstart(e) {
                this.fileDragging = e.target
                    .closest("[draggable]")
                    .getAttribute("data-index");
                e.dataTransfer.effectAllowed = "move";
            },
            loadFile(file) {
                const preview = document.querySelectorAll(".preview");
                const blobUrl = URL.createObjectURL(file);

                preview.forEach(elem => {
                    elem.onload = () => {
                        URL.revokeObjectURL(elem.src); // free memory
                    };
                });

                return blobUrl;
            },
            addFiles(e) {
                const files = createFileList([...this.files], [...e.target.files]);
                this.files = files;
                this.form.formData.files = [...files];
            }
        };
    }
    </script>
@endsection
