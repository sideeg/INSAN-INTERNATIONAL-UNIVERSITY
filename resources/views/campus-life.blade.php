@extends('layouts.app')

@section('title', 'Campus Life | INSAN International University')

@section('content')

@include('components.hero-section', [
    'backgroundImage' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1920&q=80',
    'title' => 'Life at',
    'highlightedText' => 'INSAN',
    'description' => 'A vibrant community where academic excellence meets personal growth, leadership development, and lifelong friendships.',
    'breadcrumbs' => [
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Campus Life']
    ],
    'height' => '450px'
])

<!-- Quick Stats -->
<div class="bg-navy-800 py-8 relative -mt-2 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach([
                ['number' => '40+', 'label' => 'Student Clubs'],
                ['number' => '1,200', 'label' => 'On-Campus Residents'],
                ['number' => '32', 'label' => 'Nationalities'],
                ['number' => '150+', 'label' => 'Annual Events'],
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
                <i class="fas fa-users"></i> Student Leadership
            </button>
            <button class="tab-btn px-6 py-3 rounded-xl font-serif font-bold text-base flex items-center gap-2 bg-white text-navy-900 border border-gray-200" data-tab="services">
                <i class="fas fa-hands-helping"></i> Student Services
            </button>
            <button class="tab-btn px-6 py-3 rounded-xl font-serif font-bold text-base flex items-center gap-2 bg-white text-navy-900 border border-gray-200" data-tab="international">
                <i class="fas fa-globe"></i> International Students
            </button>
        </div>
    </div>
</section>

