@extends('layouts.app')

@section('title', 'Academic Calendar — INSAN International University')

@section('content')

@include('components.hero-section', [
    'backgroundImage' => 'https://images.unsplash.com/photo-1506784983877-45594efa4cbe?w=1920&q=80',
    'title'           => 'Academic Calendar',
    'highlightedText' => '{{ $currentYear ?? "2024/2025" }}',
    'description'     => 'Plan your academic year with key dates for admissions, examinations, graduations, and university events.',
    'breadcrumbs'     => [
        ['label' => 'Home',       'url' => route('home')],
        ['label' => 'Admissions', 'url' => route('admissions')],
        ['label' => 'Academic Calendar'],
    ],
    'height' => '380px',
])

<section class="bg-cream py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- ── Top Controls ──────────────────────────────────────── --}}
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-10 scroll-reveal">

            {{-- Year switcher --}}
            <div class="flex items-center gap-2 flex-wrap">
                @foreach($availableYears ?? ['2024/2025', '2023/2024'] as $year)
                <a href="{{ route('admissions.calendar', ['year' => $year]) }}"
                   class="px-4 py-2 rounded-full text-sm font-semibold border transition-all
                          {{ ($currentYear ?? '2024/2025') === $year
                             ? 'bg-navy-900 text-gold-500 border-navy-900'
                             : 'bg-white text-gray-600 border-gray-200 hover:border-navy-900 hover:text-navy-900' }}">
                    {{ $year }}
                </a>
                @endforeach
            </div>

            {{-- Actions --}}
            <div class="flex gap-3">
                <a href="{{ route('admissions.calendar.export', ['year' => $currentYear ?? '2024/2025']) }}"
                   class="flex items-center gap-2 bg-white border border-gray-200 text-navy-900 px-4 py-2.5 rounded-lg text-sm font-semibold hover:border-gold-500 hover:shadow-sm transition-all">
                    <i class="fas fa-download text-gold-500"></i> Download PDF
                </a>
                <button onclick="window.print()"
                        class="flex items-center gap-2 btn-primary px-4 py-2.5 rounded-lg text-white text-sm font-semibold">
                    <i class="fas fa-print"></i> Print
                </button>
            </div>
        </div>

        {{-- ── Legend ────────────────────────────────────────────── --}}
        <div class="flex flex-wrap gap-3 mb-10 scroll-reveal">
            @php
                $categories = \App\Models\AcademicCalendarEvent::CATEGORY_COLORS;
                $labels     = \App\Models\AcademicCalendarEvent::CATEGORY_LABELS;
            @endphp
            @foreach($categories as $key => $color)
            <button class="category-filter flex items-center gap-2 px-3 py-1.5 rounded-full border border-gray-200 bg-white text-xs font-medium text-gray-600 hover:border-navy-900 transition-all active-filter"
                    data-category="{{ $key }}">
                <span class="w-2.5 h-2.5 rounded-full" style="background-color: {{ $color }}"></span>
                {{ $labels[$key] ?? ucfirst($key) }}
            </button>
            @endforeach
            <button onclick="clearFilters()" class="px-3 py-1.5 rounded-full border border-gray-200 bg-white text-xs font-medium text-gray-400 hover:text-navy-900 hover:border-navy-900 transition-all">
                <i class="fas fa-times mr-1"></i> Clear
            </button>
        </div>

        {{-- ── Timeline ──────────────────────────────────────────── --}}
        @if(($groupedEvents ?? collect())->isEmpty())
            <div class="text-center py-24 text-gray-400">
                <div class="text-6xl mb-4">🗓️</div>
                <p class="text-lg font-serif">No calendar events published yet for {{ $currentYear ?? '2024/2025' }}.</p>
                <p class="text-sm mt-1">Please check back soon or download a previous year's calendar.</p>
            </div>
        @else
            <div id="calendarTimeline" class="space-y-12">
                @foreach($groupedEvents as $monthYear => $events)
                <div class="month-section scroll-reveal" data-month="{{ $monthYear }}">

                    {{-- Month Header --}}
                    <div class="flex items-center gap-4 mb-6">
                        <div class="bg-navy-900 text-white px-5 py-2 rounded-xl">
                            <span class="font-serif font-bold text-lg">{{ $monthYear }}</span>
                        </div>
                        <div class="flex-1 h-px bg-gray-200"></div>
                        <span class="text-xs text-gray-400 font-medium">{{ $events->count() }} {{ Str::plural('event', $events->count()) }}</span>
                    </div>

                    {{-- Events for this month --}}
                    <div class="space-y-3 pl-4 border-l-2 border-gray-200 ml-6">
                        @foreach($events as $event)
                        @php $color = $event->category_color; @endphp
                        <div class="calendar-event relative pl-6 group"
                             data-category="{{ $event->category }}">

                            {{-- Timeline dot --}}
                            <div class="absolute left-[-29px] top-4 w-4 h-4 rounded-full border-2 border-white shadow-md transition-transform group-hover:scale-125"
                                 style="background-color: {{ $color }}"></div>

                            <div class="bg-white rounded-xl border border-gray-100 hover:border-gold-500/40 hover:shadow-md transition-all duration-300 p-5">
                                <div class="flex flex-col sm:flex-row sm:items-start gap-3">

                                    {{-- Date badge --}}
                                    <div class="shrink-0 text-center bg-gray-50 rounded-lg px-4 py-2 border border-gray-100 min-w-[80px]">
                                        <div class="text-xs font-semibold text-gray-400 uppercase">
                                            {{ $event->start_date->format('M') }}
                                        </div>
                                        <div class="text-2xl font-bold text-navy-900 font-serif leading-none">
                                            {{ $event->start_date->format('d') }}
                                        </div>
                                        @if($event->is_multi_day)
                                        <div class="text-xs text-gray-400 mt-0.5">to {{ $event->end_date->format('d M') }}</div>
                                        @endif
                                    </div>

                                    {{-- Content --}}
                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-start flex-wrap gap-2 mb-1">
                                            <h3 class="font-serif font-bold text-navy-900 text-base group-hover:text-gold-600 transition-colors">
                                                {{ $event->name }}
                                            </h3>
                                            <span class="shrink-0 inline-block text-xs font-semibold px-2.5 py-0.5 rounded-full text-white"
                                                  style="background-color: {{ $color }}">
                                                {{ $event->category_label }}
                                            </span>
                                        </div>
                                        @if($event->description)
                                        <p class="text-gray-500 text-sm leading-relaxed">{{ $event->description }}</p>
                                        @endif
                                        <p class="text-xs text-gray-400 mt-2 flex items-center gap-1">
                                            <i class="far fa-calendar"></i>
                                            {{ $event->formatted_date_range }}
                                            @if($event->is_all_day)
                                                <span class="ml-1 bg-gray-100 px-1.5 py-0.5 rounded text-gray-400">All Day</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        @endif

        {{-- ── No-events-after-filter message ────────────────────── --}}
        <div id="noEventsMsg" class="hidden text-center py-16 text-gray-400">
            <div class="text-4xl mb-3">🔍</div>
            <p>No events match the selected filters.</p>
        </div>

    </div>
