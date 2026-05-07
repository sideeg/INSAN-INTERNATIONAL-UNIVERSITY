{{-- resources/views/campus-life.blade.php --}}
@extends('layouts.app')

@section('title', __('Campus Life') . ' | ' . __('INSAN International University'))

@php
    $getImage = fn($path) => $path ? (Str::startsWith($path, ['http://', 'https://']) ? $path : asset('storage/' . $path)) : asset('images/placeholder.jpg');
@endphp

@section('content')

@include('components.hero-section', [
    'backgroundImage' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1920&q=80',
    'title' => __('Life at'),
    'highlightedText' => __('INSAN'),
    'description' => __('A vibrant community where academic excellence meets personal growth, leadership development, and lifelong friendships'),
    'breadcrumbs' => [
        ['label' => __('Home'), 'url' => route('home')],
        ['label' => __('Campus Life')]
    ],
    'height' => '450px'
])

<!-- Quick Stats -->
<div class="bg-navy-800 py-8 relative -mt-2 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach([
                ['number' => $clubs->count() . '+', 'label' => __('Student Clubs')],
                ['number' => '1,200', 'label' => __('On-Campus Residents')],
                ['number' => $countries->count() . '+', 'label' => __('Nationalities')],
                ['number' => '150+', 'label' => __('Annual Events')],
            ] as $stat)
                <div class="stat-card text-center p-4 transition-transform duration-300 scroll-reveal" style="transition-delay: {{ $loop->index * 0.1 }}s">
                    <div class="text-3xl font-bold text-gold-500 font-serif mb-1">{{ $stat['number'] }}</div>
                    <div class="text-gray-400 text-sm">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Section Navigation -->
<section class="bg-white border-b border-gray-200 py-6 sticky top-20 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            <button class="tab-btn active px-6 py-3 rounded-xl font-serif font-bold text-base flex items-center gap-2" data-tab="leadership">
                <i class="fas fa-users"></i> {{ __('Student Leadership') }}
            </button>
            <button class="tab-btn px-6 py-3 rounded-xl font-serif font-bold text-base flex items-center gap-2 bg-white text-navy-900 border border-gray-200" data-tab="services">
                <i class="fas fa-hands-helping"></i> {{ __('Student Services') }}
            </button>
            <button class="tab-btn px-6 py-3 rounded-xl font-serif font-bold text-base flex items-center gap-2 bg-white text-navy-900 border border-gray-200" data-tab="international">
                <i class="fas fa-globe"></i> {{ __('International Students') }}
            </button>
        </div>
    </div>
</section>

