{{-- resources/views/about/index.blade.php --}}
@extends('layouts.app')

@section('title', __('About Us — INSAN International University'))

@section('content')

<x-about-layout>

    {{-- ── Mission & Vision ─────────────────────────────── --}}
    <section class="mb-16">
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-[#003366] text-white rounded-2xl p-8">
                <div class="text-3xl mb-3">🎯</div>
                <h2 class="text-xl font-bold mb-3">{{ __('Our Mission') }}</h2>
                <p class="text-blue-100 leading-relaxed">
                    {{ __('To provide quality higher education that develops competent, ethical, and innovative graduates who contribute positively to Sudan and the global community.') }}
                </p>
            </div>
            <div class="bg-amber-50 border border-amber-200 rounded-2xl p-8">
                <div class="text-3xl mb-3">🔭</div>
                <h2 class="text-xl font-bold text-gray-800 mb-3">{{ __('Our Vision') }}</h2>
                <p class="text-gray-600 leading-relaxed">
                    {{ __('To be a leading international university in Africa and the Arab world, recognised for excellence in teaching, research, and community engagement.') }}
                </p>
            </div>
        </div>
    </section>

    {{-- ── VC Welcome snippet ───────────────────────────── --}}
    @if ($vcProfile)
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ __('A Word from the Vice Chancellor') }}</h2>
        <div class="flex flex-col md:flex-row gap-8 bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">
            <div class="shrink-0">
                <img src="{{ $vcProfile->portrait_url }}"
                     alt="{{ $vcProfile->name }}"
                     class="w-36 h-36 rounded-full object-cover border-4 border-[#003366]">
            </div>
            <div>
                <p class="text-gray-600 leading-relaxed italic mb-4">
                    "{{ Str::limit($vcProfile->bio, 300) }}"
                </p>
                <p class="font-semibold text-gray-800">{{ $vcProfile->name }}</p>
                <p class="text-sm text-[#003366]">{{ $vcProfile->title }}</p>
                <a href="{{ route('about.vice-chancellor') }}"
                   class="inline-block mt-4 text-sm font-medium text-[#003366] underline underline-offset-4 hover:text-blue-800">
                    {{ __('Read full profile') }} →
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- ── Leadership snapshot ─────────────────────────── --}}
    @if ($leadershipSnapshot->isNotEmpty())
    <section class="mb-16">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">{{ __('Our Leadership') }}</h2>
            <a href="{{ route('about.leadership') }}" class="text-sm text-[#003366] font-medium hover:underline">
                {{ __('View all') }} →
            </a>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($leadershipSnapshot as $member)
            <div class="text-center bg-white border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <img src="{{ $member->portrait_url }}"
                     alt="{{ $member->name }}"
                     class="w-20 h-20 rounded-full object-cover mx-auto mb-4 border-2 border-gray-200">
                <p class="font-semibold text-gray-800 text-sm">{{ $member->name }}</p>
                <p class="text-xs text-[#003366] mt-1">{{ $member->title }}</p>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- ── Partners logo strip ─────────────────────────── --}}
    @if ($featuredPartners->isNotEmpty())
    <section class="mb-16">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">{{ __('Our Partners') }}</h2>
            <a href="{{ route('about.collaborations') }}" class="text-sm text-[#003366] font-medium hover:underline">
                {{ __('View all') }} →
            </a>
        </div>
        <div class="flex flex-wrap gap-6 items-center">
            @foreach ($featuredPartners as $partner)
            <a href="{{ $partner->website_url ?? '#' }}" target="_blank" rel="noopener"
               title="{{ $partner->name }}"
               class="grayscale hover:grayscale-0 transition-all">
                <img src="{{ $partner->logo_url }}"
                     alt="{{ $partner->name }}"
                     class="h-12 w-auto object-contain">
            </a>
            @endforeach
        </div>
    </section>
    @endif

    {{-- ── Latest convocation CTA ──────────────────────── --}}
    @if ($latestConvocation)
    <section>
        <div class="bg-gradient-to-r from-amber-500 to-orange-500 text-white rounded-2xl p-8 flex flex-col md:flex-row items-center gap-6">
            <div class="text-5xl">🎓</div>
            <div class="flex-1">
                <p class="text-sm uppercase tracking-widest text-amber-100 mb-1">{{ __('Graduation') }}</p>
                <h2 class="text-xl font-bold mb-2">
                    {{ $latestConvocation->ordinal ? $latestConvocation->ordinal . ' ' . __('Convocation') : $latestConvocation->title }}
                </h2>
                @if ($latestConvocation->ceremony_date)
                <p class="text-amber-100 text-sm">
                    {{ $latestConvocation->ceremony_date->format('d F Y') }}
                    @if ($latestConvocation->venue) · {{ $latestConvocation->venue }} @endif
                </p>
                @endif
            </div>
            <a href="{{ route('about.graduation.show', $latestConvocation->slug) }}"
               class="shrink-0 bg-white text-orange-600 font-semibold text-sm px-6 py-3 rounded-lg hover:bg-orange-50 transition-colors">
                {{ __('View Details') }}
            </a>
        </div>
    </section>
    @endif

</x-about-layout>

@endsection