</section>

@endsection

@section('cta-section')
    @include('components.cta-section', [
        'title'           => 'Ready to Plan Your Year?',
        'description'     => 'Download the full academic calendar PDF and stay on top of every important date.',
        'primaryButton'   => ['text' => 'Download PDF', 'icon' => 'fa-file-pdf', 'url' => route('admissions.calendar.export', ['year' => $currentYear ?? '2024/2025'])],
        'secondaryButton' => ['text' => 'Apply Now', 'icon' => 'fa-paper-plane', 'url' => route('apply')],
    ])
@endsection

@section('page-styles')
<style>
    .calendar-event { transition: all 0.3s ease; }
    .category-filter { cursor: pointer; transition: all 0.2s ease; }
    .category-filter.active-filter { border-color: #0a1628; color: #0a1628; }
    .category-filter.dimmed { opacity: 0.4; }
    @media print {
        nav, footer, .scroll-reveal { opacity: 1 !important; transform: none !important; }
        .btn-primary, a[href] { display: none; }
        .bg-navy-900 { background-color: #0a1628 !important; -webkit-print-color-adjust: exact; }
    }
</style>
@endsection

@section('page-scripts')
<script>
    let activeFilters = new Set({{ json_encode(array_keys(\App\Models\AcademicCalendarEvent::CATEGORY_COLORS)) }});

    document.querySelectorAll('.category-filter').forEach(btn => {
        btn.addEventListener('click', () => {
            const cat = btn.dataset.category;
            if (activeFilters.has(cat)) {
                activeFilters.delete(cat);
                btn.classList.remove('active-filter');
                btn.classList.add('dimmed');
            } else {
                activeFilters.add(cat);
                btn.classList.add('active-filter');
                btn.classList.remove('dimmed');
            }
            applyFilters();
        });
    });

    function clearFilters() {
        activeFilters = new Set({{ json_encode(array_keys(\App\Models\AcademicCalendarEvent::CATEGORY_COLORS)) }});
        document.querySelectorAll('.category-filter').forEach(btn => {
            btn.classList.add('active-filter');
            btn.classList.remove('dimmed');
        });
        applyFilters();
    }

    function applyFilters() {
        let visibleCount = 0;
        document.querySelectorAll('.calendar-event').forEach(ev => {
            const show = activeFilters.has(ev.dataset.category);
            ev.style.display = show ? '' : 'none';
            if (show) visibleCount++;
        });

        // Hide entire month block if all events hidden
        document.querySelectorAll('.month-section').forEach(section => {
            const visible = [...section.querySelectorAll('.calendar-event')].some(e => e.style.display !== 'none');
            section.style.display = visible ? '' : 'none';
        });

        document.getElementById('noEventsMsg').classList.toggle('hidden', visibleCount > 0);
    }
</script>
@endsection
