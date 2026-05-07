{{-- resources/views/about/vice-chancellor.blade.php --}}
@extends('layouts.app')

@section('title', __('Vice Chancellor') . ' — ' . __('INSAN International University'))

@section('content')

<x-about-layout>

    <div class="grid lg:grid-cols-3 gap-10">

        {{-- ── Portrait & quick-facts sidebar ───────────────── --}}
        <aside class="lg:col-span-1">
            <div class="sticky top-28">
                <img src="{{ $vc->portrait_url }}"
                     alt="{{ $vc->name }}"
                     class="w-full max-w-xs mx-auto rounded-2xl object-cover shadow-lg border-4 border-white ring-1 ring-gray-200">

                <div class="mt-6 bg-[#003366] text-white rounded-xl p-6 space-y-3 text-sm">
                    <p class="font-bold text-base">{{ $vc->name }}</p>
                    <p class="text-blue-200">{{ $vc->title }}</p>

                    @if ($vc->qualifications)
                    <hr class="border-blue-700">
                    <p class="text-blue-300 text-xs uppercase tracking-widest">{{ __('Qualifications') }}</p>
                    <p>{{ $vc->qualifications }}</p>
                    @endif

                    @if ($vc->email)
                    <hr class="border-blue-700">
                    <a href="mailto:{{ $vc->email }}" class="flex items-center gap-2 text-blue-200 hover:text-white">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        {{ $vc->email }}
                    </a>
                    @endif

                    @if ($vc->phone)
                    <a href="tel:{{ $vc->phone }}" class="flex items-center gap-2 text-blue-200 hover:text-white">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        {{ $vc->phone }}
                    </a>
                    @endif
                </div>
            </div>
        </aside>

        {{-- ── Main biography ─────────────────────────────────── --}}
        <main class="lg:col-span-2">
            <p class="text-sm uppercase tracking-widest text-[#003366] font-semibold mb-2">
                {{ __('Office of the Vice Chancellor') }}
            </p>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $vc->name }}</h2>
            <p class="text-gray-500 mb-8 text-lg">{{ $vc->title }}</p>

            @if ($vc->bio)
            <div class="prose prose-lg prose-blue max-w-none text-gray-700 leading-relaxed mb-8">
                {!! nl2br(e($vc->bio)) !!}
            </div>
            @endif

            @if ($vc->bio_extended)
            <div class="prose prose-blue max-w-none text-gray-600 leading-relaxed border-t border-gray-200 pt-8">
                {!! nl2br(e($vc->bio_extended)) !!}
            </div>
            @endif
        </main>

    </div>

</x-about-layout>

@endsection