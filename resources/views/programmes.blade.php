{{-- resources/views/programmes.blade.php --}}
@extends('layouts.app')

@section('title', 'Academic Programmes & Pathways | INSAN International University')

@php
    $getImage = fn($path) => $path ? (Str::startsWith($path, ['http://', 'https://']) ? $path : asset('storage/' . $path)) : asset('images/placeholder.jpg');
@endphp

@section('content')

@include('components.hero-section', [
    'backgroundImage' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1920&q=80',
    'title' => 'Academic Programmes',
    'highlightedText' => '& Pathways',
    'description' => 'Discover our comprehensive range of undergraduate, graduate, and continuing education programmes designed to empower your academic and professional journey.',
    'breadcrumbs' => [
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Academics', 'url' => route('programmes')],
        ['label' => 'Programmes & Pathways']
    ],
    'height' => '400px'
])

<!-- Search & Filter Bar -->
<section class="bg-white border-b border-gray-200 py-6 sticky top-20 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="relative w-full md:w-96">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" 
                       placeholder="Search programmes by name or keyword..." 
                       class="search-input w-full pl-12 pr-4 py-3 rounded-lg border border-gray-200 focus:border-gold-500 focus:outline-none transition-all text-sm"
                       id="searchInput">
            </div>
            <div class="flex flex-wrap gap-2">
                <span class="filter-chip active px-4 py-2 rounded-full border border-gray-200 text-sm font-medium" data-filter="all">All Programmes</span>
                <span class="filter-chip px-4 py-2 rounded-full border border-gray-200 text-sm font-medium" data-filter="undergraduate">Undergraduate</span>
                <span class="filter-chip px-4 py-2 rounded-full border border-gray-200 text-sm font-medium" data-filter="graduate">Graduate</span>
                <span class="filter-chip px-4 py-2 rounded-full border border-gray-200 text-sm font-medium" data-filter="continuing">Continuing Ed</span>
            </div>
        </div>
    </div>
</section>

