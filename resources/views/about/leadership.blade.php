{{-- resources/views/about/leadership.blade.php --}}
@extends('layouts.app')

@section('title', 'Leadership — INSAN International University')

@section('content')

<x-about-layout>

    <div class="mb-10">
        <h2 class="text-3xl font-bold text-gray-900 mb-3">University Leadership</h2>
        <p class="text-gray-500 max-w-2xl">
            Meet the senior management team driving INSAN International University's academic mission,
            strategic growth, and commitment to excellence.
        </p>
    </div>

    @if ($members->isEmpty())
        <div class="text-center py-20 text-gray-400">
            <div class="text-5xl mb-4">👤</div>
            <p class="text-lg">Leadership profiles are being updated.</p>
        </div>
    @else
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($members as $member)
            <div class="group bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all">

                {{-- Portrait --}}
                <div class="bg-gradient-to-br from-[#003366] to-[#00509e] h-48 flex items-center justify-center overflow-hidden">
                    <img src="{{ $member->portrait_url }}"
                         alt="{{ $member->name }}"
                         class="h-full w-full object-cover object-top group-hover:scale-105 transition-transform duration-300">
                </div>

                {{-- Info --}}
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

                    {{-- Contact links --}}
                    @if ($member->email || $member->phone)
                    <div class="flex gap-3 mt-4">
                        @if ($member->email)
                        <a href="mailto:{{ $member->email }}"
                           class="text-xs text-[#003366] hover:underline flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Email
                        </a>
                        @endif
                        @if ($member->phone)
                        <a href="tel:{{ $member->phone }}"
                           class="text-xs text-[#003366] hover:underline flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            Call
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