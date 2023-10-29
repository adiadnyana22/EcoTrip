@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="py-12">
        <div class="container mx-auto">
            <h2 class="text-center text-4xl font-bold mb-8 text-primary">Frequently Ask Question</h2>
            <ul class="w-full">
                <li x-data="{ open: false }" class="mb-4">
                    <div class="cursor-pointer flex justify-between items-center px-8 py-4 rounded border border-gray/25 text-primary" @click="open = ! open">
                        <div class="text-xl">Apa itu EcoWisata?</div>
                        <div class="text-2xl"><i class='bx bx-chevron-down' ></i></div>
                    </div>
                    <p class="px-8 py-4" x-show="open">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi, debitis delectus dolorum ducimus, eligendi est et illo ipsum labore nisi numquam perspiciatis quaerat quas quisquam sint vero, voluptate voluptatem.
                    </p>
                </li>
                <li x-data="{ open: false }" class="mb-4">
                    <div class="cursor-pointer flex justify-between items-center px-8 py-4 rounded border border-gray/25 text-primary" @click="open = ! open">
                        <div class="text-xl">Bagaimana Cara memesan EcoExplore?</div>
                        <div class="text-2xl"><i class='bx bx-chevron-down' ></i></div>
                    </div>
                    <p class="px-8 py-4" x-show="open">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus tempora nesciunt rerum enim asperiores laudantium maiores sed nihil, ratione officiis vitae provident doloribus commodi velit quibusdam beatae fuga eveniet debitis.
                    </p>
                </li>
                <li x-data="{ open: false }" class="mb-4">
                    <div class="cursor-pointer flex justify-between items-center px-8 py-4 rounded border border-gray/25 text-primary" @click="open = ! open">
                        <div class="text-xl">Apa itu EcoWisata?</div>
                        <div class="text-2xl"><i class='bx bx-chevron-down' ></i></div>
                    </div>
                    <p class="px-8 py-4" x-show="open">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate doloremque, corrupti dolore saepe exercitationem magnam quod optio perspiciatis dignissimos cumque nostrum atque odit explicabo, ab dolorum quia delectus at ea.
                    </p>
                </li>
                <li x-data="{ open: false }" class="mb-4">
                    <div class="cursor-pointer flex justify-between items-center px-8 py-4 rounded border border-gray/25 text-primary" @click="open = ! open">
                        <div class="text-xl">Apa itu EcoWisata?</div>
                        <div class="text-2xl"><i class='bx bx-chevron-down' ></i></div>
                    </div>
                    <p class="px-8 py-4" x-show="open">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi, debitis delectus dolorum ducimus, eligendi est et illo ipsum labore nisi numquam perspiciatis quaerat quas quisquam sint vero, voluptate voluptatem.
                    </p>
                </li>
                <li x-data="{ open: false }" class="mb-4">
                    <div class="cursor-pointer flex justify-between items-center px-8 py-4 rounded border border-gray/25 text-primary" @click="open = ! open">
                        <div class="text-xl">Bagaimana Cara memesan EcoExplore?</div>
                        <div class="text-2xl"><i class='bx bx-chevron-down' ></i></div>
                    </div>
                    <p class="px-8 py-4" x-show="open">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus tempora nesciunt rerum enim asperiores laudantium maiores sed nihil, ratione officiis vitae provident doloribus commodi velit quibusdam beatae fuga eveniet debitis.
                    </p>
                </li>
                <li x-data="{ open: false }" class="mb-4">
                    <div class="cursor-pointer flex justify-between items-center px-8 py-4 rounded border border-gray/25 text-primary" @click="open = ! open">
                        <div class="text-xl">Apa itu EcoWisata?</div>
                        <div class="text-2xl"><i class='bx bx-chevron-down' ></i></div>
                    </div>
                    <p class="px-8 py-4" x-show="open">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate doloremque, corrupti dolore saepe exercitationem magnam quod optio perspiciatis dignissimos cumque nostrum atque odit explicabo, ab dolorum quia delectus at ea.
                    </p>
                </li>
                <li x-data="{ open: false }" class="mb-4">
                    <div class="cursor-pointer flex justify-between items-center px-8 py-4 rounded border border-gray/25 text-primary" @click="open = ! open">
                        <div class="text-xl">Apa itu EcoWisata?</div>
                        <div class="text-2xl"><i class='bx bx-chevron-down' ></i></div>
                    </div>
                    <p class="px-8 py-4" x-show="open">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi, debitis delectus dolorum ducimus, eligendi est et illo ipsum labore nisi numquam perspiciatis quaerat quas quisquam sint vero, voluptate voluptatem.
                    </p>
                </li>
                <li x-data="{ open: false }" class="mb-4">
                    <div class="cursor-pointer flex justify-between items-center px-8 py-4 rounded border border-gray/25 text-primary" @click="open = ! open">
                        <div class="text-xl">Bagaimana Cara memesan EcoExplore?</div>
                        <div class="text-2xl"><i class='bx bx-chevron-down' ></i></div>
                    </div>
                    <p class="px-8 py-4" x-show="open">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus tempora nesciunt rerum enim asperiores laudantium maiores sed nihil, ratione officiis vitae provident doloribus commodi velit quibusdam beatae fuga eveniet debitis.
                    </p>
                </li>
                <li x-data="{ open: false }" class="mb-4">
                    <div class="cursor-pointer flex justify-between items-center px-8 py-4 rounded border border-gray/25 text-primary" @click="open = ! open">
                        <div class="text-xl">Apa itu EcoWisata?</div>
                        <div class="text-2xl"><i class='bx bx-chevron-down' ></i></div>
                    </div>
                    <p class="px-8 py-4" x-show="open">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate doloremque, corrupti dolore saepe exercitationem magnam quod optio perspiciatis dignissimos cumque nostrum atque odit explicabo, ab dolorum quia delectus at ea.
                    </p>
                </li>
            </ul>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto">
            <div class="px-24 py-16 rounded-lg h-96 flex justify-end items-start flex-col" style="background: linear-gradient(257deg, #3B9B88 -29.89%, rgba(59, 155, 136, 0.00) 106.79%), #134B40;">
                <h2 class="text-white text-5xl font-bold mb-4">#KiniSaatnyaBijakBerwisata</h2>
                <p class="text-white mb-6">Ecotourism is The Future of Indonesia’s Travel</p>
                <a href="#" class="rounded-full text-white border border-white px-6 py-2 transition hover:bg-white hover:text-primary">Tentang Kami</a>
            </div>
        </div>
    </section>

    <a href="https://wa.me/+6281246868369" target="_blank" class="fixed bottom-8 right-8 bg-[#00D95F] w-16 h-16 flex justify-center items-center rounded-full">
        <i class='bx bxl-whatsapp text-3xl text-white'></i>
    </a>
@endsection

@section('footExtention')
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
