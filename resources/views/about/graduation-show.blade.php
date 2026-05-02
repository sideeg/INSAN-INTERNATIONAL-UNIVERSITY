{{-- resources/views/about/graduation-show.blade.php --}}
@extends('layouts.app')

@section('title', $event->title . ' — INSAN International University')

@section('content')

<x-about-layout>

    <div class="grid lg:grid-cols-4 gap-10">

        {{-- ── Main content ──────────────────────────────────── --}}
        <main class="lg:col-span-3">

            {{-- Hero cover --}}
            @if ($event->cover_image)
            <div class="rounded-2xl overflow-hidden h-72 mb-8 shadow-md">
                <img src="{{ $event->cover_image_url }}" alt="{{ $event->title }}"
                     class="w-full h-full object-cover">
            </div>
            @endif

            {{-- Breadcrumb --}}
            <nav class="text-xs text-gray-400 mb-4 flex items-center gap-1">
                <a href="{{ route('about.graduation') }}" class="hover:text-[#003366]">Graduation</a>
                <span>/</span>
                <span class="text-gray-600">{{ $event->title }}</span>
            </nav>

            {{-- Title block --}}
            @if ($event->convocation_number)
            <span class="inline-block bg-[#003366] text-white text-xs font-bold uppercase tracking-widest px-3 py-1 rounded-full mb-3">
                {{ $event->ordinal }} Convocation
            </span>
            @endif

            <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $event->title }}</h2>

            {{-- Meta strip --}}
            <div class="flex flex-wrap gap-6 text-sm text-gray-500 mb-8 pb-6 border-b border-gray-200">
                @if ($event->ceremony_date)
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-[#003366]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    {{ $event->ceremony_date->format('l, d F Y') }}
                </span>
                @endif
                @if ($event->venue)
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-[#003366]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    {{ $event->venue }}
                </span>
                @endif
                @if ($event->graduates_count)
                <span class="flex items-center gap-1.5">
                    🎓 {{ number_format($event->graduates_count) }} graduates
                </span>
                @endif
                @if ($event->keynote_speaker)
                <span class="flex items-center gap-1.5">
                    🎤 {{ $event->keynote_speaker }}
                </span>
                @endif
            </div>

            {{-- Live stream notice --}}
            @if ($event->isUpcoming() && $event->live_stream_url)
            <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6 flex items-center gap-4">
                <span class="inline-block w-3 h-3 bg-red-500 rounded-full animate-pulse shrink-0"></span>
                <div>
                    <p class="font-semibold text-red-700 text-sm">Live Stream Available</p>
                    <a href="{{ $event->live_stream_url }}" target="_blank"
                       class="text-sm text-red-600 underline underline-offset-2 hover:text-red-800">
                        Watch the ceremony live →
                    </a>
                </div>
            </div>
            @endif

            {{-- Description --}}
            @if ($event->description)
            <div class="prose prose-blue max-w-none text-gray-700 leading-relaxed mb-10">
                {!! nl2br(e($event->description)) !!}
            </div>
            @endif

            {{-- CTA Buttons --}}
            <div class="flex flex-wrap gap-3 mb-12">
                @if ($event->programme_booklet_url)
                <a href="{{ $event->programme_booklet_url }}" target="_blank"
                   class="inline-flex items-center gap-2 bg-[#003366] text-white text-sm font-semibold px-5 py-2.5 rounded-lg hover:bg-[#00509e] transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Download Programme Booklet
                </a>
                @endif
            </div>

            {{-- Gallery --}}
            @if (!empty($event->gallery_urls))
            <section>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Photo Gallery</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    @foreach ($event->gallery_urls as $img)
                    <div class="rounded-xl overflow-hidden h-40 bg-gray-100">
                        <img src="{{ $img }}" alt="Graduation photo"
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300 cursor-pointer">
                    </div>
                    @endforeach
                </div>
            </section>
            @endif

        </main>

        {{-- ── Sidebar: Other convocations ─────────────────────── --}}
        <aside class="lg:col-span-1">
            <div class="sticky top-28">
                <h4 class="text-sm font-bold text-gray-700 uppercase tracking-widest mb-4">
                    Other Convocations
                </h4>
                @forelse ($others as $other)
                <a href="{{ route('about.graduation.show', $other->slug) }}"
                   class="flex items-center gap-3 mb-3 p-3 rounded-xl hover:bg-gray-50 border border-transparent hover:border-gray-200 transition-all">
                    <img src="{{ $other->cover_image_url }}"
                         alt="{{ $other->title }}"
                         class="w-12 h-12 rounded-lg object-cover shrink-0">
                    <div>
                        <p class="text-xs font-semibold text-gray-700 line-clamp-2">{{ $other->title }}</p>
                        @if ($other->ceremony_date)
                        <p class="text-xs text-gray-400 mt-0.5">{{ $other->ceremony_date->format('Y') }}</p>
                        @endif
                    </div>
                </a>
                @empty
                <p class="text-sm text-gray-400">No other convocations yet.</p>
                @endforelse

                <a href="{{ route('about.graduation') }}"
                   class="block text-center text-xs text-[#003366] font-medium mt-4 hover:underline">
                    View full archive →
                </a>
            </div>
        </aside>

    </div>

</x-about-layout>

@endsection