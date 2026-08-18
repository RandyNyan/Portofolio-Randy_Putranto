@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="relative h-screen bg-cover bg-center"
    style="background-image: url('{{ asset('assets/hero.jpg') }}')">

    <div class="absolute inset-0 bg-black/40"></div>

    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
        <h1 class="text-4xl md:text-5xl font-light tracking-wide">
            A MINIMAL, CLEAN
        </h1>
        <p class="text-2xl md:text-3xl font-light mt-2">
            LAYOUT FOR WEB DESIGN.
        </p>

        <a href="#"
            class="mt-8 inline-block border border-white px-8 py-3 hover:bg-white hover:text-black transition">
            Get Started
        </a>
    </div>
</section>

<!-- FEATURES -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 text-center px-6">

        <div>
            <div class="w-16 h-16 mx-auto mb-4 border rounded-full flex items-center justify-center">
                ✏️
            </div>
            <h3 class="font-semibold mb-2">EASY TO EDIT</h3>
            <p class="text-gray-500 text-sm">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
        </div>

        <div>
            <div class="w-16 h-16 mx-auto mb-4 border rounded-full flex items-center justify-center">
                🗂️
            </div>
            <h3 class="font-semibold mb-2">LAYERED PSD</h3>
            <p class="text-gray-500 text-sm">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
        </div>

        <div>
            <div class="w-16 h-16 mx-auto mb-4 border rounded-full flex items-center justify-center">
                🚀
            </div>
            <h3 class="font-semibold mb-2">READY TO GO</h3>
            <p class="text-gray-500 text-sm">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
        </div>

    </div>
</section>

<!-- FEATURED CONTENT -->
<section class="py-20 bg-gray-50 text-center px-6">
    <h2 class="text-2xl font-semibold mb-4">FEATURED CONTENT</h2>
    <p class="max-w-2xl mx-auto text-gray-500 mb-10">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    </p>

    <div class="max-w-4xl mx-auto">
        <div class="relative">
            <img src="{{ asset('assets/featured.jpg') }}" class="rounded shadow">
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="w-16 h-16 bg-white/80 rounded-full flex items-center justify-center">
                    ▶
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECONDARY CONTENT -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 px-6">

        <div class="border p-6 text-center">
            <h3 class="font-semibold mb-3">SECONDARY CONTENT</h3>
            <p class="text-gray-500 text-sm mb-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
            <a href="#" class="border px-4 py-2 text-sm hover:bg-black hover:text-white transition">
                View more
            </a>
        </div>

        <div>
            <img src="{{ asset('assets/secondary.jpg') }}" class="rounded shadow">
        </div>

    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-gray-50 text-center px-6">
    <h2 class="text-2xl font-semibold mb-4">HEARD ENOUGH?</h2>
    <p class="max-w-xl mx-auto text-gray-500 mb-6">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    </p>
    <a href="#" class="border px-6 py-3 hover:bg-black hover:text-white transition">
        Get Started
    </a>
</section>

<!-- FOOTER -->
<footer class="py-10 bg-white border-t">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 px-6 text-sm text-gray-500">

        <div>
            © 2014 CompanyName<br>
            <a href="#" class="underline">Terms</a> · <a href="#" class="underline">Privacy</a>
        </div>

        <div>
            <h4 class="font-semibold text-black mb-2">COMPANY</h4>
            <ul class="space-y-1">
                <li>About Us</li>
                <li>Meet The Team</li>
                <li>What We Do</li>
                <li>Careers</li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold text-black mb-2">COMPANY</h4>
            <ul class="space-y-1">
                <li>About Us</li>
                <li>Meet The Team</li>
                <li>What We Do</li>
                <li>Careers</li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold text-black mb-2">COMPANY</h4>
            <ul class="space-y-1">
                <li>About Us</li>
                <li>Meet The Team</li>
                <li>What We Do</li>
                <li>Careers</li>
            </ul>
        </div>

    </div>
</footer>

@endsection
