<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
    @yield('page-styles')
</head>
<body>
    @include('components.top-bar')
    @include('components.navigation')
    
    <main>
        @yield('content')
    </main>

    @include('components.footer')
    @yield('cta-section')

    @stack('scripts')
    <script>
    // Mobile menu
    document.getElementById('mobile-menu-btn')?.addEventListener('click', () => {
        document.getElementById('mobile-menu')?.classList.toggle('hidden');
    });

    // Scroll reveal observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('active'); });
    }, { threshold: 0.1 });

    document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));

    // Global tab switching (used on multiple pages)
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const target = btn.dataset.tab;
            document.querySelectorAll('.tab-btn').forEach(b => {
                b.classList.remove('active');
                b.classList.add('bg-white', 'text-navy-900', 'border', 'border-gray-200');
            });
            btn.classList.add('active');
            btn.classList.remove('bg-white', 'text-navy-900', 'border', 'border-gray-200');
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
            document.getElementById(target)?.classList.add('active');
        });
    });

    // Global accordion
    function toggleAccordion(button) {
        const item = button.parentElement;
        const wasActive = item.classList.contains('active');
        document.querySelectorAll('.accordion-item').forEach(a => a.classList.remove('active'));
        if (!wasActive) item.classList.add('active');
    }
</script>
    @yield('page-scripts')
</body>
</html>