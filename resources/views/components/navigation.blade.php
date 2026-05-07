@php
$navItems = [
    ['label' => __('Home'), 'route' => 'home', 'active' => request()->routeIs('home')],
    ['label' => __('About'), 'route' => 'about', 'active' => request()->routeIs('about')],
    ['label' => __('Academics'), 'route' => 'programmes', 'active' => request()->routeIs('programmes')],
    ['label' => __('Admissions'), 'route' => 'admissions', 'active' => request()->routeIs('admissions')],
    ['label' => __('International Students'), 'route' => 'international', 'active' => request()->routeIs('international')],
    ['label' => __('Campus Life'), 'route' => 'campus-life', 'active' => request()->routeIs('campus-life')],
    ['label' => __('News & Events'), 'route' => 'events-news', 'active' => request()->routeIs('events-news')],
    ['label' => __('Contact'), 'route' => 'contact', 'active' => request()->routeIs('contact')],
];
@endphp

<!-- Navigation -->
<nav class="bg-white shadow-sm sticky top-0 z-50" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/insan_logo.jpg') }}" alt="INSAN Logo" class="h-19 w-auto">
                <div class="hidden sm:block">
                    <h1 class="font-serif text-navy-1000 font-bold text-lg leading-tight">INSAN</h1>
                    <h1 class="text-xs text-gray-500 tracking-wider">INTERNATIONAL UNIVERSITY</h1>
                </div>
            </div>
            <div class="hidden lg:flex items-center gap-8">
                @foreach($navItems as $item)
                    <a href="{{ route($item['route']) }}" 
                       class="nav-link {{ $item['active'] ? 'text-navy-900' : 'text-gray-600 hover:text-navy-900' }} font-medium text-sm transition-colors">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>
            <button class="lg:hidden text-navy-900 text-xl" id="mobile-menu-btn" aria-label="Toggle menu">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div class="lg:hidden hidden bg-white border-t" id="mobile-menu">
        <div class="px-4 py-4 space-y-3">
            @foreach($navItems as $item)
                <a href="{{ route($item['route']) }}" class="block {{ $item['active'] ? 'text-navy-900 font-medium' : 'text-gray-600' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</nav>