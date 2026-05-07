{{-- resources/views/admissions/scholarships.blade.php --}}
@extends('layouts.app')

@section('title', __('UMSC Mufti Scholarship | Admissions | INSAN International University'))

@section('content')

{{-- 1. Hero Section --}}
@include('components.hero-section', [
    'backgroundImage' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1920&q=80',
    'title' => __('UMSC Mufti'),
    'highlightedText' => __('Scholarship'),
    'description' => __('Established in collaboration with the Uganda Muslim Supreme Council (UMSC) to develop future leaders grounded in Islamic values and academic excellence.'),
    'breadcrumbs' => [
        ['label' => __('Home'), 'url' => route('home')],
        ['label' => __('Admissions'), 'url' => route('admissions')],
        ['label' => __('Scholarships')]
    ],
    'height' => '450px'
])

{{-- 2. Quick Facts Strip --}}
<div class="relative -mt-12 z-20 mb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 flex flex-wrap md:flex-nowrap justify-between gap-6 md:gap-4 divide-y md:divide-y-0 md:divide-x divide-gray-100">
            
            <div class="w-full md:w-1/4 pt-4 md:pt-0 md:px-4 text-center scroll-reveal" style="transition-delay: 0.1s">
                <i class="fas fa-hand-holding-usd text-2xl text-gold-500 mb-2"></i>
                <h4 class="font-bold text-navy-900 text-sm mb-1">{{ __('Coverage') }}</h4>
                <p class="text-xs text-gray-500">{{ __('Full or Partial Tuition') }}</p>
            </div>
            
            <div class="w-full md:w-1/4 pt-4 md:pt-0 md:px-4 text-center scroll-reveal" style="transition-delay: 0.2s">
                <i class="fas fa-user-graduate text-2xl text-gold-500 mb-2"></i>
                <h4 class="font-bold text-navy-900 text-sm mb-1">{{ __('Target Group') }}</h4>
                <p class="text-xs text-gray-500">{{ __('Ugandan Muslim Citizens') }}</p>
            </div>
            
            <div class="w-full md:w-1/4 pt-4 md:pt-0 md:px-4 text-center scroll-reveal" style="transition-delay: 0.3s">
                <i class="fas fa-book-open text-2xl text-gold-500 mb-2"></i>
                <h4 class="font-bold text-navy-900 text-sm mb-1">{{ __('Level') }}</h4>
                <p class="text-xs text-gray-500">{{ __('Full-time Undergraduate') }}</p>
            </div>
            
            <div class="w-full md:w-1/4 pt-4 md:pt-0 md:px-4 text-center scroll-reveal" style="transition-delay: 0.4s">
                <i class="fas fa-calendar-alt text-2xl text-gold-500 mb-2"></i>
                <h4 class="font-bold text-navy-900 text-sm mb-1">{{ __('Duration') }}</h4>
                <p class="text-xs text-gray-500">{{ __('3–4 Years (Renewable)') }}</p>
            </div>
            
        </div>
    </div>
</div>

