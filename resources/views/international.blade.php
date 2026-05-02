{{-- resources/views/international.blade.php --}}
@extends('layouts.app')

@section('title', 'International Students | INSAN International University')

@section('content')

{{-- 1. Hero Section --}}
@include('components.hero-section', [
    'backgroundImage' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=1920&q=80',
    'title' => 'Welcome to',
    'highlightedText' => 'INSAN',
    'description' => 'Join a vibrant, multicultural community. Discover world-class education, global collaboration, and a supportive environment designed for your success.',
    'breadcrumbs' => [
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'International Students']
    ],
    'height' => '450px'
])

{{-- 2. Value Proposition --}}
<section class="py-20 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="scroll-reveal">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-gold-500/10 flex items-center justify-center">
                        <i class="fas fa-globe-africa text-gold-500"></i>
                    </div>
                    <div class="h-px w-16 bg-gold-500"></div>
                </div>
                <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold mb-6">
                    A Global Perspective on<br>Education
                </h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    INSAN International University offers a truly multicultural environment that fosters global collaboration. We take pride in providing a welcoming and supportive atmosphere for students from all over the world.
                </p>
                <p class="text-gray-600 leading-relaxed mb-8">
                    Whether you are pursuing undergraduate or postgraduate studies, you will have access to a wide range of programs across our faculties—including Science, Education, Humanities, Business, and Islamic Studies—all backed by comprehensive academic advising and orientation programs.
                </p>
                <a href="{{ route('programmes') }}" class="inline-flex items-center gap-2 border-2 border-navy-900 text-navy-900 px-6 py-3 rounded font-semibold hover:bg-navy-900 hover:text-white transition-all">
                    Explore Our Programmes <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="scroll-reveal relative">
                <div class="absolute -inset-4 border-2 border-gold-500/30 rounded-3xl transform -rotate-3"></div>
                {{-- Updated Image: Student with Hijab --}}
                <img src="https://images.unsplash.com/photo-1507537509458-b8312d35a233?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                     alt="International Student" class="relative rounded-2xl shadow-2xl w-full h-[450px] object-cover object-top">
            </div>
        </div>
    </div>
</section>

{{-- 3. Dedicated Support Services --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 scroll-reveal">
            <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold mb-4">Dedicated Support Services</h2>
            <div class="w-24 h-1 bg-gold-500 mx-auto mb-6"></div>
            <p class="text-gray-600 leading-relaxed">
                Relocating for your studies is a big step. Our International Student Office is here to provide crucial utilities and assistance to ensure a smooth transition.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $services = [
                ['icon' => 'fa-passport', 'title' => 'Visa Assistance', 'desc' => 'Step-by-step guidance on obtaining your student visas and ensuring full immigration compliance.'],
                ['icon' => 'fa-home', 'title' => 'Housing Support', 'desc' => 'Assistance in finding suitable, safe, and comfortable accommodation in hostels and nearby apartments.'],
                ['icon' => 'fa-language', 'title' => 'Language Support', 'desc' => 'Dedicated English and Arabic language courses to help non-native speakers excel academically.'],
                ['icon' => 'fa-hands-helping', 'title' => 'Cultural Integration', 'desc' => 'Organized events and activities to help you experience the local culture and integrate seamlessly.'],
            ];
            @endphp

            @foreach($services as $index => $service)
                <div class="service-card bg-cream rounded-2xl p-8 scroll-reveal" style="transition-delay: {{ $index * 0.1 }}s">
                    <div class="card-icon w-16 h-16 rounded-xl bg-navy-900/5 flex items-center justify-center text-navy-900 mb-6">
                        <i class="fas {{ $service['icon'] }} text-2xl"></i>
                    </div>
                    <h3 class="font-serif text-xl text-navy-900 font-bold mb-3">{{ $service['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ $service['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 4. Social Proof / Testimonial --}}
<section class="py-24 bg-navy-900 relative overflow-hidden">
    <div class="absolute inset-0 islamic-pattern opacity-10"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-gold-500/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center scroll-reveal">
        <i class="fas fa-quote-left text-5xl text-gold-500 mb-8 opacity-80"></i>
        <p class="font-serif text-2xl md:text-3xl text-white leading-relaxed mb-8">
            "Studying at INSAN has been a transformative experience. The multicultural environment has allowed me to build lifelong friendships and gain a global perspective on education."
        </p>
        <div class="flex items-center justify-center gap-4">
            <div class="w-14 h-14 rounded-full bg-gold-500 flex items-center justify-center text-white text-xl font-bold">
                A
            </div>
            <div class="text-left">
                <h4 class="font-bold text-gold-500 text-lg">Abdulhakim Muhammad Jami</h4>
                <p class="text-gray-400 text-sm">International Student, Somalia</p>
            </div>
        </div>
    </div>
</section>

{{-- 5. Admissions Process & Requirements --}}
<section class="py-20 bg-cream border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16">
            
            {{-- Required Documents --}}
            <div class="scroll-reveal">
                <h3 class="font-serif text-3xl text-navy-900 font-bold mb-6">Application Requirements</h3>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Preparing your application is simple. Ensure you have the following essential documents ready before submitting your application to the Admissions Office.
                </p>
                
                <ul class="space-y-4">
                    @foreach([
                        'A completed application form (Online or Physical).',
                        'Academic transcripts and official certificates.',
                        'A valid passport (with at least 6 months validity).',
                        'Proof of English/Arabic proficiency (if required for your specific program).'
                    ] as $req)
                    <li class="flex items-start gap-4 p-4 rounded-xl bg-white border border-gray-100 shadow-sm">
                        <i class="fas fa-check-circle text-gold-500 text-xl mt-0.5"></i>
                        <span class="text-gray-700 font-medium">{{ $req }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Process Steps --}}
            <div class="scroll-reveal" style="transition-delay: 0.2s">
                <h3 class="font-serif text-3xl text-navy-900 font-bold mb-6">How to Apply</h3>
                <div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-gold-500 before:to-cream">
                    
                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full border-4 border-cream bg-gold-500 text-white font-bold shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 shadow">1</div>
                        <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] p-5 rounded-xl bg-white shadow-sm border border-gray-100">
                            <h4 class="font-bold text-navy-900 mb-1">Apply Online</h4>
                            <p class="text-sm text-gray-500">Submit your application via our online portal or directly to the Admissions Office.</p>
                        </div>
                    </div>

                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full border-4 border-cream bg-gold-500 text-white font-bold shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 shadow">2</div>
                        <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] p-5 rounded-xl bg-white shadow-sm border border-gray-100">
                            <h4 class="font-bold text-navy-900 mb-1">Submit Documents</h4>
                            <p class="text-sm text-gray-500">Upload all required documents, including your passport and transcripts.</p>
                        </div>
                    </div>

                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full border-4 border-cream bg-navy-900 text-white font-bold shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 shadow">3</div>
                        <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] p-5 rounded-xl bg-white shadow-sm border border-gray-100">
                            <h4 class="font-bold text-navy-900 mb-1">Receive Acceptance</h4>
                            <p class="text-sm text-gray-500">Once reviewed, receive your official acceptance letter and visa guidance.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

