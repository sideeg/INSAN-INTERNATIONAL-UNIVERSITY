{{-- resources/views/admissions/fees.blade.php --}}
@extends('layouts.app')

@section('title', __('Fees & Funding | Admissions | INSAN International University'))

@section('content')

@include('components.hero-section', [
    'backgroundImage' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1920&q=80',
    'title' => __('Fees &'),
    'highlightedText' => __('Funding'),
    'description' => __('Transparent fee structures to help you plan your educational investment for the :year academic year.', ['year' => $latestYear]),
    'breadcrumbs' => [
        ['label' => __('Home'), 'url' => route('home')],
        ['label' => __('Admissions'), 'url' => route('admissions')],
        ['label' => __('Fees & Funding')]
    ],
    'height' => '400px'
])

<section class="py-12 bg-cream min-h-screen">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Level Navigation Tabs --}}
        @if($availableLevels->isNotEmpty())
        <div class="flex flex-wrap justify-center gap-3 mb-12 scroll-reveal">
            @foreach($availableLevels as $level)
                <a href="{{ route('admissions.fees', ['level' => $level]) }}" 
                   class="px-6 py-3 rounded-full font-serif font-bold text-sm transition-all shadow-sm border 
                   {{ $selectedLevel === $level 
                        ? 'bg-navy-900 text-white border-navy-900 scale-105' 
                        : 'bg-white text-gray-600 border-gray-200 hover:border-gold-500 hover:text-navy-900' }}">
                   {{ $level }} {{ __('Programmes') }}
                </a>
            @endforeach
        </div>
        @endif

        {{-- Fees Content --}}
        @if($structuredFees->isEmpty())
            <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100 scroll-reveal">
                <i class="fas fa-file-invoice-dollar text-4xl text-gray-300 mb-4"></i>
                <h3 class="font-serif text-2xl text-navy-900 font-bold mb-2">{{ __('Structure Updating') }}</h3>
                <p class="text-gray-500">{{ __('The fee structure for :level is currently being updated.', ['level' => $selectedLevel]) }}</p>
            </div>
        @else
            
            <div class="mb-8 bg-gold-500/10 border-l-4 border-gold-500 p-4 rounded-r-lg scroll-reveal">
                <p class="text-sm text-navy-900 font-medium flex items-center gap-2">
                    <i class="fas fa-info-circle text-gold-600"></i>
                    {{ __('Displaying officially approved fee structure for the :year academic year.', ['year' => $latestYear]) }}
                </p>
            </div>

            <div class="space-y-8">
                @foreach($structuredFees as $category)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden scroll-reveal">
                        
                        {{-- Category Header --}}
                        <div class="bg-navy-900 text-white px-6 py-4 flex items-center justify-between">
                            <div>
                                <h3 class="font-serif text-xl font-bold">{{ $category->name }}</h3>
                                @if($category->description)
                                    <p class="text-gray-300 text-xs mt-1">{{ $category->description }}</p>
                                @endif
                            </div>
                        </div>

                        {{-- Table --}}
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-gray-50 text-gray-600 text-xs uppercase tracking-wider border-b border-gray-200">
                                        <th class="px-6 py-4 font-semibold">{{ __('Fee Description') }}</th>
                                        <th class="px-6 py-4 font-semibold">{{ __('Programme') }}</th>
                                        <th class="px-6 py-4 font-semibold">{{ __('Frequency') }}</th>
                                        <th class="px-6 py-4 font-semibold text-right">{{ __('Amount') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($category->fees as $fee)
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4">
                                            <p class="font-bold text-navy-900 text-sm">{{ $fee->name }}</p>
                                            @if($fee->notes)
                                                <p class="text-xs text-gray-500 mt-1 italic">{{ $fee->notes }}</p>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            {{ $fee->programme_name ?? __('All :level Programmes', ['level' => $selectedLevel]) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-2.5 py-1 rounded bg-gray-100 text-gray-600 text-xs font-medium">
                                                {{ $fee->frequency_label }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <span class="font-bold text-navy-900">{{ $fee->formatted_amount }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                @endforeach
            </div>
            
            {{-- Contact Admissions CTA --}}
            <div class="mt-12 text-center scroll-reveal">
                <p class="text-gray-600 mb-4">{{ __('Have questions regarding payments, installment plans, or scholarships?') }}</p>
                <a href="{{ route('admissions.scholarships') }}" class="btn-primary px-6 py-3 rounded-lg text-white font-semibold text-sm inline-flex items-center gap-2">
                    <i class="fas fa-hand-holding-usd"></i> {{ __('View Scholarship Opportunities') }}
                </a>
            </div>

        @endif

    </div>
</section>
@endsection