<!-- Tab Navigation -->
<section class="py-12 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4 mb-12 scroll-reveal">
            <button class="tab-btn active px-8 py-4 rounded-xl font-serif font-bold text-lg flex items-center gap-3" data-tab="undergraduate">
                <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="text-left">
                    <div>Undergraduate Programmes</div>
                    <div class="text-xs font-sans font-normal opacity-70">Bachelor's Degrees</div>
                </div>
            </button>
            <button class="tab-btn px-8 py-4 rounded-xl font-serif font-bold text-lg flex items-center gap-3 bg-white text-navy-900 border border-gray-200" data-tab="graduate">
                <div class="w-10 h-10 rounded-full bg-navy-900/10 flex items-center justify-center">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="text-left">
                    <div>Graduate Studies</div>
                    <div class="text-xs font-sans font-normal opacity-70">Master's & PhD</div>
                </div>
            </button>
            <button class="tab-btn px-8 py-4 rounded-xl font-serif font-bold text-lg flex items-center gap-3 bg-white text-navy-900 border border-gray-200" data-tab="continuing">
                <div class="w-10 h-10 rounded-full bg-navy-900/10 flex items-center justify-center">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="text-left">
                    <div>Continuing Education</div>
                    <div class="text-xs font-sans font-normal opacity-70">Certificates & Diplomas</div>
                </div>
            </button>
        </div>

        <!-- Undergraduate Tab -->
        <div class="tab-content active" id="undergraduate">
            <div class="mb-8 scroll-reveal">
                <h2 class="font-serif text-3xl text-navy-900 font-bold mb-2">Undergraduate Programmes</h2>
                <p class="text-gray-600">Four-year bachelor's degree programmes across 8 faculties, combining theoretical knowledge with practical skills.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($undergraduateProgrammes as $programme)
                    <div class="programme-card bg-white rounded-2xl overflow-hidden scroll-reveal" data-type="undergraduate">
                        <div class="h-2 bg-gradient-to-r from-gold-500 to-gold-400"></div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="card-icon w-14 h-14 rounded-xl bg-navy-900/5 flex items-center justify-center text-navy-900">
                                    <i class="fas {{ $programme->icon ?? 'fa-graduation-cap' }} text-xl"></i>
                                </div>
                                <span class="badge px-3 py-1 rounded-full text-xs font-semibold text-gold-600">{{ $programme->badge }}</span>
                            </div>
                            <h3 class="font-serif text-xl text-navy-900 font-bold mb-2">{{ $programme->title }}</h3>
                            <p class="text-gray-500 text-sm mb-4 leading-relaxed line-clamp-3">{{ $programme->description }}</p>
                            <div class="flex items-center gap-4 text-xs text-gray-400 mb-4">
                                <span class="flex items-center gap-1"><i class="fas fa-clock text-gold-500"></i> {{ $programme->duration }}</span>
                                <span class="flex items-center gap-1"><i class="fas fa-book text-gold-500"></i> {{ $programme->credits }}</span>
                                <span class="flex items-center gap-1"><i class="fas fa-calendar-check text-gold-500"></i> Intake: {{ $programme->intake }}</span>
                            </div>
                            <button onclick="openModal('{{ $programme->slug }}')" class="w-full py-3 rounded-lg border-2 border-navy-900 text-navy-900 font-semibold text-sm hover:bg-navy-900 hover:text-white transition-all flex items-center justify-center gap-2">
                                View Programme Details <i class="fas fa-arrow-right text-xs"></i>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-500">No undergraduate programmes available.</div>
                @endforelse
            </div>
        </div>

        <!-- Graduate Tab -->
        <div class="tab-content" id="graduate">
            <div class="mb-8 scroll-reveal">
                <h2 class="font-serif text-3xl text-navy-900 font-bold mb-2">Graduate Studies</h2>
                <p class="text-gray-600">Advanced master's and doctoral programmes for researchers, professionals, and academics seeking specialised expertise.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($graduateProgrammes as $programme)
                    <div class="programme-card bg-white rounded-2xl overflow-hidden scroll-reveal" data-type="graduate">
                        <div class="h-2 bg-gradient-to-r from-navy-900 to-navy-700"></div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="card-icon w-14 h-14 rounded-xl bg-navy-900/5 flex items-center justify-center text-navy-900">
                                    <i class="fas {{ $programme->icon ?? 'fa-user-graduate' }} text-xl"></i>
                                </div>
                                <span class="badge px-3 py-1 rounded-full text-xs font-semibold text-navy-900 bg-navy-900/10">{{ $programme->badge }}</span>
                            </div>
                            <h3 class="font-serif text-xl text-navy-900 font-bold mb-2">{{ $programme->title }}</h3>
                            <p class="text-gray-500 text-sm mb-4 leading-relaxed line-clamp-3">{{ $programme->description }}</p>
                            <div class="flex items-center gap-4 text-xs text-gray-400 mb-4">
                                <span class="flex items-center gap-1"><i class="fas fa-clock text-gold-500"></i> {{ $programme->duration }}</span>
                                <span class="flex items-center gap-1"><i class="fas fa-book text-gold-500"></i> {{ $programme->credits }}</span>
                                <span class="flex items-center gap-1"><i class="fas fa-calendar-check text-gold-500"></i> Intake: {{ $programme->intake }}</span>
                            </div>
                            <button onclick="openModal('{{ $programme->slug }}')" class="w-full py-3 rounded-lg border-2 border-navy-900 text-navy-900 font-semibold text-sm hover:bg-navy-900 hover:text-white transition-all flex items-center justify-center gap-2">
                                View Programme Details <i class="fas fa-arrow-right text-xs"></i>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-500">No graduate programmes available.</div>
                @endforelse
            </div>
        </div>

        <!-- Continuing Education Tab -->
        <div class="tab-content" id="continuing">
            <div class="mb-8 scroll-reveal">
                <h2 class="font-serif text-3xl text-navy-900 font-bold mb-2">Continuing Education</h2>
                <p class="text-gray-600">Professional certificates, diplomas, and short courses designed for career advancement and lifelong learning.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($continuingProgrammes as $programme)
                    <div class="programme-card bg-white rounded-2xl overflow-hidden scroll-reveal" data-type="continuing">
                        <div class="h-2 bg-gradient-to-r from-gold-600 to-gold-400"></div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="card-icon w-14 h-14 rounded-xl bg-gold-500/10 flex items-center justify-center text-gold-600">
                                    <i class="fas {{ $programme->icon ?? 'fa-certificate' }} text-xl"></i>
                                </div>
                                <span class="badge px-3 py-1 rounded-full text-xs font-semibold text-gold-700 bg-gold-500/10">{{ $programme->badge }}</span>
                            </div>
                            <h3 class="font-serif text-xl text-navy-900 font-bold mb-2">{{ $programme->title }}</h3>
                            <p class="text-gray-500 text-sm mb-4 leading-relaxed line-clamp-3">{{ $programme->description }}</p>
                            <div class="flex items-center gap-4 text-xs text-gray-400 mb-4">
                                <span class="flex items-center gap-1"><i class="fas fa-clock text-gold-500"></i> {{ $programme->duration }}</span>
                                <span class="flex items-center gap-1"><i class="fas fa-book text-gold-500"></i> {{ $programme->credits }}</span>
                                <span class="flex items-center gap-1"><i class="fas fa-calendar-check text-gold-500"></i> Intake: {{ $programme->intake }}</span>
                            </div>
                            <button onclick="openModal('{{ $programme->slug }}')" class="w-full py-3 rounded-lg border-2 border-navy-900 text-navy-900 font-semibold text-sm hover:bg-navy-900 hover:text-white transition-all flex items-center justify-center gap-2">
                                View Programme Details <i class="fas fa-arrow-right text-xs"></i>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-500">No continuing education programmes available.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- Programme Detail Modal -->
