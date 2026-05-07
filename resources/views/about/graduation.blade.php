{{-- resources/views/about/graduation.blade.php --}}
@extends('layouts.app')

@section('title', __('Graduation') . ' — ' . __('INSAN International University'))

@section('content')

<x-about-layout>

    <div class="mb-10">
        <h2 class="text-3xl font-bold text-gray-900 mb-3">{{ __('Graduation & Convocation') }}</h2>
        <p class="text-gray-500 max-w-2xl">
            {{ __('Celebrating the achievements of our graduates — a milestone that marks the beginning of their contribution to society. Browse our convocation archive and upcoming ceremony details.') }}
        </p>
    </div>

    {{-- ── Upcoming ceremony banner ────────────────────────── --}}
    @if ($upcoming)
    <div class="mb-12 bg-gradient-to-r from-[#003366] to-[#00509e] text-white rounded-2xl overflow-hidden shadow-lg">
        <div class="flex flex-col md:flex-row">

            <div class="md:w-1/3 h-48 md:h-auto overflow-hidden">
                <img src="{{ $upcoming->cover_image_url }}"
                     alt="{{ $upcoming->title }}"
                     class="w-full h-full object-cover opacity-80">
            </div>

            <div class="flex-1 p-8">
                <span class="inline-block bg-amber-400 text-amber-900 text-xs font-bold uppercase tracking-widest px-3 py-1 rounded-full mb-4">
                    {{ __('Upcoming') }}
                </span>

                <h3 class="text-2xl font-bold mb-2">
                    {{ $upcoming->ordinal ? $upcoming->ordinal . ' ' . __('Convocation Ceremony') : $upcoming->title }}
                </h3>

                @if ($upcoming->ceremony_date)
                <p class="text-blue-200 mb-1">
                    🗓 {{ $upcoming->ceremony_date->format('l, d F Y') }}
                </p>
                @endif

                @if ($upcoming->venue)
                <p class="text-blue-200 mb-4">📍 {{ $upcoming->venue }}</p>
                @endif

                <div class="flex flex-wrap gap-3 mt-4">
                    <a href="{{ route('about.graduation.show', $upcoming->slug) }}"
                       class="bg-white text-[#003366] font-semibold text-sm px-5 py-2.5 rounded-lg hover:bg-blue-50 transition-colors">
                        {{ __('View Details') }}
                    </a>

                    @if ($upcoming->programme_booklet_url)
                    <a href="{{ $upcoming->programme_booklet_url }}" target="_blank"
                       class="border border-white/50 text-white font-medium text-sm px-5 py-2.5 rounded-lg hover:bg-white/10 transition-colors">
                        📥 {{ __('Programme Booklet') }}
                    </a>
                    @endif

                    @if ($upcoming->live_stream_url)
                    <a href="{{ $upcoming->live_stream_url }}" target="_blank"
                       class="border border-white/50 text-white font-medium text-sm px-5 py-2.5 rounded-lg hover:bg-white/10 transition-colors flex items-center gap-2">
                        <span class="inline-block w-2 h-2 bg-red-400 rounded-full animate-pulse"></span>
                        {{ __('Live Stream') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- ── Archive --}}
    <h3 class="text-xl font-bold text-gray-800 mb-6">
        {{ __('Convocation Archive') }}
        <span class="text-sm font-normal text-gray-400 ml-2">
            ({{ $archives->count() }} {{ __('ceremonies') }})
        </span>
    </h3>

    @if ($archives->isEmpty())
        <div class="text-center py-20 text-gray-400">
            <div class="text-5xl mb-4">🎓</div>
            <p>{{ __('No convocation records have been published yet.') }}</p>
        </div>
    @else
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($archives as $event)
            <a href="{{ route('about.graduation.show', $event->slug) }}"
               class="group block bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all">

                <div class="relative h-44 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200">
                    <img src="{{ $event->cover_image_url }}"
                         alt="{{ $event->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">

                    @if ($event->convocation_number)
                    <span class="absolute top-3 left-3 bg-[#003366] text-white text-xs font-bold px-2.5 py-1 rounded-full">
                        {{ $event->ordinal }}
                    </span>
                    @endif
                </div>

                <div class="p-5">
                    <p class="font-bold text-gray-800 group-hover:text-[#003366] mb-1">
                        {{ $event->title }}
                    </p>

                    @if ($event->ceremony_date)
                    <p class="text-xs text-gray-400 mb-3">
                        🗓 {{ $event->ceremony_date->format('d F Y') }}
                        @if ($event->venue) · {{ $event->venue }} @endif
                    </p>
                    @endif

                    <div class="flex gap-4 text-xs text-gray-500 border-t border-gray-100 pt-3">
                        @if ($event->graduates_count)
                        <span>🎓 {{ number_format($event->graduates_count) }} {{ __('Graduates') }}</span>
                        @endif
                        @if ($event->keynote_speaker)
                        <span class="truncate">🎤 {{ $event->keynote_speaker }}</span>
                        @endif
                    </div>
                </div>

            </a>
            @endforeach
        </div>
    @endif

</x-about-layout>

@endsection