{{-- 3. Main Content & Sidebar Layout --}}
<section class="py-12 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">
            
            {{-- Left Column: Overview, Purpose, Benefits, Impact --}}
            <div class="lg:col-span-2 space-y-12">
                
                {{-- Overview --}}
                <div class="scroll-reveal">
                    <h2 class="font-serif text-3xl text-navy-900 font-bold mb-4">{{ __('Programme Overview') }}</h2>
                    <div class="w-16 h-1 bg-gold-500 mb-6"></div>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        {{ __('The UMSC Mufti Scholarship at INSAN International University (formerly Islamic Call University College - ICUC) is a prestigious financial aid initiative established in direct collaboration with the Uganda Muslim Supreme Council (UMSC).') }}
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        {{ __('This scholarship specifically targets academically strong Muslim students who demonstrate significant financial need. Our ultimate goal is to develop future leaders and professionals who are deeply grounded in Islamic values and equipped with modern academic excellence.') }}
                    </p>
                </div>

                {{-- Purpose --}}
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gold-500/20 scroll-reveal">
                    <h3 class="font-serif text-2xl text-navy-900 font-bold mb-6 flex items-center gap-3">
                        <i class="fas fa-bullseye text-gold-500"></i> {{ __('Scholarship Purpose') }}
                    </h3>
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-check-circle text-gold-500 mt-1"></i>
                            <p class="text-sm text-gray-600">{{ __('Support financially disadvantaged but highly qualified students.') }}</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="fas fa-check-circle text-gold-500 mt-1"></i>
                            <p class="text-sm text-gray-600">{{ __('Promote unparalleled excellence in both Islamic and academic studies.') }}</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="fas fa-check-circle text-gold-500 mt-1"></i>
                            <p class="text-sm text-gray-600">{{ __('Develop ethical future Muslim leaders and skilled professionals.') }}</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <i class="fas fa-check-circle text-gold-500 mt-1"></i>
                            <p class="text-sm text-gray-600">{{ __('Ensure equitable access to higher education regardless of financial status.') }}</p>
                        </div>
                    </div>
                </div>

                {{-- Benefits & Impact --}}
                <div class="grid md:grid-cols-2 gap-8">
                    {{-- Benefits --}}
                    <div class="scroll-reveal">
                        <h3 class="font-serif text-2xl text-navy-900 font-bold mb-6">{{ __('Core Benefits') }}</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm">
                                <div class="w-10 h-10 rounded-full bg-gold-500/10 flex items-center justify-center text-gold-600 shrink-0">
                                    <i class="fas fa-coins text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-navy-900 text-sm">{{ __('Financial Relief') }}</h4>
                                    <p class="text-xs text-gray-500 mt-1">{{ __('Full or partial tuition coverage, specifically tailored based on assessed need.') }}</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm">
                                <div class="w-10 h-10 rounded-full bg-gold-500/10 flex items-center justify-center text-gold-600 shrink-0">
                                    <i class="fas fa-user-tie text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-navy-900 text-sm">{{ __('Expert Mentorship') }}</h4>
                                    <p class="text-xs text-gray-500 mt-1">{{ __('Direct mentorship from distinguished Islamic scholars and community leaders.') }}</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4 p-4 bg-white rounded-xl shadow-sm">
                                <div class="w-10 h-10 rounded-full bg-gold-500/10 flex items-center justify-center text-gold-600 shrink-0">
                                    <i class="fas fa-compass text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-navy-900 text-sm">{{ __('Holistic Guidance') }}</h4>
                                    <p class="text-xs text-gray-500 mt-1">{{ __('Continuous guidance aligning your academic trajectory with personal development.') }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- Impact --}}
                    <div class="scroll-reveal" style="transition-delay: 0.1s">
                        <h3 class="font-serif text-2xl text-navy-900 font-bold mb-6">{{ __('Long-Term Impact') }}</h3>
                        <div class="bg-navy-900 text-white rounded-xl p-6 relative overflow-hidden h-full">
                            <div class="absolute inset-0 islamic-pattern opacity-10"></div>
                            <div class="relative z-10 space-y-4">
                                <p class="text-sm text-gray-300 leading-relaxed">
                                    <strong class="text-gold-500">{{ __('Empowerment:') }}</strong> {{ __('Enables access to higher education for deserving students who might otherwise be left behind.') }}
                                </p>
                                <p class="text-sm text-gray-300 leading-relaxed">
                                    <strong class="text-gold-500">{{ __('Foundation:') }}</strong> {{ __('Produces graduates equipped with rock-solid academic knowledge paired with an unwavering Islamic foundation.') }}
                                </p>
                                <p class="text-sm text-gray-300 leading-relaxed">
                                    <strong class="text-gold-500">{{ __('Contribution:') }}</strong> {{ __('Graduates directly contribute to local community elevation, national progress, and global Islamic development.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Right Column: Sticky Sidebar for Eligibility & Docs --}}
            <div class="lg:col-span-1">
                <div class="sticky top-28 space-y-6">
                    
                    {{-- Eligibility Card --}}
                    <div class="bg-navy-900 text-white rounded-2xl p-6 shadow-xl scroll-reveal">
                        <div class="flex items-center gap-3 mb-6 border-b border-navy-700 pb-4">
                            <i class="fas fa-clipboard-list text-gold-500 text-xl"></i>
                            <h3 class="font-serif text-xl font-bold">{{ __('Eligibility Criteria') }}</h3>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <i class="fas fa-check text-gold-500 mt-1 text-sm"></i>
                                <span class="text-sm text-gray-300">{{ __('Must be Muslim and a Ugandan citizen') }}</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fas fa-check text-gold-500 mt-1 text-sm"></i>
                                <span class="text-sm text-gray-300">{{ __('Have a strong academic performance record') }}</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fas fa-check text-gold-500 mt-1 text-sm"></i>
                                <span class="text-sm text-gray-300">{{ __('Demonstrate verifiable financial need') }}</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fas fa-check text-gold-500 mt-1 text-sm"></i>
                                <span class="text-sm text-gray-300">{{ __('Show visible commitment to Islamic values') }}</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fas fa-check text-gold-500 mt-1 text-sm"></i>
                                <span class="text-sm text-gray-300">{{ __('Be enrolled in a full-time undergraduate program at INSAN') }}</span>
                            </li>
                        </ul>
                    </div>

                    {{-- Renewal Conditions Card --}}
                    <div class="bg-white border-2 border-gold-500/20 rounded-2xl p-6 shadow-sm scroll-reveal">
                        <div class="flex items-center gap-3 mb-4">
                            <i class="fas fa-sync-alt text-gold-600 text-xl"></i>
                            <h3 class="font-serif text-xl font-bold text-navy-900">{{ __('Renewal Policy') }}</h3>
                        </div>
                        <p class="text-sm text-gray-600 mb-3">
                            {{ __('The scholarship covers the full undergraduate program (3–4 years). However, annual renewal is strictly dependent on:') }}
                        </p>
                        <ul class="space-y-2">
                            <li class="flex items-center gap-2 text-sm text-navy-900 font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-gold-500"></span> {{ __('Maintaining Academic Performance') }}
                            </li>
                            <li class="flex items-center gap-2 text-sm text-navy-900 font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-gold-500"></span> {{ __('Continued Proof of Financial Need') }}
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

{{-- 4. Application Process Timeline --}}
<section class="py-20 bg-white border-t border-gray-100">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-reveal">
            <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold mb-4">{{ __('Application Process') }}</h2>
            <div class="w-24 h-1 bg-gold-500 mx-auto mb-6"></div>
            <p class="text-gray-600">{{ __('Selection is based heavily on a combination of merit, financial need, and value alignment. Follow these steps to apply.') }}</p>
        </div>

        <div class="space-y-8 relative before:absolute before:inset-0 before:ml-6 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-1 before:bg-gradient-to-b before:from-gold-500 before:to-gray-100">
            
            {{-- Step 1 --}}
            <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group scroll-reveal">
                <div class="flex items-center justify-center w-12 h-12 rounded-full border-4 border-white bg-gold-500 text-white font-bold shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 shadow-lg">1</div>
                <div class="w-[calc(100%-4rem)] md:w-[calc(50%-3rem)] p-6 rounded-2xl bg-cream shadow-sm border border-gold-500/20">
                    <h4 class="font-serif text-xl font-bold text-navy-900 mb-2">{{ __('Complete the Form') }}</h4>
                    <p class="text-sm text-gray-600">{{ __('Fill out the official scholarship application form. This can be done via our online admissions portal or by requesting a paper form from the Admissions Office.') }}</p>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group scroll-reveal" style="transition-delay: 0.1s">
                <div class="flex items-center justify-center w-12 h-12 rounded-full border-4 border-white bg-navy-900 text-white font-bold shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 shadow-lg">2</div>
                <div class="w-[calc(100%-4rem)] md:w-[calc(50%-3rem)] p-6 rounded-2xl bg-white shadow-sm border border-gray-100">
                    <h4 class="font-serif text-xl font-bold text-navy-900 mb-3">{{ __('Submit Required Documents') }}</h4>
                    <ul class="space-y-2">
                        <li class="flex items-center gap-2 text-sm text-gray-600"><i class="fas fa-file-alt text-gold-500 w-4"></i> {{ __('Academic transcripts') }}</li>
                        <li class="flex items-center gap-2 text-sm text-gray-600"><i class="fas fa-envelope-open-text text-gold-500 w-4"></i> {{ __('Letter of Recommendation') }}</li>
                        <li class="flex items-center gap-2 text-sm text-gray-600"><i class="fas fa-file-invoice text-gold-500 w-4"></i> {{ __('Proof of financial need') }}</li>
                        <li class="flex items-center gap-2 text-sm text-gray-600"><i class="fas fa-pen-nib text-gold-500 w-4"></i> {{ __('Personal statement') }}</li>
                    </ul>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group scroll-reveal" style="transition-delay: 0.2s">
                <div class="flex items-center justify-center w-12 h-12 rounded-full border-4 border-white bg-gold-500 text-white font-bold shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 shadow-lg">3</div>
                <div class="w-[calc(100%-4rem)] md:w-[calc(50%-3rem)] p-6 rounded-2xl bg-cream shadow-sm border border-gold-500/20">
                    <h4 class="font-serif text-xl font-bold text-navy-900 mb-2">{{ __('Shortlisting & Interview') }}</h4>
                    <p class="text-sm text-gray-600">{{ __('The committee will review all applications. If your profile matches our criteria, you will be invited to attend an in-person or virtual interview with the selection panel.') }}</p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@section('cta-section')
    @include('components.cta-section', [
        'title' => __('Ready to Apply for the Mufti Scholarship?'),
        'description' => __('Take the first step towards securing your future. Ensure you meet all eligibility criteria before initiating your application.'),
        'primaryButton' => ['text' => __('Start Application'), 'icon' => 'fa-arrow-right', 'url' => route('apply')],
        'secondaryButton' => ['text' => __('Download Scholarship Guide'), 'icon' => 'fa-download', 'url' => '#']
    ])
@endsection