@extends('layouts.app')

@section('title', __('Events, News & Gallery') . ' | ' . __('INSAN International University'))

@php
    $getImage = fn($path) => $path ? (Str::startsWith($path, ['http://', 'https://']) ? $path : asset('storage/' . $path)) : asset('images/placeholder.jpg');
@endphp

@section('content')

@include('components.hero-section', [
    'backgroundImage' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1920&q=80',
    'title' => __('Events, News'),
    'highlightedText' => __('& Multimedia Gallery'),
    'description' => __('Stay connected with campus life. Explore upcoming events, latest news, and our visual journey through photos and videos.'),
    'breadcrumbs' => [
        ['label' => __('Home'), 'url' => route('home')],
        ['label' => __('News, Events & Gallery')]
    ],
    'height' => '400px'
])

<section class="bg-white border-b border-gray-200 py-6 sticky top-20 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            <button class="tab-btn active px-6 py-3 rounded-xl font-serif font-bold text-base flex items-center gap-2" data-tab="events">
                <i class="fas fa-calendar-alt"></i> {{ __('Upcoming Events') }}
            </button>
            <button class="tab-btn px-6 py-3 rounded-xl font-serif font-bold text-base flex items-center gap-2 bg-white text-navy-900 border border-gray-200" data-tab="news">
                <i class="fas fa-newspaper"></i> {{ __('Latest News') }}
            </button>
            <button class="tab-btn px-6 py-3 rounded-xl font-serif font-bold text-base flex items-center gap-2 bg-white text-navy-900 border border-gray-200" data-tab="gallery">
                <i class="fas fa-images"></i> {{ __('Multimedia Gallery') }}
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
                    <h2 class="font-serif text-3xl text-navy-900 font-bold mb-2">{{ __('Upcoming Events') }}</h2>
                    <p class="text-gray-600">{{ __('Join us for academic conferences, cultural celebrations, and community gatherings.') }}</p>
                </div>
                <div class="flex flex-wrap gap-2 scroll-reveal">
                    <span class="filter-chip active px-4 py-2 rounded-full border border-gray-200 text-sm font-medium" data-event-filter="all">{{ __('All Events') }}</span>
                    <span class="filter-chip px-4 py-2 rounded-full border border-gray-200 text-sm font-medium" data-event-filter="academic">{{ __('Academic') }}</span>
                    <span class="filter-chip px-4 py-2 rounded-full border border-gray-200 text-sm font-medium" data-event-filter="cultural">{{ __('Cultural') }}</span>
                    <span class="filter-chip px-4 py-2 rounded-full border border-gray-200 text-sm font-medium" data-event-filter="sports">{{ __('Sports') }}</span>
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="eventsGrid">
                @forelse($events as $event)
                    <div class="event-card bg-white rounded-2xl overflow-hidden scroll-reveal" data-category="{{ strtolower($event->category) }}">
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ $getImage($event->thumbnail) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                            <!-- logical positioning: start-4 instead of left-4 -->
                            <div class="absolute top-4 start-4 date-badge text-white px-4 py-2 rounded-lg text-center shadow-lg">
                                <div class="text-xs uppercase tracking-wider text-gold-400">{{ $event->month }}</div>
                                <div class="text-2xl font-bold font-serif">{{ $event->day }}</div>
                            </div>
                            <!-- logical positioning: end-4 instead of right-4 -->
                            <span class="absolute top-4 end-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-semibold text-navy-900 capitalize">{{ __($event->category) }}</span>
                        </div>
                        <div class="p-6">
                            <h3 class="font-serif text-xl text-navy-900 font-bold mb-2">{{ $event->title }}</h3>
                            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 mb-3">
                                <span class="flex items-center gap-1"><i class="fas fa-clock text-gold-500"></i> {{ $event->time }}</span>
                                <span class="flex items-center gap-1"><i class="fas fa-map-marker-alt text-gold-500"></i> {{ $event->location }}</span>
                            </div>
                            <p class="text-gray-500 text-sm mb-4 leading-relaxed line-clamp-3">{{ $event->description }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-xs text-gray-400">{{ __('Ends:') }} {{ $event->end_date?->translatedFormat('d F Y') }}</span>
                                <button onclick="openEventModal('{{ $event->slug }}')" class="text-gold-600 font-semibold text-sm hover:text-gold-700 flex items-center gap-1">
                                    {{ __('Details') }} <i class="fas fa-arrow-right text-xs rtl:rotate-180"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 text-gray-500">
                        <i class="fas fa-calendar-times text-4xl mb-3 text-gray-300"></i>
                        <p>{{ __('No upcoming events at the moment. Please check back later.') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</div>

<!-- News Tab -->
<div class="tab-content" id="news">
    <section class="py-16 bg-cream">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12 scroll-reveal">
                <h2 class="font-serif text-3xl text-navy-900 font-bold mb-2">{{ __('Latest News') }}</h2>
                <p class="text-gray-600">{{ __('Stories of achievement, innovation, and community from across our campus.') }}</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8 mb-12">
                @if($featuredNews)
                <div class="news-card bg-white rounded-2xl overflow-hidden shadow-sm scroll-reveal">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ $getImage($featuredNews->thumbnail) }}" alt="{{ $featuredNews->title }}" class="news-img w-full h-full object-cover">
                        <div class="absolute bottom-4 start-4 bg-gold-500 text-white px-3 py-1 rounded-full text-xs font-semibold">{{ __('Featured') }}</div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-3 text-sm text-gray-400 mb-3">
                            <span><i class="fas fa-calendar text-gold-500"></i> {{ $featuredNews->date }}</span>
                            <span>|</span>
                            <span><i class="fas fa-user text-gold-500"></i> {{ $featuredNews->author }}</span>
                        </div>
                        <h3 class="font-serif text-2xl text-navy-900 font-bold mb-3">{{ $featuredNews->title }}</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed line-clamp-3">{{ $featuredNews->excerpt }}</p>
                        <a href="{{ route('news.show', $featuredNews->slug) }}" class="inline-flex items-center gap-2 text-gold-600 font-semibold hover:text-gold-700">
                            {{ __('Read Full Story') }} <i class="fas fa-arrow-right text-sm rtl:rotate-180"></i>
                        </a>
                    </div>
                </div>
                @endif

                <div class="space-y-6">
                    @foreach($sideNews as $news)
                        <div class="news-card bg-white rounded-xl p-6 flex gap-4 scroll-reveal">
                            <div class="w-32 h-24 rounded-lg overflow-hidden shrink-0">
                                <img src="{{ $getImage($news->thumbnail) }}" alt="{{ $news->title }}" class="news-img w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <div class="text-xs text-gray-400 mb-1"><i class="fas fa-calendar text-gold-500"></i> {{ $news->date }}</div>
                                <a href="{{ route('news.show', $news->slug) }}">
                                    <h4 class="font-serif text-lg text-navy-900 font-bold mb-1 hover:text-gold-600 transition-colors line-clamp-2">{{ $news->title }}</h4>
                                </a>
                                <p class="text-gray-500 text-sm line-clamp-2">{{ $news->excerpt }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
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

            <!-- Gallery Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="galleryGrid">
                @forelse($galleryItems as $item)
                    <div class="gallery-item rounded-2xl overflow-hidden bg-white shadow-sm scroll-reveal" data-type="{{ $item->media_type }}">
                        @if($item->media_type === 'video')
                            <div class="relative h-56 bg-navy-900">
                                <img src="{{ $getImage($item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover opacity-80">
                                <div class="absolute inset-0 play-overlay flex items-center justify-center">
                                    <button onclick="openVideoModal('{{ addslashes($item->title) }}', '{{ $item->video_url }}')" 
                                            class="w-16 h-16 rounded-full bg-white/20 backdrop-blur border-2 border-white flex items-center justify-center text-white hover:bg-gold-500 hover:border-gold-500 transition-all">
                                        <i class="fas fa-play text-xl ml-1"></i>
                                    </button>
                                </div>
                                @if($item->duration)
                                <div class="absolute bottom-3 right-3 bg-navy-900/80 text-white px-2 py-1 rounded text-xs">
                                    <i class="fas fa-clock"></i> {{ $item->duration }}
                                </div>
                                @endif
                            </div>
                        @else
                            <div class="relative h-56 overflow-hidden cursor-pointer" onclick="openImageModal('{{ $getImage($item->thumbnail) }}', '{{ addslashes($item->title) }}')">
                                <img src="{{ $getImage($item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-navy-900/0 hover:bg-navy-900/20 transition-all"></div>
                            </div>
                        @endif
                        <div class="p-5">
                            <span class="text-xs font-semibold text-gold-600 uppercase tracking-wider">{{ $item->media_type_label }}</span>
                            <h4 class="font-serif text-lg text-navy-900 font-bold mt-1 line-clamp-1">{{ $item->title }}</h4>
                            <p class="text-gray-500 text-sm mt-1 line-clamp-2">{{ $item->caption }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 text-gray-500">
                        <i class="fas fa-image text-4xl mb-3 text-gray-300"></i>
                        <p>No gallery items have been published yet.</p>
                    </div>
                @endforelse
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
            </div>
        </div>
    </div>
</div>

<!-- Video Modal -->
<div id="videoModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-navy-900/90 backdrop-blur-sm" onclick="closeVideoModal()"></div>
    <div class="absolute inset-4 md:inset-12 lg:inset-16 bg-black rounded-2xl overflow-hidden shadow-2xl flex flex-col modal-enter">
        <div class="flex items-center justify-between p-4 bg-navy-900 text-white z-10 relative">
            <h3 id="videoModalTitle" class="font-serif text-lg font-bold">Video Title</h3>
            <button onclick="closeVideoModal()" class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center hover:bg-white hover:text-navy-900 transition-all">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="flex-1 bg-black flex items-center justify-center p-0 md:p-4">
            <div class="w-full h-full md:max-w-5xl md:aspect-video relative">
                <iframe id="videoModalFrame" class="absolute top-0 left-0 w-full h-full md:rounded-lg" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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
</style>
@endsection

@section('page-scripts')
<script>
    const eventData = @json($eventData ?? []);

    // Helper function to safely get DOM elements without repeating code
    const el = (id) => document.getElementById(id);

    // ========== EVENT MODAL ==========
    function openEventModal(eventId) {
        const data = eventData[eventId];
        if (!data) return;

        if (el('eventModalTitle')) el('eventModalTitle').textContent = data.title;
        if (el('eventModalCategory')) el('eventModalCategory').textContent = data.category;
        if (el('eventModalImage')) el('eventModalImage').src = data.image || '';
        if (el('eventModalDate')) el('eventModalDate').textContent = data.date;
        if (el('eventModalTime')) el('eventModalTime').textContent = data.time;
        if (el('eventModalLocation')) el('eventModalLocation').textContent = data.location;
        if (el('eventModalDesc')) el('eventModalDesc').textContent = data.description;

        const schedule = data.schedule || [];
        const scheduleContainer = el('eventModalSchedule');
        
        if (scheduleContainer) {
            scheduleContainer.innerHTML = schedule.length > 0 
                ? schedule.map(item => 
                    `<li class="flex items-start gap-3 p-3 rounded-lg bg-gray-50">
                        <i class="fas fa-check-circle text-gold-500 mt-0.5 shrink-0"></i>
                        <span class="text-gray-600 text-sm">${item}</span>
                    </li>`
                  ).join('') 
                : '<p class="text-gray-500 text-sm italic">{{ __("No specific schedule announced.") }}</p>';
        }

        const modal = el('eventModal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeEventModal() {
        const modal = el('eventModal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }

    // ========== VIDEO MODAL ==========
    function openVideoModal(title, videoUrl) {
        if (el('videoModalTitle')) el('videoModalTitle').textContent = title;
        if (el('videoModalFrame')) el('videoModalFrame').src = videoUrl;
        
        const modal = el('videoModal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeVideoModal() {
        const frame = el('videoModalFrame');
        if (frame) frame.src = ''; // Stop video playback safely
        
        const modal = el('videoModal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }

    // ========== IMAGE MODAL ==========
    function openImageModal(src, caption) {
        if (el('imageModalSrc')) el('imageModalSrc').src = src;
        if (el('imageModalCaption')) el('imageModalCaption').textContent = caption;
        
        const modal = el('imageModal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeImageModal() {
        const modal = el('imageModal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }

    // ========== CLOSE ON ESCAPE KEY ==========
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            // These will now run safely without crashing if a modal is missing
            closeEventModal();
            closeVideoModal();
            closeImageModal();
        }
    });
</script>
@endsection