@extends('layouts.app')

@section('title', __('Leadership') . ' — ' . __('INSAN International University'))

@section('content')

<x-about-layout>

    <div class="mb-10 text-start">
        <h2 class="text-3xl font-bold text-gray-900 mb-3">{{ __('University Leadership') }}</h2>
        <p class="text-gray-500 max-w-2xl">
            {{ __('Meet the senior management team driving INSAN International University\'s academic mission, strategic growth, and commitment to excellence.') }}
        </p>
    </div>

    @if ($members->isEmpty())
        <div class="text-center py-20 text-gray-400">
            <div class="text-5xl mb-4">👤</div>
            <p class="text-lg">{{ __('Leadership profiles are being updated.') }}</p>
        </div>
    @else
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 text-start">
            @foreach ($members as $member)
            <div class="group bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all">

                <div class="bg-gradient-to-br from-[#003366] to-[#00509e] h-48 flex items-center justify-center overflow-hidden">
                    <img src="{{ $member->portrait_url }}"
                         alt="{{ $member->name }}"
                         class="h-full w-full object-cover object-top group-hover:scale-105 transition-transform duration-300">
                </div>

                <div class="p-5">
                    <p class="font-bold text-gray-900">{{ $member->name }}</p>
                    <p class="text-sm text-[#003366] font-medium mt-0.5">{{ $member->title }}</p>

                    @if ($member->department)
                    <p class="text-xs text-gray-400 mt-1">{{ $member->department }}</p>
                    @endif

                    @if ($member->qualifications)
                    <p class="text-xs text-gray-500 mt-2 pt-2 border-t border-gray-100">
                        {{ $member->qualifications }}
                    </p>
                    @endif

                    @if ($member->bio)
                    <p class="text-xs text-gray-500 mt-3 leading-relaxed line-clamp-3">
                        {{ $member->bio }}
                    </p>
                    @endif

                    @if ($member->email || $member->phone)
                    <div class="flex flex-wrap gap-3 mt-4">
                        @if ($member->email)
                        <a href="mailto:{{ $member->email }}"
                           class="text-xs text-[#003366] hover:underline flex items-center gap-1">
                            <i class="fas fa-envelope"></i>
                            {{ __('Email') }}
                        </a>
                        @endif
                        @if ($member->phone)
                        <a href="tel:{{ $member->phone }}"
                           class="text-xs text-[#003366] hover:underline flex items-center gap-1">
                            <i class="fas fa-phone"></i>
                            {{ __('Call') }}
                        </a>
                        @endif
                    </div>
                    @endif

                </div>
            </div>
            @endforeach
        </div>
    @endif

</x-about-layout>

@endsection