{{-- 6. Student Life Integration --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16 scroll-reveal">
            <h2 class="font-serif text-3xl md:text-4xl text-navy-900 font-bold mb-4">Integrate into Student Life</h2>
            <div class="w-24 h-1 bg-gold-500 mx-auto mb-6"></div>
            <p class="text-gray-600 leading-relaxed">
                University is more than just academics. We highly encourage our international students to fully immerse themselves in the campus experience.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center group scroll-reveal" style="transition-delay: 0.1s">
                <div class="overflow-hidden rounded-2xl mb-6">
                    <img src="https://images.unsplash.com/photo-1529070538774-1843cb3265df?w=600&q=80" alt="Groups" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <h3 class="font-serif text-xl font-bold text-navy-900 mb-2">Cultural & Academic Groups</h3>
                <p class="text-gray-500 text-sm">Join societies that celebrate diversity, debate ideas, and build lasting international networks.</p>
            </div>
            
            <div class="text-center group scroll-reveal" style="transition-delay: 0.2s">
                <div class="overflow-hidden rounded-2xl mb-6">
                    {{-- Updated Image: Sports & Athletics --}}
                    <img src="https://images.unsplash.com/photo-1511886929837-354d827aae26?w=600&q=80" alt="Sports" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <h3 class="font-serif text-xl font-bold text-navy-900 mb-2">Sports & Well-being</h3>
                <p class="text-gray-500 text-sm">Engage in various sports and wellness activities designed to keep you physically and mentally fit.</p>
            </div>
            
            <div class="text-center group scroll-reveal" style="transition-delay: 0.3s">
                <div class="overflow-hidden rounded-2xl mb-6">
                    {{-- Updated Image: Community Outreach & Volunteering --}}
                    <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=600&q=80" alt="Outreach" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <h3 class="font-serif text-xl font-bold text-navy-900 mb-2">Community Outreach</h3>
                <p class="text-gray-500 text-sm">Participate in local community programs to give back, connect with locals, and broaden your horizon.</p>
            </div>
        </div>
    </div>
</section>

@endsection

@section('cta-section')
    @include('components.cta-section', [
        'title' => 'Ready to Start Your Journey?',
        'description' => 'Take the next step in your academic career. Our international admissions team is ready to guide you.',
        'primaryButton' => ['text' => 'Apply Online Now', 'icon' => 'fa-arrow-right', 'url' => route('apply')],
        'secondaryButton' => ['text' => 'Contact Admissions', 'icon' => 'fa-envelope', 'url' => route('contact')]
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
        background-color: white;
    }
    .service-card .card-icon { transition: all 0.4s ease; }
    .service-card:hover .card-icon {
        background: linear-gradient(135deg, #c9a96e, #b8944f);
        color: white;
        transform: scale(1.1) rotate(-5deg);
    }
</style>
@endsection