@extends('layouts.app')

@section('title', 'Events, News & Gallery | INSAN International University')

@section('content')

@include('components.hero-section', [
    'backgroundImage' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1920&q=80',
    'title' => 'Events, News',
    'highlightedText' => '& Multimedia Gallery',
    'description' => 'Stay connected with campus life. Explore upcoming events, latest news, and our visual journey through photos and videos.',
    'breadcrumbs' => [
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'News, Events & Gallery']
    ],
    'height' => '400px'
])

<!-- Section Tabs -->
<section class="bg-white border-b border-gray-200 py-6 sticky top-20 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            <button class="tab-btn active px-6 py-3 rounded-xl font-serif font-bold text-base flex items-center gap-2" data-tab="events">
                <i class="fas fa-calendar-alt"></i> Upcoming Events
            </button>
            <button class="tab-btn px-6 py-3 rounded-xl font-serif font-bold text-base flex items-center gap-2 bg-white text-navy-900 border border-gray-200" data-tab="news">
                <i class="fas fa-newspaper"></i> Latest News
            </button>
            <button class="tab-btn px-6 py-3 rounded-xl font-serif font-bold text-base flex items-center gap-2 bg-white text-navy-900 border border-gray-200" data-tab="gallery">
                <i class="fas fa-images"></i> Multimedia Gallery
            </button>
        </div>
    </div>
</section>

