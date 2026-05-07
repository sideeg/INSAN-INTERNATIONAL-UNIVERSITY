@extends('layouts.app')

@section('title', $event->title . ' — ' . __('INSAN International University'))

@section('content')

<x-about-layout>

    <div class="grid lg:grid-cols-4 gap-10">

        <main class="lg:col-span-3">

            @if ($event->cover_image)
            <div class="rounded-2xl overflow-hidden h-72 mb-8 shadow-md">
                <img src="{{ $event->cover_image_url }}" alt="{{ $event->title }}"
                     class="w-full h-full object-cover">
            </div>
            @endif

            {{-- Breadcrumb --}}
            <nav class="text-xs text-gray-400 mb-4 flex items-center gap-1">
                <a href="{{ route('about.graduation') }}" class="hover:text-[#003366]">
                    {{ __('Graduation') }}
                </a>
                <span>/</span>
                <span class="text-gray-600">{{ $event->title }}</span>
            </nav>

            @if ($event->convocation_number)
            <span class="inline-block bg-[#003366] text-white text-xs font-bold uppercase tracking-widest px-3 py-1 rounded-full mb-3">
                {{ $event->ordinal }} {{ __('Convocation') }}
            </span>
            @endif

            <h2 class="text-3xl font-bold text-gray-900 mb-2">{{ $event->title }}</h2>

            {{-- Meta --}}
            <div class="flex flex-wrap gap-6 text-sm text-gray-500 mb-8 pb-6 border-b border-gray-200">

                @if ($event->ceremony_date)
                <span class="flex items-center gap-1.5">
                    {{ $event->ceremony_date->format('l, d F Y') }}
                </span>
                @endif

                @if ($event->venue)
                <span class="flex items-center gap-1.5">
                    {{ $event->venue }}
                </span>
                @endif

                @if ($event->graduates_count)
                <span>
                    🎓 {{ number_format($event->graduates_count) }} {{ __('Graduates') }}
                </span>
                @endif

                @if ($event->keynote_speaker)
                <span>
                    🎤 {{ $event->keynote_speaker }}
                </span>
                @endif

            </div>

            {{-- Live --}}
            @if ($event->isUpcoming() && $event->live_stream_url)
            <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6 flex items-center gap-4">
                <span class="inline-block w-3 h-3 bg-red-500 rounded-full animate-pulse"></span>
                <div>
                    <p class="font-semibold text-red-700 text-sm">{{ __('Live Stream Available') }}</p>
                    <a href="{{ $event->live_stream_url }}" target="_blank"
                       class="text-sm text-red-600 underline">
                        {{ __('Watch the ceremony live') }} →
                    </a>
                </div>
            </div>
            @endif

            @if ($event->description)
            <div class="prose prose-blue max-w-none text-gray-700 mb-10">
                {!! nl2br(e($event->description)) !!}
            </div>
            @endif

            {{-- CTA --}}
            @if ($event->programme_booklet_url)
            <a href="{{ $event->programme_booklet_url }}" target="_blank"
               class="inline-flex items-center gap-2 bg-[#003366] text-white text-sm font-semibold px-5 py-2.5 rounded-lg">
                {{ __('Download Programme Booklet') }}
            </a>
            @endif

            {{-- Gallery --}}
            @if (!empty($event->gallery_urls))
            <section class="mt-10">
                <h3 class="text-xl font-bold text-gray-800 mb-4">{{ __('Photo Gallery') }}</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    @foreach ($event->gallery_urls as $img)
                    <img src="{{ $img }}" alt="{{ __('Graduation photo') }}"
                         class="w-full h-40 object-cover rounded-xl">
                    @endforeach
                </div>
            </section>
            @endif

        </main>

        {{-- Sidebar --}}
        <aside class="lg:col-span-1">
            <div class="sticky top-28">
                <h4 class="text-sm font-bold text-gray-700 uppercase mb-4">
                    {{ __('Other Convocations') }}
                </h4>

                @forelse ($others as $other)
                <a href="{{ route('about.graduation.show', $other->slug) }}"
                   class="flex items-center gap-3 mb-3 p-3 rounded-xl hover:bg-gray-50">

                    <img src="{{ $other->cover_image_url }}"
                         alt="{{ $other->title }}"
                         class="w-12 h-12 rounded-lg object-cover">

                    <div>
                        <p class="text-xs font-semibold text-gray-700">{{ $other->title }}</p>
                        @if ($other->ceremony_date)
                        <p class="text-xs text-gray-400">{{ $other->ceremony_date->format('Y') }}</p>
                        @endif
                    </div>
                </a>

                @empty
                <p class="text-sm text-gray-400">{{ __('No other convocations yet.') }}</p>
                @endforelse

                <a href="{{ route('about.graduation') }}"
                   class="block text-center text-xs text-[#003366] font-medium mt-4 hover:underline">
                    {{ __('View full archive') }} →
                </a>
            </div>
        </aside>

    </div>

</x-about-layout>

@endsection