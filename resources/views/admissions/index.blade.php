@extends('layouts.app')

@section('title', __('Admissions — INSAN International University'))

@section('content')

@include('components.hero-section', [
    'backgroundImage' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1920&q=80',
    'title' => __('Begin Your Journey'),
    'highlightedText' => __('at INSAN'),
    'description' => __('Join a community of learners, thinkers, and leaders. Discover everything you need to apply, enrol, and thrive at INSAN International University.'),
    'breadcrumbs' => [
        ['label' => __('Home'), 'url' => route('home')],
        ['label' => __('Admissions')]
    ],
    'height' => '500px'
])

{{-- ── Quick Nav Cards ──────────────────────────────────────────── --}}
<section class="bg-cream py-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-12 scroll-reveal">
            <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold mb-3">{{__('Your Admissions Journey')}}</h2>
            <div class="w-24 h-1 bg-gold-500 mx-auto mt-4"></div>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">{{__("Everything you need — from browsing programmes to securing your scholarship — in one place.")}}</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                [
                    'icon'    => 'fa-calendar-alt',
                    'title'   => __('Academic Calendar'),
                    'desc'    => __('Key dates, examination schedules, semester timelines, and important deadlines.'),
                    'route'   => 'admissions.calendar',
                    'color'   => 'bg-navy-900',
                    'badge'   => '2024/2025',
                ],
                [
                    'icon'    => 'fa-money-bill-wave',
                    'title'   => __('Fees & Funding'),
                    'desc'    => __('Transparent tuition fees, accommodation costs, and payment plan options.'),
                    'route'   => 'admissions.fees',
                    'color'   => 'bg-gold-600',
                    'badge'   => 'Updated',
                ],
                [
                    'icon'    => 'fa-award',
                    'title'   => __('Scholarships'),
                    'desc'    => __('Merit-based, need-based, and partner scholarships available for new students.'),
                    'route'   => 'admissions.scholarships',
                    'color'   => 'bg-emerald-700',
                    'badge'   => 'Open',
                ],
                [
                    'icon'    => 'fa-paper-plane',
                    'title'   => __('Apply Now'),
                    'desc'    => __('Start your application for the upcoming intake. Online form available.'),
                    'route'   => 'apply',
                    'color'   => 'bg-red-700',
                    'badge'   => 'Accepting',
                ],
            ] as $card)
            <a href="{{ route($card['route']) }}"
               class="group relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100 hover:border-gold-500/30 hover:-translate-y-2 scroll-reveal flex flex-col">

                {{-- Coloured top bar --}}
                <div class="h-2 {{ $card['color'] }}"></div>

                <div class="p-6 flex flex-col flex-1">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-14 h-14 rounded-xl {{ $card['color'] }}/10 flex items-center justify-center">
                            <i class="fas {{ $card['icon'] }} text-xl {{ $card['color'] === 'bg-navy-900' ? 'text-navy-900' : ($card['color'] === 'bg-gold-600' ? 'text-gold-600' : ($card['color'] === 'bg-emerald-700' ? 'text-emerald-700' : 'text-red-700')) }}"></i>
                        </div>
                        <span class="text-xs font-bold px-2.5 py-1 rounded-full bg-gold-500/10 text-gold-700 border border-gold-500/20">
                            {{ $card['badge'] }}
                        </span>
                    </div>
                    <h3 class="font-serif text-lg text-navy-900 font-bold mb-2 group-hover:text-gold-600 transition-colors">{{ $card['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed flex-1">{{ $card['desc'] }}</p>
                    <div class="mt-4 flex items-center gap-1 text-sm font-semibold text-gold-600 group-hover:gap-2 transition-all">
                        {{__('Explore')}} <i class="fas fa-arrow-right text-xs"></i>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ── How to Apply ─────────────────────────────────────────────── --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <div class="scroll-reveal">
                <div class="flex items-center gap-3 mb-4">
                    <div class="h-px w-12 bg-gold-500"></div>
                    <span class="text-gold-600 text-sm font-semibold uppercase tracking-widest">{{__("Application Process")}}</span>
                </div>
                <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold mb-6">{{__("How to Apply in")}}<br>{{__("4 Simple Steps")}}</h2>
                <p class="text-gray-500 leading-relaxed mb-8">
                    {{__("Our streamlined admissions process is designed to be straightforward and transparent. From choosing your programme to receiving your offer letter, we guide you every step of the way.")}}
                </p>
                <a href="{{ route('apply') }}" class="btn-primary inline-flex items-center gap-2 px-8 py-3 rounded text-white font-semibold">
                    {{__("Start Application")}} <i class="fas fa-arrow-right text-sm"></i>
                </a>
            </div>

            <div class="space-y-5 scroll-reveal">
                @foreach([
                    ['num' => '01', 'title' => __('Choose Your Programme'), 'desc' => __('Browse our undergraduate, graduate, and continuing education programmes. Use the search and filter tools to find the best match.'), 'icon' => 'fa-search'],
                    ['num' => '02', 'title' => __('Check Requirements'), 'desc' => __('Review the admission requirements, academic prerequisites, and English language requirements for your chosen programme.'), 'icon' => 'fa-clipboard-check'],
                    ['num' => '03', 'title' => __('Submit Application'), 'desc' => __('Complete the online application form and upload all required documents including transcripts and recommendation letters.'), 'icon' => 'fa-paper-plane'],
                    ['num' => '04', 'title' => __('Receive Your Offer'), 'desc' => __('Once reviewed, you will receive your conditional or unconditional offer letter within 10 working days.'), 'icon' => 'fa-envelope-open-text'],
                ] as $step)
                <div class="flex items-start gap-5 p-5 rounded-2xl border border-gray-100 hover:border-gold-500/30 hover:shadow-md transition-all duration-300 bg-white group">
                    <div class="shrink-0 w-12 h-12 rounded-xl bg-navy-900 flex items-center justify-center text-gold-500 group-hover:scale-110 transition-transform">
                        <i class="fas {{ $step['icon'] }}"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-xs font-bold text-gold-500 font-mono">{{ $step['num'] }}</span>
                            <h4 class="font-serif font-bold text-navy-900">{{ $step['title'] }}</h4>
                        </div>
                        <p class="text-gray-500 text-sm leading-relaxed">{{ $step['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ── Entry Requirements ───────────────────────────────────────── --}}
<section class="py-20 bg-cream islamic-pattern">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-14 scroll-reveal">
            <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold">{{__('Entry Requirements')}}</h2>
            <div class="w-24 h-1 bg-gold-500 mx-auto mt-4"></div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach([
                [
                    'level'   => __('Undergraduate'),
                    'badge'   => __('Bachelor\'s'),
                    'icon'    => 'fa-graduation-cap',
                    'color'   => 'text-navy-900',
                    'bg'      => 'bg-navy-900',
                    'items'   => [
                        __('Uganda Certificate of Education (UCE) — minimum 5 passes at O-Level'),
                        __('Uganda Advanced Certificate of Education (UACE) — minimum 2 principal passes'),
                        __('English Language proficiency — minimum Credit at O-Level'),
                        __('Specific subject requirements per faculty'),
                        __('Pass INSAN Entrance Examination'),
                    ],
                ],
                [
                    'level'   => __('Postgraduate'),
                    'badge'   => __('Master\'s / PhD'),
                    'icon'    => 'fa-user-graduate',
                    'color'   => 'text-gold-600',
                    'bg'      => 'bg-gold-600',
                    'items'   => [
                        __('Recognised Bachelor\'s degree (minimum 2nd Class, Upper Division)'),
                        __('Relevant undergraduate subject background'),
                        __('Research proposal (for PhD applicants)'),
                        __('Two academic references'),
                        __('English Language proficiency certificate (where applicable)'),
                    ],
                ],
                [
                    'level'   => __('International'),
                    'badge'   => __('All Levels'),
                    'icon'    => 'fa-globe',
                    'color'   => 'text-emerald-700',
                    'bg'      => 'bg-emerald-700',
                    'items'   => [
                        __('Equivalent qualifications from recognised institutions abroad'),
                        __('Official transcripts with certified English translation'),
                        __('Valid passport and student visa documentation'),
                        __('Health insurance certificate'),
                        __('IELTS 6.0 or TOEFL 80+ (if English is not your first language)'),
                    ],
                ],
            ] as $req)
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 scroll-reveal">
                <div class="h-2 {{ $req['bg'] }}"></div>
                <div class="p-7">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 rounded-xl {{ $req['bg'] }}/10 flex items-center justify-center">
                            <i class="fas {{ $req['icon'] }} text-xl {{ $req['color'] }}"></i>
                        </div>
                        <div>
                            <h3 class="font-serif font-bold text-navy-900 text-lg">{{ $req['level'] }}</h3>
                            <span class="text-xs text-gray-400">{{ $req['badge'] }}</span>
                        </div>
                    </div>
                    <ul class="space-y-3">
                        @foreach($req['items'] as $item)
                        <li class="flex items-start gap-3 text-sm text-gray-600">
                            <i class="fas fa-check-circle text-gold-500 mt-0.5 shrink-0 text-xs"></i>
                            <span>{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── Key Dates Strip ──────────────────────────────────────────── --}}
<section class="py-16 bg-navy-900 relative overflow-hidden">
    <div class="absolute inset-0 islamic-pattern opacity-20"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="flex flex-col md:flex-row items-center justify-between gap-8 mb-10">
            <div class="scroll-reveal text-center md:text-left">
                <h2 class="font-serif text-2xl md:text-3xl text-white font-bold">{{__('Key Admission Dates')}}</h2>
                <p class="text-gray-400 mt-1 text-sm">{{__("For the 2024/2025 Academic Year")}}</p>
            </div>
            <a href="{{ route('admissions.calendar') }}" class="shrink-0 btn-primary px-6 py-2.5 rounded text-white text-sm font-semibold flex items-center gap-2 scroll-reveal">
                <i class="fas fa-calendar-alt"></i> {{__('Full Academic Calendar')}}
            </a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach([
                ['icon' => 'fa-door-open',      'date' => 'January 6, 2025',   'label' => __('Applications Open'),     'sub' => __('Semester II')],
                ['icon' => 'fa-hourglass-end',  'date' => 'February 28, 2025', 'label' => __('Application Deadline'),  'sub' => 'Semester II'],
                ['icon' => 'fa-user-check',     'date' => 'March 10, 2025',    'label' => __('Offer Letters Issued'),  'sub' => 'Semester II'],
                ['icon' => 'fa-flag-checkered', 'date' => 'March 31, 2025',    'label' => __('Semester II Begins'),    'sub' => __('Orientation Week')],
            ] as $date)
            <div class="bg-white/5 border border-white/10 rounded-xl p-5 text-center hover:bg-white/10 transition-colors scroll-reveal">
                <div class="w-12 h-12 rounded-full border-2 border-gold-500 flex items-center justify-center text-gold-500 mx-auto mb-3">
                    <i class="fas {{ $date['icon'] }} text-lg"></i>
                </div>
                <p class="text-gold-400 text-xs font-semibold uppercase tracking-wider mb-1">{{ $date['sub'] }}</p>
                <p class="text-white font-bold font-serif">{{ $date['date'] }}</p>
                <p class="text-gray-400 text-xs mt-1">{{ $date['label'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ── Scholarship Highlight ────────────────────────────────────── --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-emerald-800 to-emerald-900 rounded-3xl overflow-hidden relative shadow-2xl scroll-reveal">
            <div class="absolute inset-0 islamic-pattern opacity-20"></div>
            <div class="absolute top-0 right-0 w-80 h-80 bg-gold-500/10 rounded-full -translate-y-1/4 translate-x-1/4"></div>
            <div class="relative p-8 md:p-12 grid lg:grid-cols-2 gap-10 items-center">
                <div class="text-white">
                    <div class="inline-flex items-center gap-2 bg-gold-500/20 border border-gold-500/30 rounded-full px-4 py-1.5 mb-6">
                        <i class="fas fa-star text-gold-400 text-xs"></i>
                        <span class="text-gold-400 text-xs font-semibold uppercase tracking-widest">{{__("Featured Scholarship")}}</span>
                    </div>
                    <h2 class="font-serif text-3xl md:text-4xl font-bold mb-4 leading-tight">{{__("The UMSC Mufti Scholarship")}}</h2>
                    <p class="text-emerald-100 leading-relaxed mb-6">
                        {{__("In collaboration with the Uganda Muslim Supreme Council (UMSC), this scholarship supports talented Muslim students with strong academic potential and financial need — developing future leaders grounded in Islamic values.")}}
                    </p>
                    <div class="flex flex-wrap gap-3 mb-8">
                        @foreach([__('Full Tuition Coverage'), __('Mentorship Programme'), __('Muslim Ugandan Citizens'), __('Undergraduate Only')] as $tag)
                        <span class="bg-white/10 border border-white/20 text-white text-xs px-3 py-1.5 rounded-full font-medium">{{ $tag }}</span>
                        @endforeach
                    </div>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('admissions.scholarships.show', 'umsc-mufti-scholarship') }}"
                           class="btn-primary px-7 py-3 rounded-lg text-white font-semibold flex items-center gap-2">
                            {{__("Learn More")}} <i class="fas fa-arrow-right text-sm"></i>
                        </a>
                        <a href="{{ route('admissions.scholarships') }}"
                           class="border-2 border-white/40 text-white px-7 py-3 rounded-lg font-semibold hover:bg-white/10 transition-colors flex items-center gap-2">
                            {{__("All Scholarships")}} <i class="fas fa-external-link-alt text-sm"></i>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    @foreach([
                        ['num' => '100%', 'label' => __('Tuition Coverage'), 'icon' => 'fa-graduation-cap'],
                        ['num' => '3–4',  'label' => __('Years Duration'),   'icon' => 'fa-clock'],
                        ['num' => 'UMSC', 'label' => __('Partner Organisation'), 'icon' => 'fa-handshake'],
                        ['num' => 'Open', 'label' => __('Applications'),     'icon' => 'fa-door-open'],
                    ] as $stat)
                    <div class="bg-white/10 backdrop-blur rounded-xl p-5 text-center border border-white/10">
                        <i class="fas {{ $stat['icon'] }} text-gold-400 text-2xl mb-2"></i>
                        <div class="text-2xl font-bold text-white font-serif">{{ $stat['num'] }}</div>
                        <div class="text-emerald-200 text-xs mt-1">{{ $stat['label'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── FAQ ──────────────────────────────────────────────────────── --}}
<section class="py-20 bg-cream">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 scroll-reveal">
            <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold">{{__("Frequently Asked Questions")}}</h2>
            <div class="w-24 h-1 bg-gold-500 mx-auto mt-4"></div>
        </div>

        <div class="space-y-3 scroll-reveal">
            @foreach([
                ['q' => __('When does the next intake begin?'), 'a' => __('INSAN International University has two main intakes per year: Semester I begins in August/September and Semester II begins in January/February. Some programmes may offer additional intakes — please check the Academic Calendar for specific dates.')],
                ['q' => __('Can I apply as an international student?'), 'a' => __('Yes, INSAN warmly welcomes international students from across Africa, the Arab world, and beyond. Our International Admissions team can guide you through the visa process, document requirements, and orientation support.')],
                ['q' => __('How long does the admissions process take?'), 'a' => __('Once your complete application has been received, you can expect to receive an offer letter within 10 working days. Incomplete applications may take longer. We recommend applying at least 6 weeks before your intended start date.')],
                ['q' => __('What documents do I need to apply?'), 'a' => __('Required documents include: certified academic transcripts and certificates, a national ID or passport, two passport-sized photographs, and any programme-specific requirements. International students must also provide proof of English language proficiency.')],
                ['q' => __('Are there scholarships available for new students?'), 'a' => __('Yes. INSAN offers merit-based and need-based scholarships, including the prestigious UMSC Mufti Scholarship for qualifying Muslim Ugandan students. Visit our Scholarships page for full details and eligibility criteria.')],
                ['q' => __('Is there an entrance examination?'), 'a' => __('Some undergraduate programmes require applicants to sit the INSAN Entrance Examination. Details are provided during the application process. Postgraduate applicants do not typically sit an entrance exam but may be required to attend an interview.')],
            ] as $i => $faq)
            <div class="accordion-item {{ $i === 0 ? 'active' : '' }} bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100">
                <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleAccordion(this)">
                    <span class="font-serif font-bold text-navy-900 text-base">{{ $faq['q'] }}</span>
                    <i class="fas fa-chevron-down text-gold-500 accordion-icon shrink-0 ml-4"></i>
                </button>
                <div class="accordion-content">
                    <div class="px-6 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                        {{ $faq['a'] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-10 scroll-reveal">
            <p class="text-gray-500 text-sm mb-4">{{__("Still have questions? We're here to help.")}}.</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 border-2 border-navy-900 text-navy-900 px-6 py-3 rounded font-semibold hover:bg-navy-900 hover:text-white transition-all">
                <i class="fas fa-envelope"></i> {{__("Contact Admissions Office")}}
            </a>
        </div>
    </div>
</section>

@endsection

@section('cta-section')
    @include('components.cta-section', [
        'title'           => 'Ready to Apply?',
        'description'     => 'Join thousands of graduates who began their journey here. Applications for the next intake are now open.',
        'primaryButton'   => ['text' => 'Apply Now', 'icon' => 'fa-paper-plane', 'url' => route('apply')],
        'secondaryButton' => ['text' => 'Download Prospectus', 'icon' => 'fa-download', 'url' => '#'],
    ])
@endsection

@section('page-scripts')
<script>
    function toggleAccordion(button) {
        const item = button.parentElement;
        const wasActive = item.classList.contains('active');
        document.querySelectorAll('.accordion-item').forEach(acc => acc.classList.remove('active'));
        if (!wasActive) item.classList.add('active');
    }
</script>
@endsection
