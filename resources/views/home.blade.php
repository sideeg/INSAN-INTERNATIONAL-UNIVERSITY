@extends('layouts.app')

@section('title', 'INSAN International University')

@section('content')

<!-- Hero Section -->
<section class="relative h-[600px] lg:h-[700px] overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1562774053-701939374585?w=1920&q=80" 
             alt="University Campus" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 hero-overlay"></div>
    <div class="absolute inset-0 islamic-pattern opacity-30"></div>
    <div class="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center">
        <div class="max-w-2xl scroll-reveal">
            <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl text-white font-bold leading-tight mb-6">
                <span class="text-gold-500">Rooted in</span><br>
                Islamic Values,<br>
                <span class="text-gold-500">Driven by</span><br>
                Academic Excellence
            </h1>
            <p class="text-gray-300 text-lg mb-8 leading-relaxed max-w-lg">
                INSAN International University equips students with knowledge, professional skills, and entrepreneurial capacity to serve society and lead with integrity.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('apply') }}" class="btn-primary px-8 py-3 rounded text-white font-semibold flex items-center gap-2">
                    Apply Now <i class="fas fa-arrow-right text-sm"></i>
                </a>
                <a href="{{ route('programmes') }}" class="btn-outline border-2 border-white text-white px-8 py-3 rounded font-semibold hover:bg-white hover:text-navy-900 transition-all">
                    Explore Programs
                </a>
            </div>
        </div>
    </div>
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
                    About INSAN International<br>University
                </h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    INSAN International University (formerly Islamic Call University) is a leading higher education institution committed to academic excellence, Islamic values, and societal development. We prepare ethical leaders, professionals, and innovators who will contribute positively to their communities and the world.
                </p>
                <a href="{{ route('about') }}" class="inline-flex items-center gap-2 border-2 border-navy-900 text-navy-900 px-6 py-3 rounded font-semibold hover:bg-navy-900 hover:text-white transition-all">
                    Learn More About Us
                </a>
            </div>
            <div class="scroll-reveal relative">
                <div class="relative">
                    <div class="absolute -inset-4 border-2 border-gold-500/30 rounded-3xl transform rotate-3"></div>
                    <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=800&q=80" 
                         alt="University Building" class="relative rounded-2xl shadow-2xl w-full h-[400px] object-cover arch-shape">
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 border-4 border-gold-500 rounded-full flex items-center justify-center bg-white shadow-lg">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-navy-900 font-serif">13+</div>
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
            <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold">Why Choose INSAN?</h2>
            <div class="w-24 h-1 bg-gold-500 mx-auto mt-4"></div>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([
                ['icon' => 'fa-mosque', 'title' => 'Islamic Values', 'desc' => 'Education rooted in Islamic principles and ethics'],
                ['icon' => 'fa-award', 'title' => 'Academic Excellence', 'desc' => 'International standards and quality teaching'],
                ['icon' => 'fa-laptop-code', 'title' => 'Practical Learning', 'desc' => 'Skills, research and entrepreneurial development'],
                ['icon' => 'fa-hands-helping', 'title' => 'Student Support', 'desc' => 'A supportive environment for personal and professional growth'],
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
            <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold">Our Strategic Objectives</h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['num' => '01', 'icon' => 'fa-graduation-cap', 'title' => 'Educational Excellence', 'desc' => 'Establish colleges that meet the highest international academic standards.'],
                ['num' => '02', 'icon' => 'fa-microscope', 'title' => 'Research Advancement', 'desc' => 'Promote high-quality research in humanities and applied sciences.'],
                ['num' => '03', 'icon' => 'fa-globe-americas', 'title' => 'Social Responsibility', 'desc' => 'Engage communities and promote culture and ethical values.'],
                ['num' => '04', 'icon' => 'fa-briefcase', 'title' => 'Workforce Development', 'desc' => 'Prepare highly qualified graduates to meet community needs.'],
                ['num' => '05', 'icon' => 'fa-network-wired', 'title' => 'Strategic Partnerships', 'desc' => 'Build local partnerships and expand global collaboration with reputable universities.'],
                ['num' => '06', 'icon' => 'fa-laptop', 'title' => 'E-Learning & Quality', 'desc' => 'Enhance digital education and ensure continuous quality improvement.'],
                ['num' => '07', 'icon' => 'fa-chart-line', 'title' => 'Financial Sustainability', 'desc' => 'Strengthen resources and invest in assets for long-term institutional sustainability.'],
                ['num' => '08', 'icon' => 'fa-users-cog', 'title' => 'Governance & HR', 'desc' => 'Build effective governance and develop competent, efficient human resources.'],
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
            <h2 class="font-serif text-3xl md:text-4xl text-white font-bold">Our Core Values</h2>
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
        'title' => 'Begin Your Journey at INSAN',
        'description' => 'Applications are now open for the 2026 academic year. Discover your potential and join a community of excellence.',
        'primaryButton' => ['text' => 'Apply Now', 'icon' => 'fa-arrow-right', 'url' => route('apply')],
        'secondaryButton' => ['text' => 'Request Info', 'icon' => 'fa-envelope', 'url' => route('contact')]
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