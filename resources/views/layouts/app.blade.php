<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'INSAN International University')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: { 900: '#0a1628', 800: '#0f1f3a', 700: '#152a4a', 600: '#1e3a5f' },
                        gold: { 400: '#d4b896', 500: '#c9a96e', 600: '#b8944f', 700: '#a0783a' },
                        cream: '#faf8f5',
                    },
                    fontFamily: {
                        serif: ['Playfair Display', 'serif'],
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <style>
        .islamic-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23c9a96e' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .nav-link { position: relative; }
        .nav-link::after {
            content: ''; position: absolute; bottom: -4px; left: 0; width: 0; height: 2px;
            background: #c9a96e; transition: width 0.3s ease;
        }
        .nav-link:hover::after { width: 100%; }
        .btn-primary {
            background: linear-gradient(135deg, #c9a96e, #b8944f);
            transition: all 0.3s ease;
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 10px 30px rgba(201,169,110,0.4); }
        .scroll-reveal {
            opacity: 0; transform: translateY(30px);
            transition: all 0.8s ease-out;
        }
        .scroll-reveal.active { opacity: 1; transform: translateY(0); }
        .hero-overlay {
            background: linear-gradient(135deg, rgba(10,22,40,0.95) 0%, rgba(10,22,40,0.8) 50%, rgba(10,22,40,0.6) 100%);
        }
        .arch-shape {
            border-radius: 50% 50% 10px 10px / 30% 30% 10px 10px;
        }
        .gold-gradient {
            background: linear-gradient(135deg, #c9a96e 0%, #d4b896 50%, #c9a96e 100%);
        }
        .tab-content { display: none; animation: fadeInUp 0.5s ease; }
        .tab-content.active { display: block; }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .modal-enter { animation: modalIn 0.3s ease; }
        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out;
        }
        .accordion-item.active .accordion-content { max-height: 500px; }
        .accordion-item.active .accordion-icon { transform: rotate(180deg); }
        .accordion-icon { transition: transform 0.3s ease; }
        @yield('page-styles')
    </style>
    
    @stack('styles')
</head>
<body class="font-sans text-gray-700 antialiased overflow-x-hidden bg-cream">

    @include('components.top-bar')
    @include('components.navigation')

    <main>
        @yield('content')
    </main>

    @hasSection('cta-section')
        @yield('cta-section')
    @else
        @include('components.cta-section', [
            'title' => 'Not Sure Which Programme?',
            'description' => 'Our admissions counsellors are ready to guide you through your options and help you find the perfect academic pathway.',
            'primary_button' => ['text' => 'Book a Consultation', 'icon' => 'fa-calendar-check', 'url' => '#'],
            'secondary_button' => ['text' => 'Download Prospectus', 'icon' => 'fa-download', 'url' => '#']
        ])
    @endif

    @include('components.footer')

    <script>
        // Scroll reveal observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('active');
            });
        }, { threshold: 0.1 });
        
        document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));

        // Tab switching functionality
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const tabId = this.dataset.tab;
                const container = this.closest('section, div').parentElement;
                
                // Update buttons
                container.querySelectorAll('.tab-btn').forEach(b => {
                    b.classList.remove('active');
                    b.classList.add('bg-white', 'text-navy-900', 'border', 'border-gray-200');
                });
                this.classList.add('active');
                this.classList.remove('bg-white', 'text-navy-900', 'border', 'border-gray-200');
                
                // Update content
                container.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                const targetContent = container.querySelector('#' + tabId) || document.getElementById(tabId);
                if (targetContent) targetContent.classList.add('active');
            });
        });

        // Mobile menu toggle
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        @stack('scripts')
    </script>
    
    @yield('page-scripts')
</body>
</html>