{{-- resources/views/news/show.blade.php --}}
@extends('layouts.app')

@section('title', $article->title . ' | ' . __('INSAN International University'))

@php
    $getImage = fn($path) => $path
        ? (Str::startsWith($path, ['http://', 'https://'])
            ? $path
            : asset('storage/' . $path))
        : asset('images/placeholder.jpg');

    $thumbnailUrl = $getImage($article->thumbnail);
@endphp

@section('content')

{{-- ═══════════════════════════════════════════════════════
     HERO BANNER
═══════════════════════════════════════════════════════ --}}
<section class="relative overflow-hidden" style="height: 480px;">
    <div class="absolute inset-0">
        <img src="{{ $thumbnailUrl }}"
             alt="{{ $article->title }}"
             class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 hero-overlay"></div>
    <div class="absolute inset-0 islamic-pattern opacity-20"></div>

    {{-- Decorative gold bar --}}
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-gold-500 to-transparent"></div>

    <div class="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-end pb-12">
        <div class="scroll-reveal max-w-4xl">

            {{-- Breadcrumb --}}
            <div class="flex items-center gap-3 mb-5 text-sm">
                <a href="{{ route('home') }}" class="text-gold-400 hover:text-gold-300 transition-colors">
                    {{ __('Home') }}
                </a>
                <i class="fas fa-chevron-right text-gold-600 text-[10px]"></i>
                <a href="{{ route('events-news') }}" class="text-gold-400 hover:text-gold-300 transition-colors">
                    {{ __('News & Events') }}
                </a>
                <i class="fas fa-chevron-right text-gold-600 text-[10px]"></i>
                <span class="text-white/70 truncate max-w-xs">{{ $article->title }}</span>
            </div>

            {{-- Featured badge --}}
            @if($article->is_featured)
                <span class="inline-flex items-center gap-1.5 bg-gold-500 text-navy-900 text-xs font-bold uppercase tracking-widest px-3 py-1.5 rounded-full mb-4">
                    <i class="fas fa-star text-[10px]"></i> {{ __('Featured Story') }}
                </span>
            @endif

            {{-- Title --}}
            <h1 class="font-serif text-3xl md:text-4xl lg:text-5xl text-white font-bold leading-tight mb-5">
                {!! $article->title !!}
            </h1>

            {{-- Meta bar --}}
            <div class="flex flex-wrap items-center gap-5 text-sm text-gray-300">
                @if($article->author)
                    <span class="flex items-center gap-2">
                        <span class="w-7 h-7 rounded-full bg-gold-500/20 border border-gold-500/40 flex items-center justify-center">
                            <i class="fas fa-user-pen text-gold-400 text-[10px]"></i>
                        </span>
                        {{ $article->author }}
                    </span>
                @endif
                <span class="flex items-center gap-2">
                    <i class="fas fa-calendar-days text-gold-500"></i>
                    {{ $article->date }}
                </span>
                <span class="flex items-center gap-2">
                    <i class="fas fa-clock text-gold-500"></i>
                    {{ __('~') }}{{ (int) max(1, ceil(str_word_count(strip_tags($article->content)) / 200)) }} {{ __('min read') }}
                </span>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════
     MAIN LAYOUT — Article body + Sidebar
