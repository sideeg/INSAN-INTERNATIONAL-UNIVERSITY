@extends('layouts.app')

@section('title', __('Governance — INSAN International University'))
@section('content')

<x-about-layout>

    <div class="mb-10">
<h2>{{ __('Governance') }}</h2>        
<p>
{{ __('INSAN International University is governed by a robust framework of councils, boards, and committees that uphold institutional integrity, transparency, and academic excellence.') }}
</p>
    </div>

    {{-- Structure --}}
    <div class="grid md:grid-cols-3 gap-6 mb-14">
        @foreach ([
            ['icon' => '🏛️', 'title' => __('University Council'), 'body' => __('The supreme governing body responsible for policy, strategy, and oversight of the university\'s affairs.')],
            ['icon' => '📚', 'title' => __('Academic Senate'), 'body' => __('Oversees academic standards, curriculum development, and the conferment of degrees and certificates.')],
            ['icon' => '💼', 'title' => __('Management Board'), 'body' => __('Manages the day-to-day administration, financial planning, and operational excellence of the university.')],
        ] as $card)
        <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
            <div class="text-3xl mb-3">{{ $card['icon'] }}</div>
            <h3 class="font-bold text-gray-800 mb-2">{{ $card['title'] }}</h3>
            <p class="text-gray-500 text-sm leading-relaxed">{{ $card['body'] }}</p>
        </div>
        @endforeach
    </div>

    @if ($members->isEmpty())
        <div class="text-center py-20 text-gray-400">
            <div class="text-5xl mb-4">👤</div>
            <p class="text-lg">{{ __('Governance profiles are being updated.') }}</p>
            <p class="text-sm mt-1">{{ __('Please check back soon.') }}</p>
        </div>
    @else
        <h3 class="text-xl font-bold text-gray-800 mb-6">{{ __('Board & Council Members') }}</h3>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($members as $member)
            <div class="flex items-start gap-4 bg-white border border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow">
                <img src="{{ $member->portrait_url }}"
                     alt="{{ $member->name }}"
                     class="w-16 h-16 rounded-full object-cover border-2 border-gray-100">

                <div>
                    <p class="font-semibold text-gray-800 text-sm">{{ $member->name }}</p>
                    <p class="text-xs text-[#003366] font-medium mt-0.5">{{ $member->title }}</p>

                    @if ($member->qualifications)
                    <p class="text-xs text-gray-400 mt-1">{{ $member->qualifications }}</p>
                    @endif

                    @if ($member->department)
                    <p class="text-xs text-gray-500 mt-1 italic">{{ $member->department }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    @endif

</x-about-layout>

@endsection