<!-- Events Tab -->
<div class="tab-content active" id="events">
    <section class="py-16 bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-4">
                <div class="scroll-reveal">
                    <h2 class="font-serif text-3xl text-navy-900 font-bold mb-2">Upcoming Events</h2>
                    <p class="text-gray-600">Join us for academic conferences, cultural celebrations, and community gatherings.</p>
                </div>
                <div class="flex flex-wrap gap-2 scroll-reveal">
                    <span class="filter-chip active px-4 py-2 rounded-full border border-gray-200 text-sm font-medium" data-event-filter="all">All Events</span>
                    <span class="filter-chip px-4 py-2 rounded-full border border-gray-200 text-sm font-medium" data-event-filter="academic">Academic</span>
                    <span class="filter-chip px-4 py-2 rounded-full border border-gray-200 text-sm font-medium" data-event-filter="cultural">Cultural</span>
                    <span class="filter-chip px-4 py-2 rounded-full border border-gray-200 text-sm font-medium" data-event-filter="sports">Sports</span>
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="eventsGrid">
                @foreach($events ?? [
                    ['id' => 'graduation', 'category' => 'academic', 'image' => 'https://images.unsplash.com/photo-1544531585-9847b68c8c86?w=800&q=80', 'month' => 'May', 'day' => '15', 'title' => 'Annual Graduation Ceremony 2026', 'time' => '9:00 AM - 2:00 PM', 'location' => 'Main Auditorium', 'desc' => 'Join us in celebrating the achievements of our graduating class of 2026. Keynote address by distinguished alumni and award presentations.', 'end_date' => 'May 15, 2026'],
                    ['id' => 'cultural', 'category' => 'cultural', 'image' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=800&q=80', 'month' => 'May', 'day' => '22', 'title' => 'International Cultural Night', 'time' => '6:00 PM - 10:00 PM', 'location' => 'University Square', 'desc' => 'A vibrant celebration of diversity featuring traditional performances, international cuisine, and cultural exhibitions from over 25 countries.', 'end_date' => 'May 22, 2026'],
                    ['id' => 'research', 'category' => 'academic', 'image' => 'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=800&q=80', 'month' => 'Jun', 'day' => '05', 'title' => 'Research & Innovation Summit', 'time' => '10:00 AM - 4:00 PM', 'location' => 'Conference Center', 'desc' => 'Faculty and graduate students present cutting-edge research in Islamic studies, engineering, and health sciences. Open to the public.', 'end_date' => 'Jun 07, 2026'],
                    ['id' => 'sports', 'category' => 'sports', 'image' => 'https://images.unsplash.com/photo-1461896836934- voices?w=800&q=80', 'month' => 'Jun', 'day' => '12', 'title' => 'Inter-University Sports Tournament', 'time' => '8:00 AM - 6:00 PM', 'location' => 'Sports Complex', 'desc' => 'Annual tournament featuring football, basketball, volleyball, and athletics. Teams from 12 universities competing for the championship.', 'end_date' => 'Jun 14, 2026'],
                    ['id' => 'career', 'category' => 'academic', 'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&q=80', 'month' => 'Jun', 'day' => '18', 'title' => 'Career & Internship Fair', 'time' => '10:00 AM - 4:00 PM', 'location' => 'Grand Hall', 'desc' => 'Connect with over 50 employers from multinational corporations, government agencies, and NGOs. Bring your CV and network with recruiters.', 'end_date' => 'Jun 18, 2026'],
                    ['id' => 'leadership', 'category' => 'academic', 'image' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?w=800&q=80', 'month' => 'Jul', 'day' => '03', 'title' => 'Youth Leadership Workshop', 'time' => '9:00 AM - 3:00 PM', 'location' => 'Seminar Room B', 'desc' => 'Intensive workshop on leadership skills, conflict resolution, and project management for student council members and aspiring leaders.', 'end_date' => 'Jul 04, 2026'],
                ] as $event)
                    <div class="event-card bg-white rounded-2xl overflow-hidden scroll-reveal" data-category="{{ $event['category'] }}" style="transition-delay: {{ $loop->index % 3 * 0.1 }}s">
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ $event['image'] }}" alt="{{ $event['title'] }}" class="w-full h-full object-cover">
                            <div class="absolute top-4 left-4 date-badge text-white px-4 py-2 rounded-lg text-center shadow-lg">
                                <div class="text-xs uppercase tracking-wider text-gold-400">{{ $event['month'] }}</div>
                                <div class="text-2xl font-bold font-serif">{{ $event['day'] }}</div>
                            </div>
                            <span class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-semibold text-navy-900 capitalize">{{ $event['category'] }}</span>
                        </div>
                        <div class="p-6">
                            <h3 class="font-serif text-xl text-navy-900 font-bold mb-2">{{ $event['title'] }}</h3>
                            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                                <span class="flex items-center gap-1"><i class="fas fa-clock text-gold-500"></i> {{ $event['time'] }}</span>
                                <span class="flex items-center gap-1"><i class="fas fa-map-marker-alt text-gold-500"></i> {{ $event['location'] }}</span>
                            </div>
                            <p class="text-gray-500 text-sm mb-4 leading-relaxed">{{ $event['desc'] }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-gray-400">Ends: {{ $event['end_date'] }}</span>
                                <button onclick="openEventModal('{{ $event['id'] }}')" class="text-gold-600 font-semibold text-sm hover:text-gold-700 flex items-center gap-1">
                                    Details <i class="fas fa-arrow-right text-xs"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<!-- News Tab -->
<div class="tab-content" id="news">
    <section class="py-16 bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12 scroll-reveal">
                <h2 class="font-serif text-3xl text-navy-900 font-bold mb-2">Latest News</h2>
                <p class="text-gray-600">Stories of achievement, innovation, and community from across our campus.</p>
            </div>

            @php
            $featuredNews = $featuredNews ?? [
                'image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=800&q=80',
                'badge' => 'Featured',
                'date' => 'April 28, 2026',
                'author' => 'Communications Office',
                'title' => 'INSAN Signs Partnership Agreement with Oxford Centre for Islamic Studies',
                'excerpt' => 'A landmark academic collaboration that will enable student exchanges, joint research initiatives, and shared library resources between the two institutions. The five-year agreement was signed during a ceremony attended by university leadership and visiting dignitaries.'
            ];
            
            $sideNews = $sideNews ?? [
                ['image' => 'https://images.unsplash.com/photo-1564981797816-1043664bf78d?w=400&q=80', 'date' => 'April 25, 2026', 'title' => 'Engineering Students Win National Robotics Competition', 'excerpt' => 'Team INSAN took first place with their autonomous drone navigation system.'],
                ['image' => 'https://images.unsplash.com/photo-1571260899304-425eee4c7efc?w=400&q=80', 'date' => 'April 20, 2026', 'title' => 'New Library Wing Opens with 50,000 Digital Manuscripts', 'excerpt' => 'The Islamic Digital Archive becomes the largest of its kind in the region.'],
                ['image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=400&q=80', 'date' => 'April 15, 2026', 'title' => 'Medical Faculty Receives WHO Accreditation', 'excerpt' => 'The five-year accreditation recognizes excellence in medical education and clinical training.'],
                ['image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=400&q=80', 'date' => 'April 10, 2026', 'title' => 'International Student Enrollment Reaches All-Time High', 'excerpt' => 'Students from 32 countries now call INSAN home, reflecting our global reputation.'],
            ];
            
            $gridNews = $gridNews ?? [
                ['image' => 'https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?w=600&q=80', 'date' => 'April 5, 2026', 'title' => 'Alumni Network Launches Mentorship Program', 'excerpt' => 'Graduates connect with current students for career guidance and professional development.'],
                ['image' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=600&q=80', 'date' => 'March 28, 2026', 'title' => 'Solar Energy Research Lab Inaugurated', 'excerpt' => 'State-of-the-art facility dedicated to renewable energy research and innovation.'],
                ['image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&q=80', 'date' => 'March 22, 2026', 'title' => 'Business School Introduces Islamic Fintech Program', 'excerpt' => 'New specialization addresses growing demand for Sharia-compliant financial technology.'],
            ];
            @endphp

            <div class="grid lg:grid-cols-2 gap-8 mb-12">
                <!-- Featured News -->
                <div class="news-card bg-white rounded-2xl overflow-hidden shadow-sm scroll-reveal">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ $featuredNews['image'] }}" alt="{{ $featuredNews['title'] }}" class="news-img w-full h-full object-cover">
                        <div class="absolute bottom-4 left-4 bg-gold-500 text-white px-3 py-1 rounded-full text-xs font-semibold">{{ $featuredNews['badge'] }}</div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-3 text-sm text-gray-400 mb-3">
                            <span><i class="fas fa-calendar text-gold-500"></i> {{ $featuredNews['date'] }}</span>
                            <span>|</span>
                            <span><i class="fas fa-user text-gold-500"></i> {{ $featuredNews['author'] }}</span>
                        </div>
                        <h3 class="font-serif text-2xl text-navy-900 font-bold mb-3">{{ $featuredNews['title'] }}</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">{{ $featuredNews['excerpt'] }}</p>
                        <a href="#" class="inline-flex items-center gap-2 text-gold-600 font-semibold hover:text-gold-700">
                            Read Full Story <i class="fas fa-arrow-right text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Side News List -->
                <div class="space-y-6">
                    @foreach($sideNews as $news)
                        <div class="news-card bg-white rounded-xl p-6 flex gap-4 scroll-reveal" style="transition-delay: {{ $loop->index * 0.1 }}s">
                            <div class="w-32 h-24 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="{{ $news['image'] }}" alt="{{ $news['title'] }}" class="news-img w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <div class="text-xs text-gray-400 mb-1"><i class="fas fa-calendar text-gold-500"></i> {{ $news['date'] }}</div>
                                <h4 class="font-serif text-lg text-navy-900 font-bold mb-1 hover:text-gold-600 cursor-pointer">{{ $news['title'] }}</h4>
                                <p class="text-gray-500 text-sm line-clamp-2">{{ $news['excerpt'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- More News Grid -->
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($gridNews as $news)
                    <div class="news-card bg-white rounded-xl overflow-hidden scroll-reveal" style="transition-delay: {{ $loop->index * 0.1 }}s">
                        <div class="h-40 overflow-hidden">
                            <img src="{{ $news['image'] }}" alt="{{ $news['title'] }}" class="news-img w-full h-full object-cover">
                        </div>
                        <div class="p-5">
                            <div class="text-xs text-gray-400 mb-2"><i class="fas fa-calendar text-gold-500"></i> {{ $news['date'] }}</div>
                            <h4 class="font-serif text-navy-900 font-bold mb-2">{{ $news['title'] }}</h4>
                            <p class="text-gray-500 text-sm">{{ $news['excerpt'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<!-- Gallery Tab -->
<div class="tab-content" id="gallery">
    <section class="py-16 bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-4">
                <div class="scroll-reveal">
                    <h2 class="font-serif text-3xl text-navy-900 font-bold mb-2">Multimedia Gallery</h2>
                    <p class="text-gray-600">Explore our campus, events, and community through photos and videos.</p>
                </div>
                <div class="flex flex-wrap gap-2 scroll-reveal">
                    <span class="filter-chip active px-4 py-2 rounded-full border border-gray-200 text-sm font-medium" data-gallery-filter="all">All Media</span>
                    <span class="filter-chip px-4 py-2 rounded-full border border-gray-200 text-sm font-medium" data-gallery-filter="image">Photos</span>
                    <span class="filter-chip px-4 py-2 rounded-full border border-gray-200 text-sm font-medium" data-gallery-filter="video">Videos</span>
                </div>
            </div>

            <!-- Virtual Tour Highlight -->
            @php
            $virtualTour = $virtualTour ?? [
                'title' => 'Virtual Campus Tour',
                'subtitle' => 'Experience INSAN from anywhere in the world',
                'embed_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ?rel=0',
                'duration' => '12:45',
                'views' => '15,234'
            ];
            @endphp

            <div class="bg-white rounded-2xl overflow-hidden shadow-sm mb-12 scroll-reveal">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-navy-900 flex items-center justify-center text-gold-500">
                            <i class="fas fa-vr-cardboard"></i>
                        </div>
                        <div>
                            <h3 class="font-serif text-xl text-navy-900 font-bold">{{ $virtualTour['title'] }}</h3>
                            <p class="text-gray-500 text-sm">{{ $virtualTour['subtitle'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="video-container rounded-2xl overflow-hidden bg-navy-900">
                        <iframe src="{{ $virtualTour['embed_url'] }}" 
                                title="{{ $virtualTour['title'] }}" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <div class="flex items-center gap-4 text-sm text-gray-500">
                            <span><i class="fas fa-play-circle text-gold-500"></i> {{ $virtualTour['duration'] }} duration</span>
                            <span><i class="fas fa-eye text-gold-500"></i> {{ $virtualTour['views'] }} views</span>
                        </div>
                        <button class="text-gold-600 font-semibold text-sm hover:text-gold-700">
                            <i class="fas fa-share-alt"></i> Share Tour
                        </button>
                    </div>
                </div>
            </div>

            <!-- Gallery Grid -->
            @php
            $galleryItems = $galleryItems ?? [
                ['type' => 'video', 'thumb' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800&q=80', 'duration' => '8:32', 'media_type' => 'Video', 'title' => 'Graduation 2025 Highlights', 'caption' => 'Moments of joy and achievement from our annual ceremony', 'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'],
                ['type' => 'image', 'src' => 'https://images.unsplash.com/photo-1562774053-701939374585?w=800&q=80', 'media_type' => 'Photo', 'title' => 'Main Campus Building', 'caption' => 'The iconic facade of our university headquarters'],
                ['type' => 'video', 'thumb' => 'https://images.unsplash.com/photo-1544531585-9847b68c8c86?w=800&q=80', 'duration' => '5:15', 'media_type' => 'Video', 'title' => 'A Day in the Life at INSAN', 'caption' => 'Follow our students through a typical day on campus', 'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'],
                ['type' => 'image', 'src' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=800&q=80', 'media_type' => 'Photo', 'title' => 'Library Reading Room', 'caption' => 'Quiet study spaces with over 100,000 volumes'],
                ['type' => 'image', 'src' => 'https://images.unsplash.com/photo-1571260899304-425eee4c7efc?w=800&q=80', 'media_type' => 'Photo', 'title' => 'Advanced Science Laboratory', 'caption' => 'Cutting-edge equipment for research and discovery'],
                ['type' => 'video', 'thumb' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=800&q=80', 'duration' => '12:08', 'media_type' => 'Video', 'title' => 'International Cultural Night 2025', 'caption' => 'Performances and exhibitions from around the world', 'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'],
                ['type' => 'image', 'src' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&q=80', 'media_type' => 'Photo', 'title' => 'Grand Conference Hall', 'caption' => 'Hosting international symposiums and academic events'],
                ['type' => 'image', 'src' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=800&q=80', 'media_type' => 'Photo', 'title' => 'Medical Simulation Center', 'caption' => 'Training future healthcare professionals with modern technology'],
                ['type' => 'video', 'thumb' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?w=800&q=80', 'duration' => '7:45', 'media_type' => 'Video', 'title' => 'Research Excellence at INSAN', 'caption' => 'Discover breakthrough research across our faculties', 'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'],
            ];
            @endphp

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="galleryGrid">
                @foreach($galleryItems as $item)
                    <div class="gallery-item rounded-2xl overflow-hidden bg-white shadow-sm scroll-reveal" data-type="{{ $item['type'] }}" style="transition-delay: {{ $loop->index % 3 * 0.1 }}s">
                        @if($item['type'] === 'video')
                            <div class="relative h-56 bg-navy-900">
                                <img src="{{ $item['thumb'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover opacity-80">
                                <div class="absolute inset-0 play-overlay flex items-center justify-center">
                                    <button onclick="openVideoModal('{{ $item['title'] }}', '{{ $item['video_url'] }}')" 
                                            class="w-16 h-16 rounded-full bg-white/20 backdrop-blur border-2 border-white flex items-center justify-center text-white hover:bg-gold-500 hover:border-gold-500 transition-all">
                                        <i class="fas fa-play text-xl ml-1"></i>
                                    </button>
                                </div>
                                <div class="absolute bottom-3 right-3 bg-navy-900/80 text-white px-2 py-1 rounded text-xs">
                                    <i class="fas fa-clock"></i> {{ $item['duration'] }}
                                </div>
                            </div>
                        @else
                            <div class="relative h-56 overflow-hidden cursor-pointer" onclick="openImageModal('{{ $item['src'] }}?w=1200&q=80', '{{ $item['title'] }}')">
                                <img src="{{ $item['src'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-navy-900/0 hover:bg-navy-900/20 transition-all"></div>
                            </div>
                        @endif
                        <div class="p-5">
                            <span class="text-xs font-semibold text-gold-600 uppercase tracking-wider">{{ $item['media_type'] }}</span>
                            <h4 class="font-serif text-lg text-navy-900 font-bold mt-1">{{ $item['title'] }}</h4>
                            <p class="text-gray-500 text-sm mt-1">{{ $item['caption'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

<!-- Event Detail Modal -->
<div id="eventModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-navy-900/80 backdrop-blur-sm" onclick="closeEventModal()"></div>
    <div class="absolute inset-4 md:inset-12 lg:inset-20 bg-white rounded-2xl overflow-hidden shadow-2xl flex flex-col modal-enter">
        <div class="relative h-48 md:h-64 bg-navy-900 flex-shrink-0">
            <img id="eventModalImage" src="" alt="" class="w-full h-full object-cover opacity-60">
            <div class="absolute inset-0 bg-gradient-to-t from-navy-900 to-transparent"></div>
            <button onclick="closeEventModal()" class="absolute top-4 right-4 w-10 h-10 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white hover:bg-white hover:text-navy-900 transition-all">
                <i class="fas fa-times"></i>
            </button>
            <div class="absolute bottom-6 left-6 md:left-10 text-white">
                <span id="eventModalCategory" class="bg-gold-500 text-navy-900 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-2 inline-block">Category</span>
                <h3 id="eventModalTitle" class="font-serif text-2xl md:text-3xl font-bold">Event Title</h3>
            </div>
        </div>
        <div class="flex-1 overflow-y-auto p-6 md:p-10">
            <div class="max-w-3xl mx-auto">
                <div class="grid grid-cols-3 gap-4 mb-8">
                    <div class="bg-cream rounded-xl p-4 text-center border border-gold-500/20">
                        <i class="fas fa-calendar text-gold-500 text-xl mb-2"></i>
                        <div class="text-xs text-gray-500">Date</div>
                        <div class="font-bold text-navy-900 text-sm" id="eventModalDate">-</div>
                    </div>
                    <div class="bg-cream rounded-xl p-4 text-center border border-gold-500/20">
                        <i class="fas fa-clock text-gold-500 text-xl mb-2"></i>
                        <div class="text-xs text-gray-500">Time</div>
                        <div class="font-bold text-navy-900 text-sm" id="eventModalTime">-</div>
                    </div>
                    <div class="bg-cream rounded-xl p-4 text-center border border-gold-500/20">
                        <i class="fas fa-map-marker-alt text-gold-500 text-xl mb-2"></i>
                        <div class="text-xs text-gray-500">Location</div>
                        <div class="font-bold text-navy-900 text-sm" id="eventModalLocation">-</div>
                    </div>
                </div>
                <div class="mb-8">
                    <h4 class="font-serif text-xl text-navy-900 font-bold mb-3">About This Event</h4>
                    <p class="text-gray-600 leading-relaxed" id="eventModalDesc">Description</p>
                </div>
                <div class="mb-8">
                    <h4 class="font-serif text-xl text-navy-900 font-bold mb-3">Event Schedule</h4>
                    <ul class="space-y-3" id="eventModalSchedule"></ul>
                </div>
                <div class="flex flex-wrap gap-4">
                    <a href="#" class="btn-primary px-6 py-3 rounded-lg text-white font-semibold flex items-center gap-2">
                        <i class="fas fa-ticket-alt"></i> Register Now
                    </a>
                    <button class="px-6 py-3 rounded-lg border-2 border-gray-300 text-gray-600 font-semibold hover:border-navy-900 hover:text-navy-900 transition-all flex items-center gap-2">
                        <i class="fas fa-calendar-plus"></i> Add to Calendar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Video Modal -->
<div id="videoModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-navy-900/90 backdrop-blur-sm" onclick="closeVideoModal()"></div>
    <div class="absolute inset-4 md:inset-12 lg:inset-16 bg-black rounded-2xl overflow-hidden shadow-2xl flex flex-col modal-enter">
        <div class="flex items-center justify-between p-4 bg-navy-900 text-white">
            <h3 id="videoModalTitle" class="font-serif text-lg font-bold">Video Title</h3>
            <button onclick="closeVideoModal()" class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center hover:bg-white hover:text-navy-900 transition-all">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="flex-1 bg-black flex items-center justify-center p-4">
            <div class="w-full max-w-5xl aspect-video">
                <iframe id="videoModalFrame" class="w-full h-full rounded-lg" src="" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-navy-900/95 backdrop-blur-sm" onclick="closeImageModal()"></div>
    <div class="absolute inset-4 md:inset-8 flex items-center justify-center modal-enter">
        <button onclick="closeImageModal()" class="absolute top-4 right-4 w-10 h-10 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white hover:bg-white hover:text-navy-900 transition-all z-10">
            <i class="fas fa-times"></i>
        </button>
        <div class="max-w-5xl max-h-full">
            <img id="imageModalSrc" src="" alt="" class="max-w-full max-h-[85vh] rounded-lg shadow-2xl">
            <p id="imageModalCaption" class="text-white text-center mt-4 font-serif text-lg"></p>
        </div>
    </div>
</div>

@endsection

@section('cta-section')
    @include('components.cta-section', [
        'title' => 'Stay Connected',
        'description' => 'Subscribe to our newsletter and follow us on social media for the latest updates, events, and stories from INSAN.',
        'primaryButton' => null,
        'secondaryButton' => null
    ])
    
    <!-- Custom CTA with newsletter -->
    <section class="py-20 bg-navy-900 relative overflow-hidden">
        <div class="absolute inset-0 islamic-pattern opacity-10"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-gold-500/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center scroll-reveal">
            <h2 class="font-serif text-3xl md:text-4xl text-white font-bold mb-4">Stay Connected</h2>
            <p class="text-gray-400 max-w-2xl mx-auto mb-8">
                Subscribe to our newsletter and follow us on social media for the latest updates, events, and stories from INSAN.
            </p>
            <form class="flex flex-wrap justify-center gap-4 max-w-lg mx-auto mb-8" action="{{ route('newsletter.subscribe') }}" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Enter your email address" required
                       class="flex-1 min-w-[250px] px-5 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:border-gold-500">
                <button type="submit" class="btn-primary px-6 py-3 rounded-lg text-white font-semibold">Subscribe</button>
            </form>
            <div class="flex justify-center gap-4">
                <a href="#" class="w-12 h-12 rounded-full bg-navy-800 flex items-center justify-center text-gray-400 hover:bg-gold-500 hover:text-white transition-all text-lg"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="w-12 h-12 rounded-full bg-navy-800 flex items-center justify-center text-gray-400 hover:bg-gold-500 hover:text-white transition-all text-lg"><i class="fab fa-x-twitter"></i></a>
                <a href="#" class="w-12 h-12 rounded-full bg-navy-800 flex items-center justify-center text-gray-400 hover:bg-gold-500 hover:text-white transition-all text-lg"><i class="fab fa-instagram"></i></a>
                <a href="#" class="w-12 h-12 rounded-full bg-navy-800 flex items-center justify-center text-gray-400 hover:bg-gold-500 hover:text-white transition-all text-lg"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </section>
@endsection

@section('page-styles')
<style>
    .event-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(201,169,110,0.15);
    }
    .event-card:hover {
        transform: translateY(-8px);
        border-color: rgba(201,169,110,0.4);
        box-shadow: 0 25px 50px -12px rgba(10,22,40,0.15);
    }
    .date-badge {
        background: linear-gradient(135deg, #0a1628, #152a4a);
    }
    .gallery-item {
        transition: all 0.4s ease;
        overflow: hidden;
    }
    .gallery-item:hover {
        transform: scale(1.02);
        box-shadow: 0 20px 40px rgba(10,22,40,0.2);
    }
    .gallery-item img { transition: transform 0.6s ease; }
    .gallery-item:hover img { transform: scale(1.1); }
    .play-overlay {
        background: rgba(10,22,40,0.6);
        transition: all 0.3s ease;
    }
    .gallery-item:hover .play-overlay { background: rgba(10,22,40,0.4); }
    .news-card:hover .news-img { transform: scale(1.05); }
    .news-img { transition: transform 0.6s ease; }
    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
    }
    .video-container iframe {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        border-radius: 1rem;
    }
</style>
@endsection

@section('page-scripts')
<script>
    // Event filtering
    document.querySelectorAll('[data-event-filter]').forEach(chip => {
        chip.addEventListener('click', () => {
            const filter = chip.dataset.eventFilter;
            document.querySelectorAll('[data-event-filter]').forEach(c => c.classList.remove('active'));
            chip.classList.add('active');
            document.querySelectorAll('#eventsGrid .event-card').forEach(card => {
                card.style.display = (filter === 'all' || card.dataset.category === filter) ? 'block' : 'none';
            });
        });
    });

    // Gallery filtering
    document.querySelectorAll('[data-gallery-filter]').forEach(chip => {
        chip.addEventListener('click', () => {
            const filter = chip.dataset.galleryFilter;
            document.querySelectorAll('[data-gallery-filter]').forEach(c => c.classList.remove('active'));
            chip.classList.add('active');
            document.querySelectorAll('#galleryGrid .gallery-item').forEach(item => {
                item.style.display = (filter === 'all' || item.dataset.type === filter) ? 'block' : 'none';
            });
        });
    });

    // Event data
    const eventData = @json($eventData ?? []);

    function openEventModal(eventId) {
        const data = eventData[eventId];
        if (!data) return;
        document.getElementById('eventModalTitle').textContent = data.title;
        document.getElementById('eventModalCategory').textContent = data.category;
        document.getElementById('eventModalImage').src = data.image;
        document.getElementById('eventModalDate').textContent = data.date;
        document.getElementById('eventModalTime').textContent = data.time;
        document.getElementById('eventModalLocation').textContent = data.location;
        document.getElementById('eventModalDesc').textContent = data.description;
        document.getElementById('eventModalSchedule').innerHTML = data.schedule.map(item => 
            `<li class="flex items-start gap-3 p-3 rounded-lg bg-gray-50">
                <i class="fas fa-check-circle text-gold-500 mt-0.5 flex-shrink-0"></i>
                <span class="text-gray-600 text-sm">${item}</span>
            </li>`
        ).join('');
        document.getElementById('eventModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeEventModal() {
        document.getElementById('eventModal').classList.add('hidden');
        document.body.style.overflow = '';
    }

    function openVideoModal(title, url) {
        document.getElementById('videoModalTitle').textContent = title;
        document.getElementById('videoModalFrame').src = url;
        document.getElementById('videoModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeVideoModal() {
        document.getElementById('videoModal').classList.add('hidden');
        document.getElementById('videoModalFrame').src = '';
        document.body.style.overflow = '';
    }

    function openImageModal(src, caption) {
        document.getElementById('imageModalSrc').src = src;
        document.getElementById('imageModalCaption').textContent = caption;
        document.getElementById('imageModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeImageModal() {
        document.getElementById('imageModal').classList.add('hidden');
        document.body.style.overflow = '';
    }
</script>
@endsection