<div id="programmeModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-navy-900/80 backdrop-blur-sm" onclick="closeModal()"></div>
    <div class="absolute inset-4 md:inset-12 lg:inset-20 bg-white rounded-2xl overflow-hidden shadow-2xl flex flex-col modal-enter">
        <div class="flex items-center justify-between p-6 border-b border-gray-100">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-navy-900 flex items-center justify-center text-gold-500">
                    <i class="fas fa-graduation-cap text-xl" id="modalIcon"></i>
                </div>
                <div>
                    <h3 class="font-serif text-xl text-navy-900 font-bold" id="modalTitle">Programme Title</h3>
                    <span class="text-sm text-gold-600 font-semibold" id="modalType">Type</span>
                </div>
            </div>
            <button onclick="closeModal()" class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center transition-colors">
                <i class="fas fa-times text-gray-600"></i>
            </button>
        </div>
        <div class="flex-1 overflow-y-auto p-6">
            <div class="max-w-4xl mx-auto">
                <p class="text-gray-600 leading-relaxed mb-8 text-lg" id="modalDescription">Description</p>
                <div class="grid md:grid-cols-3 gap-4 mb-8">
                    <div class="bg-cream rounded-xl p-4 text-center border border-gold-500/20">
                        <i class="fas fa-clock text-gold-500 text-2xl mb-2"></i>
                        <div class="text-sm text-gray-500">Duration</div>
                        <div class="font-bold text-navy-900" id="modalDuration">-</div>
                    </div>
                    <div class="bg-cream rounded-xl p-4 text-center border border-gold-500/20">
                        <i class="fas fa-book text-gold-500 text-2xl mb-2"></i>
                        <div class="text-sm text-gray-500">Credits/Hours</div>
                        <div class="font-bold text-navy-900" id="modalCredits">-</div>
                    </div>
                    <div class="bg-cream rounded-xl p-4 text-center border border-gold-500/20">
                        <i class="fas fa-calendar text-gold-500 text-2xl mb-2"></i>
                        <div class="text-sm text-gray-500">Intake</div>
                        <div class="font-bold text-navy-900" id="modalIntake">-</div>
                    </div>
                </div>
                <div class="mb-8">
                    <h4 class="font-serif text-xl text-navy-900 font-bold mb-4 flex items-center gap-2">
                        <i class="fas fa-clipboard-check text-gold-500"></i> Admission Requirements
                    </h4>
                    <ul class="space-y-3" id="modalRequirements"></ul>
                </div>
                <div class="mb-8">
                    <h4 class="font-serif text-xl text-navy-900 font-bold mb-4 flex items-center gap-2">
                        <i class="fas fa-money-bill-wave text-gold-500"></i> Tuition & Fees
                    </h4>
                    <div class="bg-cream rounded-xl p-6 border border-gold-500/20">
                        <div class="grid md:grid-cols-2 gap-6" id="modalFees"></div>
                    </div>
                </div>
                <div class="mb-8">
                    <h4 class="font-serif text-xl text-navy-900 font-bold mb-4 flex items-center gap-2">
                        <i class="fas fa-list-ul text-gold-500"></i> Key Modules
                    </h4>
                    <div class="grid md:grid-cols-2 gap-3" id="modalModules"></div>
                </div>
            </div>
        </div>
        <div class="p-6 border-t border-gray-100 bg-cream flex flex-wrap gap-4 justify-end">
            <button onclick="closeModal()" class="px-6 py-3 rounded-lg border-2 border-gray-300 text-gray-600 font-semibold hover:border-navy-900 hover:text-navy-900 transition-all">Close</button>
            <a href="{{ route('apply') }}" class="btn-primary px-8 py-3 rounded-lg text-white font-semibold flex items-center gap-2">
                Apply for This Programme <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>

@endsection

