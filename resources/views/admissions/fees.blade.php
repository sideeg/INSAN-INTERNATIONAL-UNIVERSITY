@extends('layouts.app')

@section('title', 'Fees & Funding — INSAN International University')

@section('content')

@include('components.hero-section', [
    'backgroundImage' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=1920&q=80',
    'title'           => 'Fees &',
    'highlightedText' => 'Funding',
    'description'     => 'Transparent, up-to-date fee structures and funding options to help you plan your education investment.',
    'breadcrumbs'     => [
        ['label' => 'Home',       'url' => route('home')],
        ['label' => 'Admissions', 'url' => route('admissions')],
        ['label' => 'Fees & Funding'],
    ],
    'height' => '380px',
])

<section class="bg-cream py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- ── Top Controls ──────────────────────────────────────── --}}
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-10 scroll-reveal">
            <div>
                <h2 class="font-serif text-2xl font-bold text-navy-900">
                    Fee Schedule — Academic Year {{ $currentYear ?? \App\Models\Fee::latestYear() }}
                </h2>
                <p class="text-gray-500 text-sm mt-1">All fees are listed in Uganda Shillings (UGX) unless otherwise stated.</p>
            </div>

            {{-- Year switcher --}}
            <div class="flex items-center gap-2 flex-wrap">
                @foreach($availableLevels ?? [] as $lvl)
                <button class="level-filter px-4 py-2 rounded-full text-sm font-semibold border transition-all bg-white text-gray-600 border-gray-200 hover:border-navy-900 hover:text-navy-900"
                        data-level="{{ $lvl }}">
                    {{ $lvl }}
                </button>
                @endforeach
                <button class="level-filter active-level px-4 py-2 rounded-full text-sm font-semibold border bg-navy-900 text-gold-500 border-navy-900" data-level="all">
                    All Levels
                </button>
            </div>
        </div>

        {{-- ── Fee Categories ────────────────────────────────────── --}}
        @if(($feeCategories ?? collect())->isEmpty())
            <div class="text-center py-24 text-gray-400">
                <div class="text-6xl mb-4">💰</div>
                <p class="text-lg font-serif">Fee information is being updated.</p>
                <p class="text-sm mt-1">Please contact the Finance Office for current fee schedules.</p>
            </div>
        @else
            <div id="feeTables" class="space-y-10">
                @foreach($feeCategories as $category)
                <div class="fee-category-block scroll-reveal" data-category="{{ $category->slug }}">

                    {{-- Category Header --}}
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 rounded-xl bg-navy-900 flex items-center justify-center text-gold-500 shrink-0">
                            @php
                                $catIcons = [
                                    'tuition'       => 'fa-book',
                                    'accommodation' => 'fa-home',
                                    'registration'  => 'fa-file-alt',
                                    'examination'   => 'fa-pen-alt',
                                    'library'       => 'fa-book-open',
                                    'medical'       => 'fa-heartbeat',
                                    'activity'      => 'fa-running',
                                    'guild'         => 'fa-users',
                                ];
                            @endphp
                            <i class="fas {{ $catIcons[$category->slug] ?? 'fa-receipt' }}"></i>
                        </div>
                        <h3 class="font-serif text-xl font-bold text-navy-900">{{ $category->name }}</h3>
                        @if($category->description)
                        <span class="text-sm text-gray-400 italic">— {{ $category->description }}</span>
                        @endif
                    </div>

                    {{-- Fees Table --}}
                    <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm">
                        <table class="w-full text-sm" id="table-{{ $category->slug }}">
                            <thead>
                                <tr class="bg-navy-900 text-white text-xs uppercase tracking-wider">
                                    <th class="px-6 py-3 text-left font-semibold">Programme / Description</th>
                                    <th class="px-6 py-3 text-left font-semibold">Level</th>
                                    <th class="px-6 py-3 text-right font-semibold">Amount</th>
                                    <th class="px-6 py-3 text-left font-semibold">Frequency</th>
                                    <th class="px-6 py-3 text-left font-semibold hidden md:table-cell">Notes</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($category->fees as $fee)
                                <tr class="fee-row hover:bg-gray-50 transition-colors"
                                    data-level="{{ strtolower($fee->programme_level) }}">
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-navy-900">{{ $fee->name }}</div>
                                        @if($fee->programme_name)
                                        <div class="text-xs text-gray-400 mt-0.5">{{ $fee->programme_name }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-block px-2.5 py-1 rounded-full text-xs font-semibold
                                            {{ strtolower($fee->programme_level) === 'undergraduate'
                                               ? 'bg-blue-50 text-blue-700'
                                               : (strtolower($fee->programme_level) === 'postgraduate'
                                                  ? 'bg-purple-50 text-purple-700'
                                                  : 'bg-amber-50 text-amber-700') }}">
                                            {{ $fee->programme_level }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <span class="font-bold text-navy-900 font-mono">
                                            {{ $fee->formatted_amount }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 text-xs">
                                        {{ $fee->frequency_label }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-400 text-xs hidden md:table-cell">
                                        {{ $fee->notes ?? '—' }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @if($category->fees->isEmpty())
                        <div class="py-8 text-center text-gray-400 text-sm">No fees listed in this category.</div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @endif

        {{-- ── Payment Plans Banner ──────────────────────────────── --}}
        <div class="mt-14 grid md:grid-cols-3 gap-6 scroll-reveal">
            @foreach([
                ['icon' => 'fa-calendar-check', 'title' => 'Semester Payment', 'desc' => 'Pay your fees in full at the start of each semester and receive a 2% early-payment discount.', 'badge' => 'Most Popular'],
                ['icon' => 'fa-split',           'title' => 'Instalment Plan', 'desc' => 'Split your semester fees into three equal monthly instalments with no additional interest.', 'badge' => 'Flexible'],
                ['icon' => 'fa-award',           'title' => 'Scholarship Deduction', 'desc' => 'Scholarship and bursary holders have their awards automatically deducted from their fee balance.', 'badge' => 'Automatic'],
            ] as $plan)
            <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm hover:shadow-md hover:border-gold-500/30 transition-all">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-gold-500/10 flex items-center justify-center text-gold-600 shrink-0">
                        <i class="fas {{ $plan['icon'] }} text-xl"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <h4 class="font-serif font-bold text-navy-900">{{ $plan['title'] }}</h4>
                            <span class="text-xs bg-gold-500/10 text-gold-700 px-2 py-0.5 rounded-full font-medium border border-gold-500/20">{{ $plan['badge'] }}</span>
                        </div>
                        <p class="text-gray-500 text-sm leading-relaxed">{{ $plan['desc'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- ── Finance Contact ───────────────────────────────────── --}}
        <div class="mt-10 bg-navy-900 rounded-2xl p-8 flex flex-col md:flex-row items-center gap-6 scroll-reveal">
            <div class="w-16 h-16 rounded-full bg-gold-500/20 flex items-center justify-center text-gold-400 shrink-0">
                <i class="fas fa-phone-alt text-2xl"></i>
            </div>
            <div class="flex-1 text-center md:text-left">
                <h3 class="font-serif font-bold text-white text-xl mb-1">Need Help with Fees?</h3>
                <p class="text-gray-400 text-sm">Our Finance Office is available Sunday–Thursday, 8:00 AM – 5:00 PM to answer your questions about payment plans, receipts, and fee waivers.</p>
            </div>
            <div class="flex flex-wrap gap-3 shrink-0">
                <a href="tel:+256000000000" class="flex items-center gap-2 bg-white/10 border border-white/20 text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-white/20 transition-colors">
                    <i class="fas fa-phone"></i> Call Us
                </a>
                <a href="mailto:finance@inu.edu.sd" class="btn-primary flex items-center gap-2 px-5 py-2.5 rounded-lg text-white text-sm font-semibold">
                    <i class="fas fa-envelope"></i> Email Finance
                </a>
            </div>
        </div>

    </div>
</section>

@endsection

@section('cta-section')
    @include('components.cta-section', [
        'title'           => 'Invest in Your Future',
        'description'     => 'Explore our scholarships and bursaries to reduce the cost of your education at INSAN.',
        'primaryButton'   => ['text' => 'View Scholarships', 'icon' => 'fa-award',       'url' => route('admissions.scholarships')],
        'secondaryButton' => ['text' => 'Apply Now',        'icon' => 'fa-paper-plane', 'url' => route('apply')],
    ])
@endsection

@section('page-styles')
<style>
    .level-filter { cursor: pointer; }
    .active-level { background: #0a1628; color: #c9a96e; border-color: #0a1628; }
    .fee-row.hidden-row { display: none; }
</style>
@endsection

@section('page-scripts')
<script>
    document.querySelectorAll('.level-filter').forEach(btn => {
        btn.addEventListener('click', () => {
            const level = btn.dataset.level;

            document.querySelectorAll('.level-filter').forEach(b => b.classList.remove('active-level', 'bg-navy-900', 'text-gold-500', 'border-navy-900'));
            btn.classList.add('active-level', 'bg-navy-900', 'text-gold-500', 'border-navy-900');

            document.querySelectorAll('.fee-row').forEach(row => {
                if (level === 'all' || row.dataset.level === level.toLowerCase()) {
                    row.classList.remove('hidden-row');
                } else {
                    row.classList.add('hidden-row');
                }
            });
        });
    });
</script>
@endsection
