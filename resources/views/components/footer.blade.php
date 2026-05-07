{{-- resources/views/components/footer.blade.php --}}
@php
$quickLinks = [
    ['label' => __('Home'), 'route' => 'home'],
    ['label' => __('About Us'), 'route' => 'about'],
    ['label' => __('Academics'), 'route' => 'programmes'],
    ['label' => __('Admissions'), 'route' => 'admissions'],
    ['label' => __('Campus Life'), 'route' => 'campus-life'],
    ['label' => __('News & Events'), 'route' => 'events-news'],
    ['label' => __('Contact'), 'route' => 'contact'],
];

$academicLinks = [
    ['label' => __('Academic Programmes'), 'route' => 'programmes'],
    ['label' => __('Academic Calendar'), 'route' => 'admissions.calendar'],
    ['label' => __('Collaborations & Partners'), 'route' => 'about.collaborations'],
    ['label' => __('Graduation Archive'), 'route' => 'about.graduation'],
    ['label' => __('Photo & Video Gallery'), 'route' => 'gallery'],
];

$admissionLinks = [
    ['label' => __('How to Apply'), 'route' => 'apply'],
    ['label' => __('Admission Requirements'), 'route' => 'admissions'],
    ['label' => __('Important Deadlines'), 'route' => 'admissions.calendar'],
    ['label' => __('Fees & Funding'), 'route' => 'admissions.fees'],
    ['label' => __('Scholarships'), 'route' => 'admissions.scholarships'],
    ['label' => __('International Students'), 'route' => 'international'],
];

$socialLinks = [
    ['icon' => 'fab fa-facebook-f', 'url' => '#', 'label' => 'Facebook'],
    ['icon' => 'fab fa-x-twitter', 'url' => '#', 'label' => 'Twitter'],
    ['icon' => 'fab fa-linkedin-in', 'url' => '#', 'label' => 'LinkedIn'],
    ['icon' => 'fab fa-instagram', 'url' => '#', 'label' => 'Instagram'],
    ['icon' => 'fab fa-youtube', 'url' => '#', 'label' => 'YouTube'],
];
@endphp

<footer class="bg-navy-900 border-t border-navy-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-12">
            <!-- Brand -->
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3 mb-6">
                    <img src="{{ asset('images/insan_logo.jpg') }}" alt="INSAN Logo" class="h-16 w-auto rounded-lg">
                    <div>
                        <h3 class="font-serif text-white font-bold text-xl">{{__('INSAN')}}</h3>
                        <p class="text-gray-400 text-xs tracking-wider uppercase">{{__('International University') }}</p>
                    </div>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-6 max-w-sm">{{__('Empowering education rooted in Islamic values and global excellence.')}}</p>
                <div class="flex gap-3">
                    @foreach($socialLinks as $social)
                        <a href="{{ $social['url'] }}" aria-label="{{ $social['label'] }}" 
                           class="w-10 h-10 rounded-full bg-navy-800 flex items-center justify-center text-gray-400 hover:bg-gold-500 hover:text-white transition-all">
                            <i class="{{ $social['icon'] }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="text-white font-bold mb-4 font-serif text-lg">{{ __('Quick Links') }}</h4>
                <ul class="space-y-3">
                    @foreach($quickLinks as $link)
                        <li>
                            <a href="{{ isset($link['route']) ? route($link['route']) : $link['url'] }}" 
                               class="text-gray-400 hover:text-gold-500 text-sm transition-colors flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-navy-700"></i> {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <!-- Academics -->
            <div>
                <h4 class="text-white font-bold mb-4 font-serif text-lg">{{ __('Academics') }}</h4>
                <ul class="space-y-3">
                    @foreach($academicLinks as $link)
                        <li>
                            <a href="{{ isset($link['route']) ? route($link['route']) : $link['url'] }}" 
                               class="text-gray-400 hover:text-gold-500 text-sm transition-colors flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-navy-700"></i> {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <!-- Admissions -->
            <div>
                <h4 class="text-white font-bold mb-4 font-serif text-lg">{{ __('Admissions') }}</h4>
                <ul class="space-y-3">
                    @foreach($admissionLinks as $link)
                        <li>
                            <a href="{{ isset($link['route']) ? route($link['route']) : $link['url'] }}" 
                               class="text-gray-400 hover:text-gold-500 text-sm transition-colors flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-navy-700"></i> {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        
        <!-- Bottom Bar -->
        <div class="mt-12 pt-8 border-t border-navy-800">
            <div class="grid md:grid-cols-2 gap-6 items-center">
                <div class="flex flex-wrap items-center gap-6 text-gray-400 text-sm">
                    <div class="flex items-center gap-2 hover:text-gold-500 transition-colors">
                        <i class="fas fa-map-marker-alt text-gold-500"></i>
                        <span>{{ config('university.address', 'Plot No. 23 - 25, Old Kampala. P.O. Box 72568, Kampala - Uganda') }}</span>
                    </div>
                    <div class="flex items-center gap-2 hover:text-gold-500 transition-colors">
                        <a href="tel:{{ config('university.phone_clean', '+256414675299') }}">
                            <i class="fas fa-phone text-gold-500 mr-1"></i>
                            <span>{{ config('university.phone', '+256 (0) 414 675 299') }}</span>
                        </a>
                    </div>
                    <div class="flex items-center gap-2 hover:text-gold-500 transition-colors">
                        <a href="mailto:{{ config('university.email', 'info@inu.edu.sd') }}">
                            <i class="fas fa-envelope text-gold-500 mr-1"></i>
                            <span>{{ config('university.email', 'info@inu.edu.sd') }}</span>
                        </a>
                    </div>
                </div>
                <div class="flex justify-start md:justify-end gap-6 text-sm">
                    <a href="#" class="text-gray-400 hover:text-gold-500 transition-colors">{{ __('Privacy Policy') }}</a>
                    <a href="#" class="text-gray-400 hover:text-gold-500 transition-colors">{{__('Terms & Conditions') }}</a>
                </div>
            </div>
            <div class="mt-8 text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} {{ config('university.name', 'INSAN International University') }}. {{__('All Rights Reserved.')}}.
            </div>
        </div>
    </div>
</footer>