@section('page-styles')
<style>
    .programme-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(201,169,110,0.15);
    }
    .programme-card:hover {
        transform: translateY(-8px);
        border-color: rgba(201,169,110,0.4);
        box-shadow: 0 25px 50px -12px rgba(10,22,40,0.15);
    }
    .programme-card .card-icon { transition: all 0.4s ease; }
    .programme-card:hover .card-icon {
        background: linear-gradient(135deg, #c9a96e, #b8944f);
        color: white;
        transform: scale(1.1) rotate(-5deg);
    }
    .badge {
        background: linear-gradient(135deg, #c9a96e20, #b8944f20);
        border: 1px solid rgba(201,169,110,0.3);
    }
    .filter-chip {
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .filter-chip:hover, .filter-chip.active {
        background: #0a1628;
        color: #c9a96e;
        border-color: #0a1628;
    }
    .search-input:focus {
        box-shadow: 0 0 0 3px rgba(201,169,110,0.3);
    }
</style>
@endsection

@section('page-scripts')
<script>
    // 1. Safely inject PHP data into JavaScript from the Controller
    const programmeData = @json($programmeData ?? []);

    // 2. Modal Logic
    function openModal(programmeId) {
        const data = programmeData[programmeId];
        if (!data) {
            console.error('Programme data not found for ID:', programmeId);
            return;
        }
        
        // Text Content
        document.getElementById('modalTitle').textContent = data.title || '';
        document.getElementById('modalType').textContent = data.type || '';
        document.getElementById('modalDescription').textContent = data.description || '';
        document.getElementById('modalDuration').textContent = data.duration || '-';
        document.getElementById('modalCredits').textContent = data.credits || '-';
        document.getElementById('modalIntake').textContent = data.intake || '-';
        
        // Icon
        document.getElementById('modalIcon').className = `fas ${data.icon || 'fa-graduation-cap'} text-xl`;
        
        // Arrays (Requirements, Fees, Modules) mapped to HTML
        const reqs = data.requirements || [];
        document.getElementById('modalRequirements').innerHTML = reqs.length ? reqs.map(req => 
            `<li class="flex items-start gap-3 p-3 rounded-lg bg-gray-50">
                <i class="fas fa-check-circle text-gold-500 mt-0.5 flex-shrink-0"></i>
                <span class="text-gray-600 text-sm">${req}</span>
            </li>`
        ).join('') : '<p class="text-sm text-gray-500">No specific requirements listed.</p>';
        
        const fees = data.fees || [];
        document.getElementById('modalFees').innerHTML = fees.length ? fees.map(fee => 
            `<div class="flex justify-between items-center p-3 border-b border-gray-100 last:border-0">
                <span class="text-gray-600 text-sm">${fee.label || fee.name}</span>
                <span class="font-bold text-navy-900">${fee.value || fee.amount}</span>
            </div>`
        ).join('') : '<p class="text-sm text-gray-500">Fee information unavailable.</p>';
        
        const modules = data.modules || [];
        document.getElementById('modalModules').innerHTML = modules.length ? modules.map(mod => 
            `<div class="flex items-center gap-3 p-3 rounded-lg bg-navy-900/5">
                <i class="fas fa-book-open text-gold-500 text-sm"></i>
                <span class="text-navy-900 text-sm font-medium">${mod}</span>
            </div>`
        ).join('') : '<p class="text-sm text-gray-500">Module information unavailable.</p>';
        
        // Show Modal
        document.getElementById('programmeModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    }

    function closeModal() {
        document.getElementById('programmeModal').classList.add('hidden');
        document.body.style.overflow = '';
    }

    // 3. Search functionality
    document.getElementById('searchInput')?.addEventListener('input', (e) => {
        const query = e.target.value.toLowerCase();
        
        document.querySelectorAll('.programme-card').forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            const desc = card.querySelector('p').textContent.toLowerCase();
            
            if (title.includes(query) || desc.includes(query)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });

    // 4. Filter Chips & Tab Syncing
    document.querySelectorAll('.filter-chip').forEach(chip => {
        chip.addEventListener('click', () => {
            const filter = chip.dataset.filter;
            
            // Highlight active chip
            document.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
            chip.classList.add('active');
            
            // Sync with Tabs and Content
            if (filter === 'all') {
                // If "All", show the first tab by default but show ALL cards
                document.querySelectorAll('.tab-btn').forEach(b => {
                    b.classList.remove('active');
                    b.classList.add('bg-white', 'text-navy-900', 'border-gray-200');
                });
                const firstTab = document.querySelector('.tab-btn');
                firstTab.classList.add('active');
                firstTab.classList.remove('bg-white', 'text-navy-900', 'border-gray-200');

                // Show all tab contents to display all cards
                document.querySelectorAll('.tab-content').forEach(c => c.classList.add('active'));
            } else {
                // Handle specific category filters
                document.querySelectorAll('.tab-btn').forEach(b => {
                    b.classList.remove('active');
                    b.classList.add('bg-white', 'text-navy-900', 'border-gray-200');
                });
                
                const targetBtn = document.querySelector(`[data-tab="${filter}"]`);
                if (targetBtn) {
                    targetBtn.classList.add('active');
                    targetBtn.classList.remove('bg-white', 'text-navy-900', 'border-gray-200');
                }
                
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                document.getElementById(filter)?.classList.add('active');
            }
        });
    });
</script>
@endsection