{{-- resources/views/contact.blade.php --}}
@extends('layouts.app')

@section('title', 'Contact Us | INSAN International University')

@section('content')

{{-- 1. Hero Section --}}
@include('components.hero-section', [
    'backgroundImage' => 'https://images.unsplash.com/photo-1577563908411-5077b6dc7624?w=1920&q=80',
    'title' => 'Get in',
    'highlightedText' => 'Touch',
    'description' => 'We are here to help. Whether you are a prospective student, a parent, or an alumnus, our team is ready to answer your questions.',
    'breadcrumbs' => [
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Contact Us']
    ],
    'height' => '400px'
])

{{-- 2. Quick Contact Cards --}}
<div class="relative -mt-16 z-20 mb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="bg-white p-6 rounded-2xl shadow-lg border-b-4 border-gold-500 scroll-reveal" style="transition-delay: 0.1s">
                <div class="w-12 h-12 rounded-full bg-gold-500/10 flex items-center justify-center text-gold-600 mb-4">
                    <i class="fas fa-map-marker-alt text-xl"></i>
                </div>
                <h3 class="font-serif font-bold text-navy-900 mb-2">Main Campus</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    {{ config('university.address', 'Plot No. 23 - 25, Old Kampala. P.O. Box 72568, Kampala - Uganda') }}
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-lg border-b-4 border-gold-500 scroll-reveal" style="transition-delay: 0.2s">
                <div class="w-12 h-12 rounded-full bg-gold-500/10 flex items-center justify-center text-gold-600 mb-4">
                    <i class="fas fa-phone-alt text-xl"></i>
                </div>
                <h3 class="font-serif font-bold text-navy-900 mb-2">Call Us</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    <a href="tel:{{ config('university.phone_clean', '+256414675299') }}" class="hover:text-gold-600 transition-colors">
                        {{ config('university.phone', '+256 (0) 414 675 299') }}
                    </a><br>
                    <span class="text-xs text-gray-400">Mon-Fri, 8:00 AM - 5:00 PM</span>
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-lg border-b-4 border-gold-500 scroll-reveal" style="transition-delay: 0.3s">
                <div class="w-12 h-12 rounded-full bg-gold-500/10 flex items-center justify-center text-gold-600 mb-4">
                    <i class="fas fa-envelope text-xl"></i>
                </div>
                <h3 class="font-serif font-bold text-navy-900 mb-2">Email Us</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    <a href="mailto:{{ config('university.email', 'info@inu.edu.sd') }}" class="hover:text-gold-600 transition-colors">
                        {{ config('university.email', 'info@inu.edu.sd') }}
                    </a><br>
                    <span class="text-xs text-gray-400">We aim to reply within 24 hours</span>
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-lg border-b-4 border-gold-500 scroll-reveal" style="transition-delay: 0.4s">
                <div class="w-12 h-12 rounded-full bg-gold-500/10 flex items-center justify-center text-gold-600 mb-4">
                    <i class="fas fa-calendar-check text-xl"></i>
                </div>
                <h3 class="font-serif font-bold text-navy-900 mb-2">Admissions</h3>
                <p class="text-sm text-gray-500 leading-relaxed">
                    <a href="mailto:admissions@inu.edu.sd" class="hover:text-gold-600 transition-colors">admissions@inu.edu.sd</a><br>
                    <a href="{{ route('admissions') }}" class="text-xs text-gold-600 font-semibold hover:underline">Visit Admissions Page &rarr;</a>
                </p>
            </div>

        </div>
    </div>
</div>