═══════════════════════════════════════════════════════ --}}
<div class="bg-cream min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="grid lg:grid-cols-3 gap-12">

            {{-- ─── Article Body ─────────────────────────────────── --}}
            <article class="lg:col-span-2 scroll-reveal">

                {{-- Excerpt / Lead paragraph --}}
                <div class="bg-white border-l-4 border-gold-500 rounded-r-2xl px-8 py-6 mb-10 shadow-sm">
                    <p class="text-navy-700 text-lg leading-relaxed font-medium italic">
                        {{ $article->excerpt }}
                    </p>
                </div>

                {{-- Rich content --}}
                <div class="bg-white rounded-2xl shadow-sm p-8 md:p-12 prose-article">
                    {!! $article->content !!}
                </div>

                {{-- Social share strip --}}
                <div class="mt-10 bg-white rounded-2xl shadow-sm px-8 py-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <p class="text-navy-900 font-serif font-bold text-base">{{ __('Share this story') }}</p>
                    <div class="flex items-center gap-3">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                           target="_blank" rel="noopener"
                           class="w-10 h-10 rounded-full bg-navy-900 text-white flex items-center justify-center hover:bg-gold-500 transition-all" aria-label="Share on Facebook">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title) }}"
                           target="_blank" rel="noopener"
                           class="w-10 h-10 rounded-full bg-navy-900 text-white flex items-center justify-center hover:bg-gold-500 transition-all" aria-label="Share on X/Twitter">
                            <i class="fab fa-x-twitter text-sm"></i>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}"
                           target="_blank" rel="noopener"
                           class="w-10 h-10 rounded-full bg-navy-900 text-white flex items-center justify-center hover:bg-gold-500 transition-all" aria-label="Share on LinkedIn">
                            <i class="fab fa-linkedin-in text-sm"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->url()) }}"
                           target="_blank" rel="noopener"
                           class="w-10 h-10 rounded-full bg-navy-900 text-white flex items-center justify-center hover:bg-gold-500 transition-all" aria-label="Share on WhatsApp">
                            <i class="fab fa-whatsapp text-sm"></i>
                        </a>
                        <button onclick="copyArticleUrl()"
                                class="w-10 h-10 rounded-full bg-navy-900 text-white flex items-center justify-center hover:bg-gold-500 transition-all" aria-label="Copy link" title="{{ __('Copy link') }}">
                            <i class="fas fa-link text-sm" id="copyIcon"></i>
                        </button>
                    </div>
                </div>

                {{-- Back button --}}
                <div class="mt-8">
                    <a href="{{ route('events-news') }}"
                       class="inline-flex items-center gap-2 text-navy-700 font-semibold hover:text-gold-600 transition-colors group">
                        <i class="fas fa-arrow-left text-sm group-hover:-translate-x-1 transition-transform rtl:rotate-180"></i>
                        {{ __('Back to News & Events') }}
                    </a>
                </div>

            </article>

            {{-- ─── Sidebar ──────────────────────────────────────── --}}
            <aside class="space-y-8">

                {{-- Article info card --}}
                <div class="bg-white rounded-2xl shadow-sm p-6 scroll-reveal">
                    <h3 class="font-serif text-navy-900 font-bold text-lg mb-5 pb-3 border-b border-gray-100">
                        {{ __('Article Info') }}
                    </h3>
                    <ul class="space-y-4 text-sm">
                        @if($article->author)
                        <li class="flex items-start gap-3">
                            <span class="w-8 h-8 rounded-full bg-gold-50 border border-gold-200 flex items-center justify-center shrink-0 mt-0.5">
                                <i class="fas fa-user-pen text-gold-600 text-xs"></i>
                            </span>
                            <div>
                                <p class="text-gray-400 text-xs uppercase tracking-wider mb-0.5">{{ __('Author') }}</p>
                                <p class="text-navy-900 font-semibold">{{ $article->author }}</p>
                            </div>
                        </li>
                        @endif
                        <li class="flex items-start gap-3">
                            <span class="w-8 h-8 rounded-full bg-gold-50 border border-gold-200 flex items-center justify-center shrink-0 mt-0.5">
                                <i class="fas fa-calendar-days text-gold-600 text-xs"></i>
                            </span>
                            <div>
                                <p class="text-gray-400 text-xs uppercase tracking-wider mb-0.5">{{ __('Published') }}</p>
                                <p class="text-navy-900 font-semibold">{{ $article->date }}</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-8 h-8 rounded-full bg-gold-50 border border-gold-200 flex items-center justify-center shrink-0 mt-0.5">
                                <i class="fas fa-clock text-gold-600 text-xs"></i>
                            </span>
                            <div>
                                <p class="text-gray-400 text-xs uppercase tracking-wider mb-0.5">{{ __('Reading time') }}</p>
                                <p class="text-navy-900 font-semibold">
                                    {{ (int) max(1, ceil(str_word_count(strip_tags($article->content)) / 200)) }} {{ __('min') }}
                                </p>
                            </div>
                        </li>
                        @if($article->is_featured)
                        <li class="flex items-start gap-3">
                            <span class="w-8 h-8 rounded-full bg-gold-50 border border-gold-200 flex items-center justify-center shrink-0 mt-0.5">
                                <i class="fas fa-star text-gold-600 text-xs"></i>
                            </span>
                            <div>
                                <p class="text-gray-400 text-xs uppercase tracking-wider mb-0.5">{{ __('Status') }}</p>
                                <p class="text-gold-600 font-semibold">{{ __('Featured Story') }}</p>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>

                {{-- Related / Recent news --}}
                @php
                    $recentArticles = \App\Models\NewsArticle::where('is_published', true)
                        ->where('id', '!=', $article->id)
                        ->orderByDesc('published_at')
                        ->limit(4)
                        ->get();
                @endphp

                @if($recentArticles->isNotEmpty())
                <div class="bg-white rounded-2xl shadow-sm p-6 scroll-reveal">
                    <h3 class="font-serif text-navy-900 font-bold text-lg mb-5 pb-3 border-b border-gray-100">
                        {{ __('More Stories') }}
                    </h3>
                    <div class="space-y-5">
                        @foreach($recentArticles as $recent)
                            @php
                                $recentThumb = $recent->thumbnail
                                    ? (Str::startsWith($recent->thumbnail, ['http://', 'https://'])
                                        ? $recent->thumbnail
                                        : asset('storage/' . $recent->thumbnail))
                                    : asset('images/placeholder.jpg');
                            @endphp
                            <a href="{{ route('news.show', $recent->slug) }}"
                               class="flex gap-4 group">
                                <div class="w-20 h-16 rounded-lg overflow-hidden shrink-0 bg-gray-100">
                                    <img src="{{ $recentThumb }}"
                                         alt="{{ $recent->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-[11px] text-gray-400 mb-1">
                                        <i class="fas fa-calendar text-gold-500 mr-1"></i>
                                        {{ $recent->date }}
                                    </p>
                                    <p class="text-navy-900 font-semibold text-sm leading-snug line-clamp-2 group-hover:text-gold-600 transition-colors">
                                        {{ $recent->title }}
                                    </p>
                                </div>
                            </a>
                            @if(!$loop->last)
                                <hr class="border-gray-100">
                            @endif
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- CTA card --}}
                <div class="bg-navy-900 rounded-2xl p-6 relative overflow-hidden scroll-reveal">
                    <div class="absolute inset-0 islamic-pattern opacity-10"></div>
                    <div class="relative">
                        <p class="text-gold-400 text-xs font-bold uppercase tracking-widest mb-2">{{ __('Admissions Open') }}</p>
                        <h4 class="font-serif text-white font-bold text-xl leading-snug mb-3">
                            {{ __('Ready to Join Our Community?') }}
                        </h4>
                        <p class="text-gray-400 text-sm mb-5 leading-relaxed">
                            {{ __('Apply now for the upcoming academic year and be part of our growing university family.') }}
                        </p>
                        <a href="{{ route('apply') }}"
                           class="btn-primary w-full inline-flex items-center justify-center gap-2 px-6 py-3 rounded-lg text-white font-semibold text-sm">
                            <i class="fas fa-paper-plane text-xs"></i>
                            {{ __('Apply Now') }}
                        </a>
                    </div>
                </div>

            </aside>
        </div>
    </div>
