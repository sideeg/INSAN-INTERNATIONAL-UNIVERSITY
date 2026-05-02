{{-- resources/views/admissions/calendar.blade.php --}}
@extends('layouts.app')

@section('title', 'Academic Calendar ' . $selectedYear . ' | INSAN International University')

@section('content')

@include('components.hero-section', [
    'backgroundImage' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=1920&q=80',
    'title' => 'Academic',
    'highlightedText' => 'Calendar',
    'description' => 'Stay on track with important dates, registration deadlines, examinations, and university holidays for the ' . $selectedYear . ' academic year.',
    'breadcrumbs' => [
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Admissions', 'url' => route('admissions')],
        ['label' => 'Academic Calendar']
    ],
    'height' => '400px'
])

<section class="py-12 bg-cream min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Filters & Export Bar --}}
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 mb-12 flex flex-col md:flex-row justify-between items-center gap-6 scroll-reveal">
            
            <form action="{{ route('admissions.calendar') }}" method="GET" class="flex flex-wrap items-center gap-4 w-full md:w-auto">
                <div class="flex items-center gap-2">
                    <label class="text-sm font-bold text-navy-900"><i class="fas fa-calendar-alt text-gold-500"></i> Year:</label>
                    <select name="year" onchange="this.form.submit()" class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-gold-500 focus:border-gold-500 p-2.5">
                        @foreach($availableYears as $year)
                            <option value="{{ $year }}" {{ $selectedYear === $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center gap-2">
                    <label class="text-sm font-bold text-navy-900"><i class="fas fa-filter text-gold-500"></i> Filter:</label>
                    <select name="category" onchange="this.form.submit()" class="bg-gray-50 border border-gray-200 text-gray-700 text-sm rounded-lg focus:ring-gold-500 focus:border-gold-500 p-2.5">
                        <option value="all">All Events</option>
                        @foreach($categories as $key => $label)
                            <option value="{{ $key }}" {{ $selectedCategory === $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </form>

            <a href="{{ route('admissions.calendar.export', ['year' => $selectedYear]) }}" target="_blank" class="btn-primary px-5 py-2.5 rounded-lg text-white font-semibold text-sm flex items-center gap-2 transition-all w-full md:w-auto justify-center">
                <i class="fas fa-file-download"></i> Export Schedule
            </a>
        </div>

        {{-- Timeline Content --}}
        @if($byMonth->isEmpty())
            <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100 scroll-reveal">
                <div class="w-20 h-20 mx-auto bg-gray-50 rounded-full flex items-center justify-center text-gray-400 mb-4 text-3xl">
                    <i class="fas fa-calendar-times"></i>
                </div>
                <h3 class="font-serif text-2xl text-navy-900 font-bold mb-2">No Events Found</h3>
                <p class="text-gray-500">No calendar events published yet for {{ $selectedYear }} under this category.</p>
                <a href="{{ route('admissions.calendar') }}" class="text-gold-600 hover:text-gold-700 font-semibold text-sm mt-4 inline-block underline">Clear Filters</a>
            </div>
        @else
            <div class="relative border-l-2 border-gold-500/30 ml-3 md:ml-6 space-y-12">
                @foreach($byMonth as $month => $events)
                    <div class="relative scroll-reveal">
                        {{-- Month Header --}}
                        <div class="mb-6 ml-8">
                            <span class="bg-navy-900 text-white px-5 py-2 rounded-full font-bold text-sm tracking-wider uppercase shadow-md">
                                {{ $month }}
                            </span>
                        </div>

                        {{-- Event Cards --}}
                        <div class="space-y-4 ml-8">
                            @foreach($events as $event)
                                <div class="relative bg-white rounded-xl p-5 shadow-sm border-l-4 hover:shadow-md transition-shadow group" style="border-left-color: {{ $event->category_color }}">
                                    {{-- Timeline Node --}}
                                    <div class="absolute -left-[2.85rem] top-1/2 -translate-y-1/2 w-5 h-5 rounded-full border-4 border-cream bg-white shadow" style="border-color: {{ $event->category_color }}"></div>
                                    
                                    <div class="flex flex-col md:flex-row md:items-center gap-4">
                                        <div class="md:w-1/4 shrink-0">
                                            <p class="font-bold text-navy-900 flex items-center gap-2">
                                                <i class="far fa-clock text-gold-500"></i> {{ $event->formatted_date_range }}
                                            </p>
                                            <span class="text-xs font-semibold px-2 py-1 rounded bg-gray-100 text-gray-600 mt-2 inline-block">
                                                {{ $event->category_label }}
                                            </span>
                                        </div>
                                        <div class="md:w-3/4 border-t md:border-t-0 md:border-l border-gray-100 pt-3 md:pt-0 md:pl-6">
                                            <h4 class="font-serif font-bold text-lg text-navy-900 mb-1 group-hover:text-gold-600 transition-colors">{{ $event->name }}</h4>
                                            @if($event->description)
                                                <p class="text-sm text-gray-500 leading-relaxed">{{ $event->description }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>
@endsection