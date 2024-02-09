@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="min-h-screen w-screen">
        <div class="container mx-auto flex">
            <div class="w-80 mt-12">
                <ul class="sticky top-10">
                    <li><a href="{{ route('profile') }}" class="block px-2 py-3 text-lg transition hover:text-black">Personal Info</a></li>
                    <li><a href="{{ route('voucher') }}" class="block px-2 py-3 text-lg text-gray transition hover:text-black">Voucher</a></li>
                    <li><a href="{{ route('faq') }}" class="block px-2 py-3 text-lg text-gray transition hover:text-black">FAQ</a></li>
                    <li><a href="https://wa.me/+6281246868369" target="_blank" class="block px-2 py-3 text-lg text-gray transition hover:text-black">Customer Help</a></li>
                </ul>
            </div>
            <div class="w-full mt-6">
                <h1 class="text-4xl font-bold mb-6">My Profile</h1>
                <div class="py-3 px-8 py-6 rounded-lg shadow-lg">
                    <form action="{{ route('submitProfile') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="" class="block mb-3">Nama</label>
                            <input type="text" class="block px-6 py-3 rounded-lg border border-gray/25 w-full"
                                placeholder="name" name="name" value="{{ \Illuminate\Support\Facades\Auth::user()->name }}">
                        </div>
                        <div class="mb-6">
                            <label for="" class="block mb-1">E-mail</label>
                            <input type="email" class="block px-6 py-3 rounded-lg border border-gray/25 w-full"
                                placeholder="email" name="email" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">
                        </div>
                        <div class="mb-6">
                            <label for="" class="block mb-3">Tanggal lahir</label>
                            <input type="date" class="block px-6 py-3 rounded-lg border border-gray/25 w-full"
                                placeholder="tanggal lahir" name="dob" value="{{ \Illuminate\Support\Facades\Auth::user()->dob }}">
                        </div>
                        <div class="mb-6">
                            <label for="" class="block mb-3">No Telepon</label>
                            <input type="text" class="block px-6 py-3 rounded-lg border border-gray/25 w-full"
                                placeholder="no telepon" name="telp" value="{{ \Illuminate\Support\Facades\Auth::user()->telp }}">
                        </div>
                        <div class="mb-6">
                            <label for="" class="font-medium">Jenis Kelamin</label>
                            <div class="flex items-center gap-3 ml-1">
                                <input type="radio" name="gender" value="M" {{ \Illuminate\Support\Facades\Auth::user()->gender == 'M' ? 'checked' : '' }}><label for="">Laki -laki</label>
                            </div>
                            <div class="flex items-center gap-3 ml-1">
                                <input type="radio" name="gender" value="F" {{ \Illuminate\Support\Facades\Auth::user()->gender == 'F' ? 'checked' : '' }}><label for="">Perempuan</label>
                            </div>
                        </div>
                        <div class="mt-6 mb-6">
                            <label for="" class="font-medium">Kewarganegaraan</label>
                            <select name="nationality" class="rounded border border-gray/25 px-6 py-3 block w-full mt-1">
                                <option value="0" {{ \Illuminate\Support\Facades\Auth::user()->nationality == 0 ? 'selected' : '' }}>Indonesia</option>
                                <option value="1" {{ \Illuminate\Support\Facades\Auth::user()->nationality == 1 ? 'selected' : '' }}>Foreign</option>
                            </select>
                        </div>
                        <div class="my-3 flex justify-end">
                            <button class="px-6 py-2 rounded-lg text-white bg-primary border border-primary transition hover:bg-transparent hover:text-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <a href="https://wa.me/+6281246868369" target="_blank" class="fixed bottom-8 right-8 bg-[#00D95F] w-16 h-16 flex justify-center items-center rounded-full">
        <i class='bx bxl-whatsapp text-3xl text-white'></i>
    </a>
@endsection

@section('footExtention')
    
@endsection