</div>

@endsection

@section('page-styles')
<style>
    /* ── Rich article typography ────────────────────────── */
    .prose-article {
        color: #374151;
        font-size: 1.0625rem;
        line-height: 1.85;
    }
    .prose-article h2,
    .prose-article h3,
    .prose-article h4 {
        font-family: 'Playfair Display', serif;
        color: #0a1628;
        font-weight: 700;
        margin-top: 2rem;
        margin-bottom: 0.75rem;
        line-height: 1.3;
    }
    .prose-article h2 { font-size: 1.6rem; }
    .prose-article h3 { font-size: 1.3rem; }
    .prose-article h4 { font-size: 1.1rem; }

    .prose-article p { margin-bottom: 1.35rem; }

    .prose-article a {
        color: #b8944f;
        text-decoration: underline;
        text-underline-offset: 3px;
        transition: color 0.2s;
    }
    .prose-article a:hover { color: #0a1628; }

    .prose-article strong { color: #0a1628; font-weight: 700; }
    .prose-article em { font-style: italic; }

    .prose-article ul,
    .prose-article ol {
        padding-left: 1.5rem;
        margin-bottom: 1.35rem;
    }
    .prose-article ul { list-style-type: disc; }
    .prose-article ol { list-style-type: decimal; }
    .prose-article li { margin-bottom: 0.4rem; }

    .prose-article blockquote {
        border-left: 4px solid #c9a96e;
        margin: 2rem 0;
        padding: 1rem 1.5rem;
        background: #faf8f5;
        border-radius: 0 0.75rem 0.75rem 0;
        font-style: italic;
        color: #1e3a5f;
    }

    .prose-article img {
        max-width: 100%;
        border-radius: 0.75rem;
        margin: 1.5rem auto;
        box-shadow: 0 4px 24px rgba(10,22,40,0.1);
    }

    .prose-article table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1.5rem;
        font-size: 0.9rem;
    }
    .prose-article th {
        background: #0a1628;
        color: #c9a96e;
        padding: 0.75rem 1rem;
        text-align: left;
        font-weight: 600;
    }
    .prose-article td {
        padding: 0.65rem 1rem;
        border-bottom: 1px solid #f0ede8;
    }
    .prose-article tr:hover td { background: #faf8f5; }

    .prose-article hr {
        border: none;
        border-top: 2px solid #f0ede8;
        margin: 2.5rem 0;
    }

    /* RTL adjustments */
    [dir="rtl"] .prose-article blockquote {
        border-left: none;
        border-right: 4px solid #c9a96e;
        border-radius: 0.75rem 0 0 0.75rem;
    }
    [dir="rtl"] .prose-article ul,
    [dir="rtl"] .prose-article ol {
        padding-left: 0;
        padding-right: 1.5rem;
    }

    /* Copy link toast */
    #copyToast {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }
</style>
@endsection

@section('page-scripts')
<script>
    // ── Copy URL to clipboard ──────────────────────────────
    function copyArticleUrl() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            const icon = document.getElementById('copyIcon');
            if (icon) {
                icon.classList.replace('fa-link', 'fa-check');
                setTimeout(() => icon.classList.replace('fa-check', 'fa-link'), 2000);
            }
        }).catch(() => {
            // Fallback for older browsers
            const ta = document.createElement('textarea');
            ta.value = window.location.href;
            document.body.appendChild(ta);
            ta.select();
            document.execCommand('copy');
            document.body.removeChild(ta);
        });
    }

    // ── Smooth scroll-reveal on sidebar cards ────────────
    const sidebarObserver = new IntersectionObserver((entries) => {
        entries.forEach((e, i) => {
            if (e.isIntersecting) {
                e.target.style.transitionDelay = `${i * 80}ms`;
                e.target.classList.add('active');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('aside .scroll-reveal').forEach(el => sidebarObserver.observe(el));
</script>
@endsection