@extends('layouts.app')

@section('title', 'INSAN International University')

@section('content')
@php
    // Helper to format image paths
    $getImage = fn($path) => $path ? (Str::startsWith($path, ['http://', 'https://']) ? $path : asset('storage/' . $path)) : asset('images/placeholder.jpg');
@endphp
<!-- Dynamic Hero Slider -->
<section class="relative h-[600px] lg:h-[700px] overflow-hidden group bg-navy-900" id="hero-carousel">
    
    @if($slides->isEmpty())
        {{-- Fallback Slide --}}
        <div class="absolute inset-0 z-10 opacity-100">
            <img src="https://images.unsplash.com/photo-1562774053-701939374585?w=1920&q=80" alt="University Campus" class="w-full h-full object-cover">
            <div class="absolute inset-0 hero-overlay z-10"></div>
            <div class="relative z-20 h-full max-w-7xl mx-auto px-4 flex items-center">
                <div class="max-w-2xl">
                    <h1 class="font-serif text-4xl md:text-6xl text-white font-bold leading-tight mb-6">
                        Welcome to <span class="text-gold-500">INSAN</span>
                    </h1>
                    <p class="text-gray-300 text-lg mb-8">Rooted in values, driven by excellence.</p>
                    <a href="{{ route('apply') }}" class="btn-primary px-8 py-3 rounded text-white font-semibold inline-block">
                        Apply Now <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    @else
        {{-- Dynamic Slides --}}
        @foreach($slides as $index => $slide)
    <div class="carousel-slide absolute inset-0 transition-opacity duration-1000 ease-in-out {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}">
        
        {{-- 1. BACKGROUND IMAGE: Now explicitly absolute and z-0 --}}
        <img src="{{ $getImage($slide->thumbnail) }}" 
             alt="{{ $slide->title ?? 'News Image' }}" 
             class="slide-bg absolute inset-0 w-full h-full object-cover z-0 transition-transform duration-[8000ms] ease-out {{ $index === 0 ? 'scale-110' : 'scale-100' }}">
        
        {{-- 2. OVERLAYS: Explicitly z-10 to sit on top of the image --}}
        <div class="absolute inset-0 hero-overlay z-10"></div>
        <div class="absolute inset-0 islamic-pattern opacity-30 z-10"></div>
        
        {{-- 3. CONTENT: Explicitly z-20 to sit on top of everything --}}
        <div class="relative z-20 h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center">
            <div class="slide-content max-w-2xl transform transition-all duration-1000 delay-300 {{ $index === 0 ? 'translate-y-0 opacity-100' : 'translate-y-12 opacity-0' }}">
                
                {{-- Category Tag --}}
                <span class="inline-block px-4 py-1.5 rounded-full bg-gold-500/20 border border-gold-500/30 text-gold-400 text-xs font-bold tracking-widest uppercase mb-4 backdrop-blur-sm">
                    {{ $slide->is_featured ? __('Featured News') : __('Latest News') }}
                </span>
                
                {{-- The Title --}}
                <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl text-white font-bold leading-tight mb-6 line-clamp-3">
                    {{ $slide->title ?? 'Untitled Article' }}
                </h1>

                {{-- The Excerpt/Description --}}
                <p class="text-gray-300 text-lg mb-8 leading-relaxed max-w-lg drop-shadow-md line-clamp-2">
                    {{ Str::limit($slide->excerpt ?? strip_tags($slide->content), 150) }}
                </p>
                
                {{-- Action Buttons --}}
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('news.show', $slide->slug) }}" class="btn-primary px-8 py-3 rounded text-white font-semibold flex items-center gap-2 pointer-events-auto">
                        {{__('Read Full Story')}} <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                    <a href="{{ route('apply') }}" class="border-2 border-white/50 text-white px-8 py-3 rounded font-semibold hover:bg-white hover:text-navy-900 hover:border-white transition-all backdrop-blur-sm pointer-events-auto">
                        {{__('Apply Now')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach

        {{-- Navigation Controls (Kept inside the @else) --}}
        @if($slides->count() > 1)
            <button onclick="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 z-30 w-12 h-12 flex items-center justify-center rounded-full bg-navy-900/40 text-white hover:bg-gold-500 transition-all">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button onclick="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 z-30 w-12 h-12 flex items-center justify-center rounded-full bg-navy-900/40 text-white hover:bg-gold-500 transition-all">
                <i class="fas fa-chevron-right"></i>
            </button>
        @endif
    @endif
</section>

<!-- Stats Bar -->
<div class="bg-navy-800 py-8 relative -mt-2 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @foreach([
                ['icon' => 'fa-university', 'number' => '8', 'label' => 'Faculties'],
                ['icon' => 'fa-book-open', 'number' => '45+', 'label' => 'Programs'],
                ['icon' => 'fa-users', 'number' => '5,200+', 'label' => 'Students'],
                ['icon' => 'fa-handshake', 'number' => '50+', 'label' => 'Partner Universities'],
                ['icon' => 'fa-flask', 'number' => '120+', 'label' => 'Research Projects'],
                ['icon' => 'fa-globe', 'number' => '25+', 'label' => 'Countries'],
            ] as $stat)
                <div class="stat-card text-center p-4 transition-transform duration-300 scroll-reveal" style="transition-delay: {{ $loop->index * 0.1 }}s">
                    <div class="w-12 h-12 mx-auto mb-3 rounded-full border-2 border-gold-500 flex items-center justify-center">
                        <i class="fas {{ $stat['icon'] }} text-gold-500 text-lg"></i>
                    </div>
                    <div class="text-2xl font-bold text-white font-serif">{{ $stat['number'] }}</div>
                    <div class="text-gray-400 text-sm">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- About Section -->
