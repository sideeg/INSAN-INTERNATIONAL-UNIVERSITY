@extends('layouts.app')

@section('title', 'Academic Programmes & Pathways | INSAN International University')

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
                @foreach($undergraduateProgrammes ?? [
                    ['id' => 'csit', 'icon' => 'fa-laptop-code', 'badge' => 'BSc (Hons)', 'title' => 'Computer Science & Information Technology', 'desc' => 'Develop expertise in software engineering, data science, cybersecurity, and artificial intelligence with hands-on laboratory training.', 'duration' => '4 Years', 'credits' => '140 Credits', 'students' => '120 Students'],
                    ['id' => 'islamic', 'icon' => 'fa-mosque', 'badge' => 'BA (Hons)', 'title' => 'Islamic Studies & Arabic Language', 'desc' => 'Comprehensive study of Islamic theology, jurisprudence, Quranic sciences, and classical Arabic linguistics and literature.', 'duration' => '4 Years', 'credits' => '132 Credits', 'students' => '200 Students'],
                    ['id' => 'law', 'icon' => 'fa-balance-scale', 'badge' => 'LLB (Hons)', 'title' => 'Law & Legal Studies', 'desc' => 'Rigorous training in national and international law, Islamic jurisprudence, constitutional law, and legal research methodologies.', 'duration' => '4 Years', 'credits' => '145 Credits', 'students' => '85 Students'],
                    ['id' => 'business', 'icon' => 'fa-chart-line', 'badge' => 'BBA (Hons)', 'title' => 'Business Administration & Management', 'desc' => 'Build leadership and management capabilities with specialisations in finance, marketing, entrepreneurship, and human resources.', 'duration' => '4 Years', 'credits' => '138 Credits', 'students' => '180 Students'],
                    ['id' => 'medicine', 'icon' => 'fa-heartbeat', 'badge' => 'BSc (Hons)', 'title' => 'Medicine & Health Sciences', 'desc' => 'Comprehensive medical education with clinical rotations, modern laboratory facilities, and community health practicum experience.', 'duration' => '6 Years', 'credits' => '220 Credits', 'students' => '95 Students'],
                    ['id' => 'engineering', 'icon' => 'fa-flask', 'badge' => 'BSc (Hons)', 'title' => 'Engineering & Applied Sciences', 'desc' => 'Specialisations in civil, electrical, mechanical, and chemical engineering with state-of-the-art workshops and research labs.', 'duration' => '5 Years', 'credits' => '160 Credits', 'students' => '110 Students'],
                ] as $programme)
                    <div class="programme-card bg-white rounded-2xl overflow-hidden scroll-reveal" data-type="undergraduate" style="transition-delay: {{ $loop->index % 3 * 0.1 }}s">
                        <div class="h-2 bg-gradient-to-r from-gold-500 to-gold-400"></div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="card-icon w-14 h-14 rounded-xl bg-navy-900/5 flex items-center justify-center text-navy-900">
                                    <i class="fas {{ $programme['icon'] }} text-xl"></i>
                                </div>
                                <span class="badge px-3 py-1 rounded-full text-xs font-semibold text-gold-600">{{ $programme['badge'] }}</span>
                            </div>
                            <h3 class="font-serif text-xl text-navy-900 font-bold mb-2">{{ $programme['title'] }}</h3>
                            <p class="text-gray-500 text-sm mb-4 leading-relaxed">{{ $programme['desc'] }}</p>
                            <div class="flex items-center gap-4 text-xs text-gray-400 mb-4">
                                <span class="flex items-center gap-1"><i class="fas fa-clock text-gold-500"></i> {{ $programme['duration'] }}</span>
                                <span class="flex items-center gap-1"><i class="fas fa-book text-gold-500"></i> {{ $programme['credits'] }}</span>
                                <span class="flex items-center gap-1"><i class="fas fa-users text-gold-500"></i> {{ $programme['students'] }}</span>
                            </div>
                            <button onclick="openModal('{{ $programme['id'] }}')" class="w-full py-3 rounded-lg border-2 border-navy-900 text-navy-900 font-semibold text-sm hover:bg-navy-900 hover:text-white transition-all flex items-center justify-center gap-2">
                                View Programme Details <i class="fas fa-arrow-right text-xs"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Graduate Tab -->
        <div class="tab-content" id="graduate">
            <div class="mb-8 scroll-reveal">
                <h2 class="font-serif text-3xl text-navy-900 font-bold mb-2">Graduate Studies</h2>
                <p class="text-gray-600">Advanced master's and doctoral programmes for researchers, professionals, and academics seeking specialised expertise.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($graduateProgrammes ?? [
                    ['id' => 'msc-ds', 'icon' => 'fa-brain', 'badge' => 'MSc', 'title' => 'Data Science & Artificial Intelligence', 'desc' => 'Advanced study in machine learning, deep learning, big data analytics, and intelligent systems design with industry collaboration.', 'duration' => '2 Years', 'credits' => '36 Credits', 'students' => '45 Students'],
                    ['id' => 'ma-islamic', 'icon' => 'fa-mosque', 'badge' => 'MA / PhD', 'title' => 'Advanced Islamic Studies', 'desc' => 'Specialised research in Islamic philosophy, comparative religion, contemporary Islamic thought, and Quranic hermeneutics.', 'duration' => '2-4 Years', 'credits' => '36-60 Credits', 'students' => '60 Students'],
                    ['id' => 'mba', 'icon' => 'fa-briefcase', 'badge' => 'MBA', 'title' => 'Master of Business Administration', 'desc' => 'Executive-level business education with concentrations in strategic management, international business, and Islamic finance.', 'duration' => '18 Months', 'credits' => '48 Credits', 'students' => '75 Students'],
                    ['id' => 'mph', 'icon' => 'fa-stethoscope', 'badge' => 'MSc / MD', 'title' => 'Public Health & Epidemiology', 'desc' => 'Research-focused programme in disease prevention, health policy, biostatistics, and global health management.', 'duration' => '2 Years', 'credits' => '40 Credits', 'students' => '35 Students'],
                    ['id' => 'llm', 'icon' => 'fa-landmark', 'badge' => 'LLM / PhD', 'title' => 'International Law & Human Rights', 'desc' => 'Advanced legal studies in international arbitration, human rights law, comparative constitutional law, and diplomatic law.', 'duration' => '2-4 Years', 'credits' => '36-60 Credits', 'students' => '40 Students'],
                    ['id' => 'meng', 'icon' => 'fa-cogs', 'badge' => 'MEng / PhD', 'title' => 'Sustainable Engineering', 'desc' => 'Research programme in renewable energy systems, green building technology, environmental engineering, and sustainable design.', 'duration' => '2-4 Years', 'credits' => '36-60 Credits', 'students' => '30 Students'],
                ] as $programme)
                    <div class="programme-card bg-white rounded-2xl overflow-hidden scroll-reveal" data-type="graduate" style="transition-delay: {{ $loop->index % 3 * 0.1 }}s">
                        <div class="h-2 bg-gradient-to-r from-navy-900 to-navy-700"></div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="card-icon w-14 h-14 rounded-xl bg-navy-900/5 flex items-center justify-center text-navy-900">
                                    <i class="fas {{ $programme['icon'] }} text-xl"></i>
                                </div>
                                <span class="badge px-3 py-1 rounded-full text-xs font-semibold text-navy-900 bg-navy-900/10">{{ $programme['badge'] }}</span>
                            </div>
                            <h3 class="font-serif text-xl text-navy-900 font-bold mb-2">{{ $programme['title'] }}</h3>
                            <p class="text-gray-500 text-sm mb-4 leading-relaxed">{{ $programme['desc'] }}</p>
                            <div class="flex items-center gap-4 text-xs text-gray-400 mb-4">
                                <span class="flex items-center gap-1"><i class="fas fa-clock text-gold-500"></i> {{ $programme['duration'] }}</span>
                                <span class="flex items-center gap-1"><i class="fas fa-book text-gold-500"></i> {{ $programme['credits'] }}</span>
                                <span class="flex items-center gap-1"><i class="fas fa-users text-gold-500"></i> {{ $programme['students'] }}</span>
                            </div>
                            <button onclick="openModal('{{ $programme['id'] }}')" class="w-full py-3 rounded-lg border-2 border-navy-900 text-navy-900 font-semibold text-sm hover:bg-navy-900 hover:text-white transition-all flex items-center justify-center gap-2">
                                View Programme Details <i class="fas fa-arrow-right text-xs"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Continuing Education Tab -->
        <div class="tab-content" id="continuing">
            <div class="mb-8 scroll-reveal">
                <h2 class="font-serif text-3xl text-navy-900 font-bold mb-2">Continuing Education</h2>
                <p class="text-gray-600">Professional certificates, diplomas, and short courses designed for career advancement and lifelong learning.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($continuingProgrammes ?? [
                    ['id' => 'pmp', 'icon' => 'fa-certificate', 'badge' => 'Certificate', 'title' => 'Project Management Professional (PMP)', 'desc' => 'Industry-recognised certification preparing professionals for leadership roles in project planning, execution, and delivery across sectors.', 'duration' => '12 Weeks', 'credits' => '120 Hours', 'students' => '50 Students'],
                    ['id' => 'webdev', 'icon' => 'fa-code', 'badge' => 'Diploma', 'title' => 'Full-Stack Web Development', 'desc' => 'Intensive hands-on training in modern web technologies including React, Node.js, databases, cloud deployment, and DevOps practices.', 'duration' => '6 Months', 'credits' => '240 Hours', 'students' => '65 Students'],
                    ['id' => 'arabic', 'icon' => 'fa-language', 'badge' => 'Certificate', 'title' => 'Arabic Language Proficiency', 'desc' => 'Structured programme from beginner to advanced levels, covering classical Arabic, modern standard Arabic, and professional communication.', 'duration' => '16 Weeks', 'credits' => '160 Hours', 'students' => '80 Students'],
                    ['id' => 'islamic-finance', 'icon' => 'fa-chart-pie', 'badge' => 'Diploma', 'title' => 'Islamic Banking & Finance', 'desc' => 'Comprehensive understanding of Sharia-compliant financial instruments, risk management, and Islamic capital markets for finance professionals.', 'duration' => '8 Months', 'credits' => '200 Hours', 'students' => '55 Students'],
                    ['id' => 'design', 'icon' => 'fa-palette', 'badge' => 'Certificate', 'title' => 'Digital Design & Multimedia', 'desc' => 'Creative skills in graphic design, UI/UX design, video production, and motion graphics using industry-standard software and tools.', 'duration' => '10 Weeks', 'credits' => '100 Hours', 'students' => '40 Students'],
                    ['id' => 'healthcare', 'icon' => 'fa-first-aid', 'badge' => 'Diploma', 'title' => 'Healthcare Administration', 'desc' => 'Management skills for healthcare settings including hospital administration, health informatics, quality assurance, and patient care systems.', 'duration' => '6 Months', 'credits' => '180 Hours', 'students' => '35 Students'],
                ] as $programme)
                    <div class="programme-card bg-white rounded-2xl overflow-hidden scroll-reveal" data-type="continuing" style="transition-delay: {{ $loop->index % 3 * 0.1 }}s">
                        <div class="h-2 bg-gradient-to-r from-gold-600 to-gold-400"></div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="card-icon w-14 h-14 rounded-xl bg-gold-500/10 flex items-center justify-center text-gold-600">
                                    <i class="fas {{ $programme['icon'] }} text-xl"></i>
                                </div>
                                <span class="badge px-3 py-1 rounded-full text-xs font-semibold text-gold-700 bg-gold-500/10">{{ $programme['badge'] }}</span>
                            </div>
                            <h3 class="font-serif text-xl text-navy-900 font-bold mb-2">{{ $programme['title'] }}</h3>
                            <p class="text-gray-500 text-sm mb-4 leading-relaxed">{{ $programme['desc'] }}</p>
                            <div class="flex items-center gap-4 text-xs text-gray-400 mb-4">
                                <span class="flex items-center gap-1"><i class="fas fa-clock text-gold-500"></i> {{ $programme['duration'] }}</span>
                                <span class="flex items-center gap-1"><i class="fas fa-book text-gold-500"></i> {{ $programme['credits'] }}</span>
                                <span class="flex items-center gap-1"><i class="fas fa-users text-gold-500"></i> {{ $programme['students'] }}</span>
                            </div>
                            <button onclick="openModal('{{ $programme['id'] }}')" class="w-full py-3 rounded-lg border-2 border-navy-900 text-navy-900 font-semibold text-sm hover:bg-navy-900 hover:text-white transition-all flex items-center justify-center gap-2">
                                View Programme Details <i class="fas fa-arrow-right text-xs"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
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
@php
    // Fallback data just in case the controller doesn't pass anything yet
    $defaultProgrammeData = [
        'csit' => [
            'title' => 'Computer Science & Information Technology',
            'type' => 'BSc (Hons) - Undergraduate',
            'icon' => 'fa-laptop-code',
            'description' => 'The BSc (Hons) in Computer Science and Information Technology is a comprehensive four-year programme designed to produce skilled software engineers, data scientists, and IT professionals.',
            'duration' => '4 Years (8 Semesters)',
            'credits' => '140 Credits',
            'intake' => 'September & February',
            'requirements' => [
                'Secondary School Certificate with minimum 70% in Mathematics and Physics',
                'English Language proficiency (IELTS 6.0 or equivalent)'
            ],
            'fees' => [
                ['label' => 'Total Programme Cost', 'value' => '$20,600 USD'],
            ],
            'modules' => [
                'Introduction to Programming & Algorithms',
                'Artificial Intelligence & Machine Learning'
            ],
        ],
    ];
@endphp

<script>
    // 1. Safely inject PHP data into JavaScript
    const programmeData = @json($programmeData ?? $defaultProgrammeData);

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