<!-- Student Leadership Tab -->
<div class="tab-content active" id="leadership">
    <section class="py-16 bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 scroll-reveal">
                <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold mb-4">Student Leadership</h2>
                <div class="w-24 h-1 bg-gold-500 mx-auto mb-6"></div>
                <p class="text-gray-600 leading-relaxed">
                    At INSAN, we believe leadership is cultivated through practice, mentorship, and service. Our student leadership ecosystem empowers individuals to develop governance skills, organize initiatives, and represent the student body with integrity and vision.
                </p>
            </div>

            <!-- Student Council -->
            <div class="mb-20 scroll-reveal">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 rounded-xl bg-navy-900 flex items-center justify-center text-gold-500">
                        <i class="fas fa-landmark text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-serif text-2xl text-navy-900 font-bold">Student Representative Council</h3>
                        <p class="text-gray-500 text-sm">The official voice of the student body</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($councilMembers ?? [
                        ['image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&q=80', 'name' => 'Ahmad Khalid', 'role' => 'President', 'year' => 'Final Year, Business Administration'],
                        ['image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&q=80', 'name' => 'Fatima Al-Rashid', 'role' => 'Vice President', 'year' => 'Third Year, Law & Legal Studies'],
                        ['image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&q=80', 'name' => 'Omar Hassan', 'role' => 'General Secretary', 'year' => 'Third Year, Computer Science'],
                        ['image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&q=80', 'name' => 'Aisha Mahmoud', 'role' => 'Treasurer', 'year' => 'Second Year, Accounting & Finance'],
                    ] as $member)
                        <div class="leader-card bg-white rounded-2xl overflow-hidden shadow-sm scroll-reveal" style="transition-delay: {{ $loop->index * 0.1 }}s">
                            <div class="h-64 overflow-hidden">
                                <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="leader-img w-full h-full object-cover">
                            </div>
                            <div class="p-5 text-center">
                                <h4 class="font-serif text-lg text-navy-900 font-bold">{{ $member['name'] }}</h4>
                                <p class="text-gold-600 text-sm font-semibold mb-2">{{ $member['role'] }}</p>
                                <p class="text-gray-500 text-xs">{{ $member['year'] }}</p>
                                <div class="flex justify-center gap-3 mt-3">
                                    <a href="#" class="text-gray-400 hover:text-gold-500"><i class="fab fa-linkedin"></i></a>
                                    <a href="#" class="text-gray-400 hover:text-gold-500"><i class="fas fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Clubs & Organizations -->
            <div class="scroll-reveal">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-12 h-12 rounded-xl bg-navy-900 flex items-center justify-center text-gold-500">
                        <i class="fas fa-users-cog text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-serif text-2xl text-navy-900 font-bold">Clubs & Organizations</h3>
                        <p class="text-gray-500 text-sm">Find your community and pursue your passions</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($clubs ?? [
                        ['icon' => 'fa-mosque', 'title' => 'Islamic Society', 'desc' => 'Spiritual development, Quran circles, and community outreach programmes.', 'members' => '120 Members'],
                        ['icon' => 'fa-laptop-code', 'title' => 'Tech Innovation Club', 'desc' => 'Hackathons, coding workshops, and startup incubation for tech enthusiasts.', 'members' => '85 Members'],
                        ['icon' => 'fa-balance-scale', 'title' => 'Moot Court Society', 'desc' => 'Legal debate, mock trials, and preparation for international competitions.', 'members' => '60 Members'],
                        ['icon' => 'fa-palette', 'title' => 'Arts & Culture Club', 'desc' => 'Visual arts, theater, poetry slams, and cultural exhibition curation.', 'members' => '95 Members'],
                        ['icon' => 'fa-running', 'title' => 'Athletics Association', 'desc' => 'Inter-faculty leagues, fitness programmes, and varsity team training.', 'members' => '200 Members'],
                        ['icon' => 'fa-seedling', 'title' => 'Environmental Action Group', 'desc' => 'Sustainability projects, campus greening, and climate awareness campaigns.', 'members' => '70 Members'],
                    ] as $club)
                        <div class="service-card bg-white rounded-2xl p-6 scroll-reveal" style="transition-delay: {{ $loop->index * 0.05 }}s">
                            <div class="flex items-start gap-4">
                                <div class="card-icon w-14 h-14 rounded-xl bg-navy-900/5 flex items-center justify-center text-navy-900 flex-shrink-0">
                                    <i class="fas {{ $club['icon'] }} text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-serif text-lg text-navy-900 font-bold mb-1">{{ $club['title'] }}</h4>
                                    <p class="text-gray-500 text-sm mb-2">{{ $club['desc'] }}</p>
                                    <span class="text-xs text-gold-600 font-semibold">{{ $club['members'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold mb-4">Student Services</h2>
                <div class="w-24 h-1 bg-gold-500 mx-auto mb-6"></div>
                <p class="text-gray-600 leading-relaxed">
                    Comprehensive support services designed to help you thrive academically, personally, and professionally throughout your journey at INSAN.
                </p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                @foreach($services ?? [
                    ['image' => 'https://images.unsplash.com/photo-1573497019940-1b28c88b4f3e?w=600&q=80', 'icon' => 'fa-heart', 'title' => 'Counseling & Wellness', 'desc' => 'Professional counselors provide confidential support for stress management, anxiety, depression, and personal development.', 'features' => ['Free confidential counseling', 'Mental health awareness campaigns', 'Mindfulness & meditation sessions']],
                    ['image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&q=80', 'icon' => 'fa-briefcase', 'title' => 'Career Development', 'desc' => 'From your first year to graduation, our career team helps you explore options, build skills, and connect with employers.', 'features' => ['One-on-one career coaching', 'Annual career fair', 'Alumni mentorship matching']],
                    ['image' => 'https://images.unsplash.com/photo-1555854877-bab0e564b8d5?w=600&q=80', 'icon' => 'fa-home', 'title' => 'Housing & Accommodation', 'desc' => 'Safe, comfortable, and affordable living options on and near campus.', 'features' => ['On-campus dormitories', 'Off-campus housing assistance', 'Family housing options']],
                    ['image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=600&q=80', 'icon' => 'fa-stethoscope', 'title' => 'Health Services', 'desc' => 'On-campus medical clinic staffed by qualified physicians and nurses.', 'features' => ['Primary care & emergency response', 'Vaccination programmes', 'Health insurance coordination']],
                    ['image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&q=80', 'icon' => 'fa-book-reader', 'title' => 'Academic Support', 'desc' => 'Writing centers, peer tutoring, study skills workshops, and assistive technology.', 'features' => ['Peer tutoring programme', 'Writing & research support', 'Disability accommodations']],
                    ['image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?w=600&q=80', 'icon' => 'fa-hand-holding-usd', 'title' => 'Financial Aid & Scholarships', 'desc' => 'Merit-based scholarships, need-based grants, work-study programmes, and emergency financial assistance.', 'features' => ['Merit scholarships', 'Work-study opportunities', 'Emergency assistance fund']],
                ] as $service)
                    <div class="service-card bg-white rounded-2xl overflow-hidden scroll-reveal" style="transition-delay: {{ $loop->index % 3 * 0.1 }}s">
                        <div class="h-48 overflow-hidden">
                            <img src="{{ $service['image'] }}" alt="{{ $service['title'] }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <div class="card-icon w-14 h-14 rounded-xl bg-navy-900/5 flex items-center justify-center text-navy-900 mb-4">
                                <i class="fas {{ $service['icon'] }} text-xl"></i>
                            </div>
                            <h3 class="font-serif text-xl text-navy-900 font-bold mb-3">{{ $service['title'] }}</h3>
                            <p class="text-gray-500 text-sm mb-4 leading-relaxed">{{ $service['desc'] }}</p>
                            <ul class="space-y-2 mb-4">
                                @foreach($service['features'] as $feature)
                                    <li class="flex items-center gap-2 text-sm text-gray-600"><i class="fas fa-check text-gold-500 text-xs"></i> {{ $feature }}</li>
                                @endforeach
                            </ul>
                            <a href="#" class="text-gold-600 font-semibold text-sm hover:text-gold-700 flex items-center gap-1">
                                Learn More <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<!-- International Students Tab -->
<div class="tab-content" id="international">
    <section class="py-16 bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 scroll-reveal">
                <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold mb-4">International Students</h2>
                <div class="w-24 h-1 bg-gold-500 mx-auto mb-6"></div>
                <p class="text-gray-600 leading-relaxed">
                    Join a diverse community representing over 32 countries. Our International Student Office provides comprehensive support from admission to graduation.
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
                            <span class="text-gold-600 font-semibold text-sm uppercase tracking-wider">Your Home Away From Home</span>
                        </div>
                        <h3 class="font-serif text-2xl text-navy-900 font-bold mb-4">Dedicated Support for Our Global Community</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Whether you are from neighboring African nations, the Middle East, Southeast Asia, or beyond, our team understands the unique challenges of studying abroad.
                        </p>
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('admissions') }}" class="btn-primary px-6 py-3 rounded-lg text-white font-semibold text-sm">International Admissions</a>
                            <a href="#" class="border-2 border-navy-900 text-navy-900 px-6 py-3 rounded-lg font-semibold text-sm hover:bg-navy-900 hover:text-white transition-all">Download Guide</a>
                        </div>
                    </div>
                    <div class="h-64 lg:h-auto">
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=800&q=80" alt="International Students" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <!-- Services Accordion -->
            @php
            $intlServices = $intlServices ?? [
                ['icon' => 'fa-passport', 'title' => 'Visa & Immigration Support', 'subtitle' => 'Guidance through the entire visa process', 'features' => ['Visa application document preparation', 'Airport pickup upon arrival', 'Residence permit renewal support', 'Legal advisory for immigration matters']],
                ['icon' => 'fa-plane-arrival', 'title' => 'Orientation & Welcome Programme', 'subtitle' => 'Settle in with confidence', 'features' => ['Campus tour and facilities introduction', 'Academic system briefing', 'Cultural adaptation workshops', 'Buddy pairing with local students']],
                ['icon' => 'fa-language', 'title' => 'Language Support', 'subtitle' => 'Arabic and English proficiency programmes', 'features' => ['Intensive Arabic courses (all levels)', 'Academic English writing support', 'Conversation partner programme', 'Translation services for official documents']],
                ['icon' => 'fa-home', 'title' => 'Housing for International Students', 'subtitle' => 'Safe and comfortable accommodation options', 'features' => ['Furnished international student dormitories', 'Airport pickup and temporary housing', 'Off-campus housing database', '24/7 security and resident advisors']],
            ];
            @endphp

            <div class="grid lg:grid-cols-3 gap-8 mb-16">
                <div class="lg:col-span-2 space-y-4 scroll-reveal">
                    @foreach($intlServices as $index => $service)
                        <div class="accordion-item {{ $index === 0 ? 'active' : '' }} bg-white rounded-xl overflow-hidden shadow-sm">
                            <button class="w-full px-6 py-5 flex items-center justify-between text-left" onclick="toggleAccordion(this)">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-lg bg-navy-900 flex items-center justify-center text-gold-500">
                                        <i class="fas {{ $service['icon'] }}"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-serif text-lg text-navy-900 font-bold">{{ $service['title'] }}</h4>
                                        <p class="text-gray-500 text-sm">{{ $service['subtitle'] }}</p>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-down text-gold-500 accordion-icon"></i>
                            </button>
                            <div class="accordion-content">
                                <div class="px-6 pb-6 pl-20">
                                    <ul class="space-y-2">
                                        @foreach($service['features'] as $feature)
                                            <li class="flex items-center gap-2 text-sm text-gray-600"><i class="fas fa-check text-gold-500 text-xs"></i> {{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Quick Info Card -->
                <div class="scroll-reveal" style="transition-delay: 0.2s">
                    <div class="bg-navy-900 rounded-2xl p-8 text-white sticky top-40">
                        <h4 class="font-serif text-xl font-bold mb-6 text-gold-500">Quick Information</h4>
                        <div class="space-y-6">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-envelope text-gold-500 mt-1"></i>
                                <div>
                                    <div class="text-xs text-gray-400 mb-1">Email</div>
                                    <div class="text-sm">international@inu.edu.sd</div>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fas fa-phone text-gold-500 mt-1"></i>
                                <div>
                                    <div class="text-xs text-gray-400 mb-1">Phone</div>
                                    <div class="text-sm">+249 123 456 790</div>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fas fa-clock text-gold-500 mt-1"></i>
                                <div>
                                    <div class="text-xs text-gray-400 mb-1">Office Hours</div>
                                    <div class="text-sm">Sun - Thu: 8:00 AM - 4:00 PM</div>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <i class="fas fa-map-marker-alt text-gold-500 mt-1"></i>
                                <div>
                                    <div class="text-xs text-gray-400 mb-1">Location</div>
                                    <div class="text-sm">Administration Building, Room 105</div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 pt-6 border-t border-navy-700">
                            <h5 class="font-bold text-sm mb-3">Connect With Us</h5>
                            <div class="flex gap-3">
                                <a href="#" class="w-9 h-9 rounded-full bg-navy-800 flex items-center justify-center hover:bg-gold-500 transition-all"><i class="fab fa-whatsapp"></i></a>
                                <a href="#" class="w-9 h-9 rounded-full bg-navy-800 flex items-center justify-center hover:bg-gold-500 transition-all"><i class="fab fa-telegram"></i></a>
                                <a href="#" class="w-9 h-9 rounded-full bg-navy-800 flex items-center justify-center hover:bg-gold-500 transition-all"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Country Representatives -->
            @php
            $countries = $countries ?? [
                ['flag' => '🇸🇩', 'name' => 'Sudan', 'count' => 'Home'],
                ['flag' => '🇸🇦', 'name' => 'Saudi Arabia', 'count' => '180 Students'],
                ['flag' => '🇪🇬', 'name' => 'Egypt', 'count' => '145 Students'],
                ['flag' => '🇳🇬', 'name' => 'Nigeria', 'count' => '120 Students'],
                ['flag' => '🇲🇾', 'name' => 'Malaysia', 'count' => '85 Students'],
                ['flag' => '🇮🇩', 'name' => 'Indonesia', 'count' => '70 Students'],
                ['flag' => '🇵🇰', 'name' => 'Pakistan', 'count' => '65 Students'],
                ['flag' => '🇰🇪', 'name' => 'Kenya', 'count' => '55 Students'],
                ['flag' => '🇹🇷', 'name' => 'Turkey', 'count' => '45 Students'],
                ['flag' => '🇧🇩', 'name' => 'Bangladesh', 'count' => '40 Students'],
                ['flag' => '🇪🇹', 'name' => 'Ethiopia', 'count' => '35 Students'],
                ['flag' => '🌍', 'name' => 'Others', 'count' => '20+ Countries'],
            ];
            @endphp

            <div class="scroll-reveal">
                <h3 class="font-serif text-2xl text-navy-900 font-bold mb-8 text-center">Our International Community</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    @foreach($countries as $country)
                        <div class="bg-white rounded-xl p-4 text-center shadow-sm hover:shadow-md transition-shadow">
                            <div class="text-3xl mb-2">{{ $country['flag'] }}</div>
                            <div class="text-sm font-semibold text-navy-900">{{ $country['name'] }}</div>
                            <div class="text-xs text-gray-500">{{ $country['count'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('cta-section')
    @include('components.cta-section', [
        'title' => 'Experience INSAN Firsthand',
        'description' => 'Schedule a campus visit, attend an open day, or connect with a current student to learn more about life at INSAN.',
        'primaryButton' => ['text' => 'Book a Campus Tour', 'icon' => 'fa-calendar-check', 'url' => '#'],
        'secondaryButton' => ['text' => 'Talk to a Student', 'icon' => 'fa-comments', 'url' => '#']
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