<section id="about" class="py-20 bg-cream islamic-pattern">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="scroll-reveal">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-gold-500/10 flex items-center justify-center">
                        <i class="fas fa-shield-alt text-gold-500"></i>
                    </div>
                    <div class="h-px w-16 bg-gold-500"></div>
                </div>
                <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold mb-6">
                   {{ __('About INSAN International University') }} 
                </h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    {{__('INSAN International University (formerly Islamic Call University) is a leading higher education institution committed to academic excellence, Islamic values, and societal development. We prepare ethical leaders, professionals, and innovators who will contribute positively to their communities and the world.')}}
                </p>
                <a href="{{ route('about') }}" class="inline-flex items-center gap-2 border-2 border-navy-900 text-navy-900 px-6 py-3 rounded font-semibold hover:bg-navy-900 hover:text-white transition-all">
                    {{__('Learn More About Us')}}
                </a>
            </div>
            <div class="scroll-reveal relative">
                <div class="relative">
                    <div class="absolute -inset-4 border-2 border-gold-500/30 rounded-3xl transform rotate-3"></div>
                    <img src="https://visitkampala.kcca.go.ug/user_files/YPvNNqpIysTc.jpg" 
                         alt="University Building" class="relative rounded-2xl shadow-2xl w-full h-[400px] object-cover arch-shape">
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 border-4 border-gold-500 rounded-full flex items-center justify-center bg-white shadow-lg">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-navy-900 font-serif">6+</div>
                            <div class="text-xs text-gray-500">Years</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose INSAN -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-reveal">
            <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold">{{__('Why Choose INSAN?') }}?</h2>
            <div class="w-24 h-1 bg-gold-500 mx-auto mt-4"></div>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([
                ['icon' => 'fa-mosque', 'title' => __('Islamic Values'), 'desc' => __('Education rooted in Islamic principles and ethics')],
                ['icon' => 'fa-award', 'title' => __('Academic Excellence'), 'desc' => __('International standards and quality teaching')],
                ['icon' => 'fa-laptop-code', 'title' => __('Practical Learning'), 'desc' => __('Skills, research and entrepreneurial development')],
                ['icon' => 'fa-hands-helping', 'title' => __('Student Support'), 'desc' => __('A supportive environment for personal and professional growth')],
            ] as $feature)
                <div class="text-center p-8 rounded-2xl hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-gold-500/30 scroll-reveal" style="transition-delay: {{ $loop->index * 0.1 }}s">
                    <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-gold-500/10 flex items-center justify-center">
                        <i class="fas {{ $feature['icon'] }} text-3xl text-gold-500"></i>
                    </div>
                    <h3 class="font-serif text-xl text-navy-900 font-bold mb-3">{{ $feature['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $feature['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Strategic Objectives -->
<section class="py-20 bg-cream islamic-pattern">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-reveal">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="h-px w-12 bg-gold-500"></div>
                <i class="fas fa-crown text-gold-500"></i>
                <div class="h-px w-12 bg-gold-500"></div>
            </div>
            <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold">{{__('Our Strategic Objectives')}}</h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['num' => '01', 'icon' => 'fa-graduation-cap', 'title' => __('Educational Excellence'), 'desc' => __('Establish colleges that meet the highest international academic standards.')],
                ['num' => '02', 'icon' => 'fa-microscope', 'title' => __('Research Advancement'), 'desc' => __('Promote high-quality research in humanities and applied sciences.')],
                ['num' => '03', 'icon' => 'fa-globe-americas', 'title' => __('Social Responsibility'), 'desc' => __('Engage communities and promote culture and ethical values.')],
                ['num' => '04', 'icon' => 'fa-briefcase', 'title' => __('Workforce Development'), 'desc' => __('Prepare highly qualified graduates to meet community needs.')],
                ['num' => '05', 'icon' => 'fa-network-wired', 'title' => __('Strategic Partnerships'), 'desc' => __('Build local partnerships and expand global collaboration with reputable universities.')],
                ['num' => '06', 'icon' => 'fa-laptop', 'title' => __('E-Learning & Quality'), 'desc' => __('Enhance digital education and ensure continuous quality improvement.')],
                ['num' => '07', 'icon' => 'fa-chart-line', 'title' => __('Financial Sustainability'), 'desc' => __('Strengthen resources and invest in assets for long-term institutional sustainability.')],
                ['num' => '08', 'icon' => 'fa-users-cog', 'title' => __('Governance & HR'), 'desc' => __('Build effective governance and develop competent, efficient human resources.')],
            ] as $objective)
                <div class="objective-card bg-white p-6 rounded-xl scroll-reveal" style="transition-delay: {{ $loop->index * 0.05 }}s">
                    <div class="flex items-start gap-4">
                        <span class="text-3xl font-serif font-bold text-gold-500">{{ $objective['num'] }}</span>
                        <div>
                            <div class="w-10 h-10 mb-3 rounded-lg bg-navy-900 flex items-center justify-center">
                                <i class="fas {{ $objective['icon'] }} text-gold-500 text-sm"></i>
                            </div>
                            <h3 class="font-serif text-navy-900 font-bold mb-2">{{ $objective['title'] }}</h3>
                            <p class="text-gray-500 text-sm">{{ $objective['desc'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="py-20 bg-navy-900 relative overflow-hidden">
    <div class="absolute inset-0 islamic-pattern opacity-20"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center mb-16 scroll-reveal">
            <h2 class="font-serif text-3xl md:text-4xl text-white font-bold">{{__('Our Core Values')}}</h2>
            <div class="w-24 h-1 bg-gold-500 mx-auto mt-4"></div>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            @foreach([
                ['icon' => 'fa-gem', 'title' => 'Quality'],
                ['icon' => 'fa-lightbulb', 'title' => 'Creativity &<br>Innovation'],
                ['icon' => 'fa-hand-holding-heart', 'title' => 'Responsibility'],
                ['icon' => 'fa-certificate', 'title' => 'Credibility'],
            ] as $value)
                <div class="value-item text-center scroll-reveal" style="transition-delay: {{ $loop->index * 0.1 }}s">
                    <div class="value-icon w-16 h-16 mx-auto mb-4 rounded-full border-2 border-gold-500 flex items-center justify-center text-gold-500">
                        <i class="fas {{ $value['icon'] }} text-2xl"></i>
                    </div>
                    <h3 class="text-white font-serif font-bold">{!! $value['title'] !!}</h3>
                </div>
            @endforeach
        </div>
        
        <!-- Arabic Values -->
        <div class="border-t border-gold-500/30 pt-12">
            <div class="text-center mb-8">
                <h3 class="font-serif text-2xl text-gold-500 font-bold">القيم</h3>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                @foreach([
                    ['icon' => 'fa-star', 'title' => 'الجودة'],
                    ['icon' => 'fa-lightbulb', 'title' => 'الإبداع'],
                    ['icon' => 'fa-chart-bar', 'title' => 'المسؤولية'],
                    ['icon' => 'fa-handshake', 'title' => 'الابتكار المعرفي'],
                    ['icon' => 'fa-medal', 'title' => 'المصداقية'],
                ] as $arValue)
                    <div class="value-item text-center scroll-reveal" style="transition-delay: {{ $loop->index * 0.1 }}s">
                        <div class="value-icon w-14 h-14 mx-auto mb-3 rounded-full border border-gold-500/50 flex items-center justify-center text-gold-500">
                            <i class="fas {{ $arValue['icon'] }} text-xl"></i>
                        </div>
                        <h4 class="text-white font-bold text-sm">{{ $arValue['title'] }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection

@section('cta-section')
    @include('components.cta-section', [
        'title' => __('Begin Your Journey at INSAN'),
        'description' => __('Applications are now open for the current academic year. Discover your potential and join a community of excellence.'),
        'primaryButton' => ['text' => __('Apply Now'), 'icon' => 'fa-arrow-right', 'url' => route('apply')],
        'secondaryButton' => ['text' => __('Request Info'), 'icon' => 'fa-envelope', 'url' => route('contact')]
    ])
@endsection

@section('page-styles')
<style>
    .stat-card:hover { transform: translateY(-5px); }
    .objective-card {
        transition: all 0.4s ease;
        border: 1px solid transparent;
    }
    .objective-card:hover {
        border-color: #c9a96e;
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(10,22,40,0.1);
    }
    .value-icon { transition: all 0.3s ease; }
    .value-item:hover .value-icon {
        transform: scale(1.1);
        color: #c9a96e;
    }
    .btn-outline { transition: all 0.3s ease; }
    .btn-outline:hover {
        background: rgba(201,169,110,0.1);
        border-color: #c9a96e;
    }
</style>
@endsection

@section('page-scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.carousel-slide');
        if(slides.length <= 1) return; // Don't run script if 1 or 0 slides

        const contents = document.querySelectorAll('.slide-content');
        const backgrounds = document.querySelectorAll('.slide-bg');
        const dots = document.querySelectorAll('.carousel-dot');
        let currentIndex = 0;
        let interval;

        function showSlide(index) {
            // Hide current slide
            slides[currentIndex].classList.replace('opacity-100', 'opacity-0');
            slides[currentIndex].classList.replace('z-10', 'z-0');
            contents[currentIndex].classList.replace('translate-y-0', 'translate-y-12');
            contents[currentIndex].classList.replace('opacity-100', 'opacity-0');
            backgrounds[currentIndex].classList.replace('scale-110', 'scale-100');
            
            if(dots.length) {
                dots[currentIndex].classList.replace('w-8', 'w-2.5');
                dots[currentIndex].classList.replace('bg-gold-500', 'bg-white/50');
            }

            // Update index
            currentIndex = index;

            // Show new slide
            slides[currentIndex].classList.replace('opacity-0', 'opacity-100');
            slides[currentIndex].classList.replace('z-0', 'z-10');
            
            // Delay text animation slightly for smooth effect
            setTimeout(() => {
                contents[currentIndex].classList.replace('translate-y-12', 'translate-y-0');
                contents[currentIndex].classList.replace('opacity-0', 'opacity-100');
            }, 100);

            // Trigger background zoom
            backgrounds[currentIndex].classList.replace('scale-100', 'scale-110');
            
            if(dots.length) {
                dots[currentIndex].classList.replace('w-2.5', 'w-8');
                dots[currentIndex].classList.replace('bg-white/50', 'bg-gold-500');
            }
        }

        window.nextSlide = function() {
            showSlide((currentIndex + 1) % slides.length);
            resetInterval();
        };

        window.prevSlide = function() {
            showSlide((currentIndex - 1 + slides.length) % slides.length);
            resetInterval();
        };

        window.goToSlide = function(index) {
            showSlide(index);
            resetInterval();
        };

        function resetInterval() {
            clearInterval(interval);
            interval = setInterval(window.nextSlide, 6000); // 6 seconds per slide
        }

        // Start auto-play
        interval = setInterval(window.nextSlide, 6000);
    });
</script>
@endsection