{{-- 3. Form and Map Section --}}
<section class="py-16 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Success Flash Message --}}
        @if(session('success'))
            <div class="mb-10 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg shadow-sm flex items-start gap-4 scroll-reveal">
                <div class="text-green-500 mt-0.5">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
                <div>
                    <h3 class="text-green-800 font-bold text-sm">Message Sent Successfully!</h3>
                    <p class="text-green-700 text-sm mt-1">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <div class="grid lg:grid-cols-5 gap-12 lg:gap-16">
            
            {{-- Left Column: Contact Form --}}
            <div class="lg:col-span-3 scroll-reveal">
                <h2 class="font-serif text-3xl text-navy-900 font-bold mb-2">Send us a Message</h2>
                <p class="text-gray-600 mb-8">Fill out the form below and our team will get back to you as soon as possible.</p>
                
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6 bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    @csrf
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        {{-- Name Field --}}
                        <div>
                            <label for="name" class="block text-sm font-semibold text-navy-900 mb-2">Full Name <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                    class="w-full pl-11 pr-4 py-3 rounded-lg border @error('name') border-red-500 focus:ring-red-500/20 @else border-gray-200 focus:border-gold-500 focus:ring-gold-500/20 @enderror focus:ring-2 focus:outline-none transition-all text-sm bg-gray-50 focus:bg-white"
                                    placeholder="John Doe">
                            </div>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email Field --}}
                        <div>
                            <label for="email" class="block text-sm font-semibold text-navy-900 mb-2">Email Address <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                    class="w-full pl-11 pr-4 py-3 rounded-lg border @error('email') border-red-500 focus:ring-red-500/20 @else border-gray-200 focus:border-gold-500 focus:ring-gold-500/20 @enderror focus:ring-2 focus:outline-none transition-all text-sm bg-gray-50 focus:bg-white"
                                    placeholder="john@example.com">
                            </div>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Subject Field --}}
                    <div>
                        <label for="subject" class="block text-sm font-semibold text-navy-900 mb-2">Subject <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-tag text-gray-400"></i>
                            </div>
                            <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required
                                class="w-full pl-11 pr-4 py-3 rounded-lg border @error('subject') border-red-500 focus:ring-red-500/20 @else border-gray-200 focus:border-gold-500 focus:ring-gold-500/20 @enderror focus:ring-2 focus:outline-none transition-all text-sm bg-gray-50 focus:bg-white"
                                placeholder="How can we help you?">
                        </div>
                        @error('subject')
                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Message Field --}}
                    <div>
                        <label for="message" class="block text-sm font-semibold text-navy-900 mb-2">Your Message <span class="text-red-500">*</span></label>
                        <textarea name="message" id="message" rows="5" required
                            class="w-full p-4 rounded-lg border @error('message') border-red-500 focus:ring-red-500/20 @else border-gray-200 focus:border-gold-500 focus:ring-gold-500/20 @enderror focus:ring-2 focus:outline-none transition-all text-sm bg-gray-50 focus:bg-white resize-y"
                            placeholder="Please write your detailed message here...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div>
                        <button type="submit" class="btn-primary w-full sm:w-auto px-8 py-3.5 rounded-lg text-white font-semibold flex items-center justify-center gap-2 transition-transform duration-300">
                            <span>Send Message</span>
                            <i class="fas fa-paper-plane text-sm"></i>
                        </button>
                    </div>
                </form>
            </div>

            {{-- Right Column: Map & Extra Info --}}
            <div class="lg:col-span-2 space-y-8 scroll-reveal" style="transition-delay: 0.2s">
                
                {{-- Map Embed (Uganda National Mosque, Old Kampala) --}}
                <div class="bg-white p-2 rounded-2xl shadow-sm border border-gray-100 h-[300px] overflow-hidden relative group">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.752317180145!2d32.5683938!3d0.3169874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177dbc80ca7b6a4f%3A0xc3b5ea3f4585c21f!2sUganda%20National%20Mosque!5e0!3m2!1sen!2sug!4v1715000000000!5m2!1sen!2sug" 
                        class="w-full h-full rounded-xl grayscale group-hover:grayscale-0 transition-all duration-500" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                {{-- Department Directory --}}
                <div class="bg-navy-900 rounded-2xl p-8 text-white relative overflow-hidden">
                    <div class="absolute inset-0 islamic-pattern opacity-10"></div>
                    <div class="relative z-10">
                        <h3 class="font-serif text-xl font-bold text-gold-500 mb-6 border-b border-navy-700 pb-3">Department Directory</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-full bg-navy-800 flex items-center justify-center text-gold-500 shrink-0 mt-1">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm">International Students Office</h4>
                                    <p class="text-xs text-gray-400 mt-1"><a href="mailto:international@inu.edu.sd" class="hover:text-white transition-colors">international@inu.edu.sd</a></p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-full bg-navy-800 flex items-center justify-center text-gold-500 shrink-0 mt-1">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm">Finance & Student Accounts</h4>
                                    <p class="text-xs text-gray-400 mt-1"><a href="mailto:finance@inu.edu.sd" class="hover:text-white transition-colors">finance@inu.edu.sd</a></p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-full bg-navy-800 flex items-center justify-center text-gold-500 shrink-0 mt-1">
                                    <i class="fas fa-laptop-code"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-sm">IT Helpdesk</h4>
                                    <p class="text-xs text-gray-400 mt-1"><a href="mailto:it-support@inu.edu.sd" class="hover:text-white transition-colors">it-support@inu.edu.sd</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

@section('cta-section')
    @include('components.cta-section', [
        'title' => 'Frequently Asked Questions',
        'description' => 'You might find the answer you are looking for in our comprehensive FAQ section without needing to wait for an email reply.',
        'primaryButton' => ['text' => 'Visit FAQ Center', 'icon' => 'fa-question-circle', 'url' => '#'],
        'secondaryButton' => null
    ])
@endsection