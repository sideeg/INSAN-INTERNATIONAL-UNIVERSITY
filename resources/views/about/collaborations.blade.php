{{-- resources/views/about/collaborations.blade.php --}}
@extends('layouts.app')

@section('title', 'Collaborations & Partners — INSAN International University')

@section('content')

<x-about-layout>

    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-3">Collaborations & Partnerships</h2>
        <p class="text-gray-500 max-w-2xl">
            INSAN International University has forged strategic alliances with academic institutions,
            government bodies, industry leaders, and international organisations to enrich our
            programmes, research, and student opportunities.
        </p>
    </div>

    {{-- ── Stats strip ─────────────────────────────────────── --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
        @foreach ($typeCounts as $pType => $count)
        @php
            $labels = [
                'academic'      => ['🎓', 'Academic'],
                'industry'      => ['🏭', 'Industry'],
                'government'    => ['🏛️', 'Government'],
                'international' => ['🌍', 'International'],
                'mou'           => ['📄', 'MoU Partners'],
            ];
            [$icon, $label] = $labels[$pType] ?? ['🤝', ucfirst($pType)];
        @endphp
        <a href="{{ route('about.collaborations', ['type' => $pType]) }}"
           class="bg-white border rounded-xl p-4 text-center shadow-sm hover:shadow-md transition-shadow
                  {{ $type === $pType ? 'border-[#003366] ring-1 ring-[#003366]' : 'border-gray-200' }}">
            <div class="text-2xl mb-1">{{ $icon }}</div>
            <div class="text-2xl font-bold text-[#003366]">{{ $count }}</div>
            <div class="text-xs text-gray-500 mt-0.5">{{ $label }}</div>
        </a>
        @endforeach

        {{-- All tab --}}
        <a href="{{ route('about.collaborations') }}"
           class="bg-white border rounded-xl p-4 text-center shadow-sm hover:shadow-md transition-shadow
                  {{ ! $type ? 'border-[#003366] ring-1 ring-[#003366]' : 'border-gray-200' }}">
            <div class="text-2xl mb-1">🤝</div>
            <div class="text-2xl font-bold text-[#003366]">{{ $partners->count() }}</div>
            <div class="text-xs text-gray-500 mt-0.5">All Partners</div>
        </a>
    </div>

    {{-- ── Partner cards (grouped or flat) ────────────────── --}}
    @if ($partners->isEmpty())
        <div class="text-center py-20 text-gray-400">
            <div class="text-5xl mb-4">🤝</div>
            <p class="text-lg">No partners found for this category.</p>
            <a href="{{ route('about.collaborations') }}" class="text-sm text-[#003366] mt-2 inline-block hover:underline">
                View all partners →
            </a>
        </div>
    @elseif ($type)
        {{-- Flat list for filtered view --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($partners as $partner)
                @include('about._partner-card', compact('partner'))
            @endforeach
        </div>
    @else
        {{-- Grouped view --}}
        @php
            $groupLabels = [
                'mou'           => ['📄', 'Memoranda of Understanding (MoU)'],
                'academic'      => ['🎓', 'Academic Institutions'],
                'international' => ['🌍', 'International Organisations'],
                'government'    => ['🏛️', 'Government Bodies'],
                'industry'      => ['🏭', 'Industry Partners'],
            ];
        @endphp

        @foreach ($groupLabels as $gType => [$gIcon, $gLabel])
            @if (isset($grouped[$gType]) && $grouped[$gType]->isNotEmpty())
            <section class="mb-12">
                <h3 class="text-xl font-bold text-gray-800 flex items-center gap-2 mb-6 pb-3 border-b border-gray-200">
                    <span>{{ $gIcon }}</span> {{ $gLabel }}
                    <span class="ml-auto text-sm font-normal text-gray-400">
                        {{ $grouped[$gType]->count() }} {{ Str::plural('partner', $grouped[$gType]->count()) }}
                    </span>
                </h3>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($grouped[$gType] as $partner)
                        @include('about._partner-card', compact('partner'))
                    @endforeach
                </div>
            </section>
            @endif
        @endforeach
    @endif

</x-about-layout>

@endsection