<!-- Student Leadership Tab -->
<div class="tab-content active" id="leadership">
    <section class="py-16 bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 scroll-reveal">
                <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold mb-4">{{ __('Student Leadership') }}</h2>
                <div class="w-24 h-1 bg-gold-500 mx-auto mb-6"></div>
                <p class="text-gray-600 leading-relaxed">
                    {{ __('At INSAN, we believe leadership is cultivated through practice, mentorship, and service. Our student leadership ecosystem empowers individuals to develop governance skills, organize initiatives, and represent the student body with integrity and vision.') }}
                </p>
            </div>

            <!-- Student Council -->
            <div class="mb-20 scroll-reveal">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 rounded-xl bg-navy-900 flex items-center justify-center text-gold-500">
                        <i class="fas fa-landmark text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-serif text-2xl text-navy-900 font-bold">{{ __('Student Representative Council') }}</h3>
                        <p class="text-gray-500 text-sm">{{ __('The official voice of the student body') }}</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($councilMembers as $member)
                        <div class="leader-card bg-white rounded-2xl overflow-hidden shadow-sm scroll-reveal">
                            <div class="h-64 overflow-hidden">
                                <img src="{{ $getImage($member->photo) }}" alt="{{ $member->name }}" class="leader-img w-full h-full object-cover object-top">
                            </div>
                            <div class="p-5 text-center">
                                <h4 class="font-serif text-lg text-navy-900 font-bold">{{ $member->name }}</h4>
                                <p class="text-gold-600 text-sm font-semibold mb-2">{{ $member->role }}</p>
                                <p class="text-gray-500 text-xs">{{ $member->year }}</p>
                                <div class="flex justify-center gap-3 mt-3">
                                    @if($member->linkedin_url)
                                        <a href="{{ $member->linkedin_url }}" target="_blank" class="text-gray-400 hover:text-gold-500"><i class="fab fa-linkedin"></i></a>
                                    @endif
                                    @if($member->email)
                                        <a href="mailto:{{ $member->email }}" class="text-gray-400 hover:text-gold-500"><i class="fas fa-envelope"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-8 text-gray-500">{{ __('Council members are currently being updated.') }}</div>
                    @endforelse
                </div>
            </div>

            <!-- Clubs & Organizations -->
            <div class="scroll-reveal">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 rounded-xl bg-navy-900 flex items-center justify-center text-gold-500">
                        <i class="fas fa-users-cog text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-serif text-2xl text-navy-900 font-bold">{{ __('Clubs & Organizations') }}</h3>
                        <p class="text-gray-500 text-sm">{{ __('Find your community and pursue your passions') }}</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($clubs as $club)
                        <div class="service-card bg-white rounded-2xl p-6 scroll-reveal">
                            <div class="flex items-start gap-4">
                                <div class="card-icon w-14 h-14 rounded-xl bg-navy-900/5 flex items-center justify-center text-navy-900 flex-shrink-0">
                                    <i class="fas {{ $club->icon ?? 'fa-users' }} text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-serif text-lg text-navy-900 font-bold mb-1">{{ $club->name }}</h4>
                                    <p class="text-gray-500 text-sm mb-2 line-clamp-3">{{ $club->description }}</p>
                                    <span class="text-xs text-gold-600 font-semibold">{{ $club->member_count }} {{ __('Members') }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-8 text-gray-500">{{ __('Clubs and organizations are currently being updated.') }}</div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Student Services Tab -->
<div class="tab-content" id="services">
    <section class="py-16 bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 scroll-reveal">
                <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold mb-4">{{ __('Student Services') }}</h2>
                <div class="w-24 h-1 bg-gold-500 mx-auto mb-6"></div>
                <p class="text-gray-600 leading-relaxed">
                    {{ __('Comprehensive support services designed to help you thrive academically, personally, and professionally throughout your journey at INSAN.') }}
                </p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                @forelse($services as $service)
                    <div class="service-card bg-white rounded-2xl overflow-hidden scroll-reveal">
                        <div class="h-48 overflow-hidden">
                            <img src="{{ $getImage($service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <div class="card-icon w-14 h-14 rounded-xl bg-navy-900/5 flex items-center justify-center text-navy-900 mb-4">
                                <i class="fas {{ $service->icon ?? 'fa-info-circle' }} text-xl"></i>
                            </div>
                            <h3 class="font-serif text-xl text-navy-900 font-bold mb-3">{{ $service->title }}</h3>
                            <p class="text-gray-500 text-sm mb-4 leading-relaxed line-clamp-3">{{ $service->description }}</p>
                            <ul class="space-y-2 mb-4">
                                @if(is_array($service->features))
                                    @foreach(array_slice($service->features, 0, 3) as $feature)
                                        <li class="flex items-center gap-2 text-sm text-gray-600">
                                            <i class="fas fa-check text-gold-500 text-xs"></i> <span class="line-clamp-1">{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            <a href="#" class="text-gold-600 font-semibold text-sm hover:text-gold-700 flex items-center gap-1">
                                {{ __('Learn More') }} <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-500">{{ __('Student services are currently being updated.') }}</div>
                @endforelse
            </div>
        </div>
    </section>
</div>

<!-- International Students Tab -->
<div class="tab-content" id="international">
    <section class="py-16 bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 scroll-reveal">
                <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold mb-4">{{ __('International Students') }}</h2>
                <div class="w-24 h-1 bg-gold-500 mx-auto mb-6"></div>
                <p class="text-gray-600 leading-relaxed">
                    {{ __('Join a diverse community representing over') }} {{ $countries->count() > 0 ? $countries->count() : '30+' }} {{ __('countries. Our International Student Office provides comprehensive support from admission to graduation.') }}
                </p>
            </div>

            <!-- Welcome Banner -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm mb-16 scroll-reveal">
                <div class="grid lg:grid-cols-2">
                    <div class="p-8 lg:p-12 flex flex-col justify-center">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-full bg-gold-500/10 flex items-center justify-center">
                                <i class="fas fa-globe-africa text-gold-500"></i>
                            </div>
                            <span class="text-gold-600 font-semibold text-sm uppercase tracking-wider">{{ __('Your Home Away From Home') }}</span>
                        </div>
                        <h3 class="font-serif text-2xl text-navy-900 font-bold mb-4">{{ __('Dedicated Support for Our Global Community') }}</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            {{ __('Whether you are from neighboring African nations, the Middle East, Southeast Asia, or beyond, our team understands the unique challenges of studying abroad.') }}
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('admissions') }}" class="btn-primary px-6 py-3 rounded-lg text-white font-semibold text-sm">{{ __('International Admissions') }}</a>
                        </div>
                    </div>
                    <div class="h-64 lg:h-auto">
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800&q=80" alt="{{ __('International Students') }}" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Services Accordion -->
            <div class="grid lg:grid-cols-3 gap-8 mb-16">
                <div class="lg:col-span-2 space-y-4 scroll-reveal">
                    @forelse($intlServices as $index => $service)
                        <div class="accordion-item {{ $index === 0 ? 'active' : '' }} bg-white rounded-xl overflow-hidden shadow-sm">
                            <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleAccordion(this)">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-lg bg-navy-900 flex items-center justify-center text-gold-500">
                                        <i class="fas {{ $service->icon ?? 'fa-info' }}"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-serif text-lg text-navy-900 font-bold">{{ $service->title }}</h4>
                                        <p class="text-gray-500 text-sm">{{ $service->subtitle }}</p>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-down text-gold-500 accordion-icon"></i>
                            </button>
                            <div class="accordion-content">
                                <div class="px-6 pb-6 pl-20">
                                    <ul class="space-y-2">
                                        @if(is_array($service->features))
                                            @foreach($service->features as $feature)
                                                <li class="flex items-center gap-2 text-sm text-gray-600"><i class="fas fa-check text-gold-500 text-xs"></i> {{ $feature }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-8">{{ __('International support services are currently being updated.') }}</p>
                    @endforelse
                </div>

                <!-- Quick Info Card -->
                <div class="scroll-reveal" style="transition-delay: 0.2s">
                    <div class="bg-navy-900 rounded-2xl p-8 text-white sticky top-40">
                        <h4 class="font-serif text-xl font-bold mb-6 text-gold-500">{{ __('Quick Information') }}</h4>
                        <div class="space-y-6">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-envelope text-gold-500 mt-1"></i>
                                <div>
                                    <div class="text-xs text-gray-400 mb-1">{{ __('Email') }}</div>
                                    <div class="text-sm">international@inu.edu.sd</div>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fas fa-phone text-gold-500 mt-1"></i>
                                <div>
                                    <div class="text-xs text-gray-400 mb-1">{{ __('Phone') }}</div>
                                    <div class="text-sm">+249 123 456 790</div>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fas fa-clock text-gold-500 mt-1"></i>
                                <div>
                                    <div class="text-xs text-gray-400 mb-1">{{ __('Office Hours') }}</div>
                                    <div class="text-sm">{{ __('Sun - Thu: 8:00 AM - 4:00 PM') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Country Representatives -->
            <div class="scroll-reveal">
                <h3 class="font-serif text-2xl text-navy-900 font-bold mb-8 text-center">{{ __('Our International Community') }}</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    @forelse($countries as $country)
                        <div class="bg-white rounded-xl p-4 text-center shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                            <div class="text-3xl mb-2">{{ $country->flag_emoji }}</div>
                            <div class="text-sm font-semibold text-navy-900">{{ $country->name }}</div>
                            <div class="text-xs text-gray-500 mt-1">{{ $country->student_count }} {{ __('Students') }}</div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-8 text-gray-500">{{ __('Country representations are currently being updated.') }}</div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('cta-section')
    @include('components.cta-section', [
        'title' => __('Experience INSAN Firsthand'),
        'description' => __('Schedule a campus visit, attend an open day, or connect with a current student to learn more about life at INSAN.'),
        'primaryButton' => ['text' => __('Contact Admissions'), 'icon' => 'fa-envelope', 'url' => route('contact')],
        'secondaryButton' => null
    ])
@endsection

@section('page-styles')
<style>
    .service-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(201,169,110,0.15);
    }
    .service-card:hover {
        transform: translateY(-8px);
        border-color: rgba(201,169,110,0.4);
        box-shadow: 0 25px 50px -12px rgba(10,22,40,0.15);
    }
    .service-card .card-icon { transition: all 0.4s ease; }
    .service-card:hover .card-icon {
        background: linear-gradient(135deg, #c9a96e, #b8944f);
        color: white;
        transform: scale(1.1) rotate(-5deg);
    }
    .leader-card { transition: all 0.4s ease; }
    .leader-card:hover { transform: translateY(-5px); }
    .leader-card:hover .leader-img { transform: scale(1.05); }
    .leader-img { transition: transform 0.6s ease; }
    .stat-card:hover { transform: translateY(-5px); }
</style>
@endsection

@section('page-scripts')
<script>
    // Accordion functionality
    function toggleAccordion(button) {
        const item = button.parentElement;
        const wasActive = item.classList.contains('active');
        
        document.querySelectorAll('.accordion-item').forEach(acc => acc.classList.remove('active'));
        
        if (!wasActive) item.classList.add('active');
    }
</script>
@endsection