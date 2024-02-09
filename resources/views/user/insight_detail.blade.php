@extends('user.component.user_template')

@section('title', 'EcoTrip')

@section('content')
    <section class="py-12">
        <div class="container mx-auto">
            <div class="flex justify-between items-center py-5 mb-6">
                <div class="flex items-center gap-16">
                    <a href="{{ route('insightList') }}"><i class='bx bx-chevron-left text-xl' ></i></a>
                    <div class="flex items-center gap-8">
                        <img src="{{ asset('assets/user/images/homeEcoInsightIcon.svg') }}" alt="Eco Insight" class="w-12">
                        <div class="flex gap-6 items-center">
                            <a href="{{ route('insightList') }}" class="text-3xl font-light">EcoInsight</a>
                            <span class="text-3xl font-light">></span>
                            <strong class="text-3xl font-bold">Artikel</strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex gap-8 my-3">
                <div class="sticky top-10 flex flex-col items-center px-8 pt-12 gap-6">
                    <span>Bagikan</span>
                    <button type="button" onClick="navigator.clipboard.writeText(window.location.href)" class="text-2xl rounded-full h-12 w-12 bg-gray/25 flex items-center justify-center transition hover:bg-gray/75"><i class='bx bx-link'></i></butto>
                </div>
                <div class="grow">
                    <img src="{{ asset('assets/user/images/insight/'.$insight->picture) }}" alt="Eco Insight" class="w-full h-96 object-cover">
                    <p class="text-gray my-4">{{ date("j F Y", strtotime($insight->date)) }}</p>
                    <div class="mt-8 w-full">
                        <h1 class="font-bold text-2xl mb-6">{{ $insight->title }}</h1>
                        <iframe src="{{ route('insightDetailContent', $insight->id) }}" frameborder="0" class="w-full" onload='javascript:(function(o){o.style.height=(o.contentWindow.document.body.scrollHeight + 150)+"px";}(this));' style="height:400px;width:100%;border:none;overflow:hidden;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div class="container mx-auto">
            <div class="px-24 py-16 rounded-lg h-96 flex justify-end items-start flex-col" style="background: linear-gradient(257deg, #3B9B88 -29.89%, rgba(59, 155, 136, 0.00) 106.79%), #134B40;">
                <h2 class="text-white text-5xl font-bold mb-4">#KiniSaatnyaBijakBerwisata</h2>
                <p class="text-white mb-6">Ecotourism is The Future of Indonesia’s Travel</p>
                <a href="{{ route('about') }}" class="rounded-full text-white border border-white px-6 py-2 transition hover:bg-white hover:text-primary">Tentang Kami</a>
            </div>
        </div>
    </section>
@endsection

@section('footExtention')
    
@endsection