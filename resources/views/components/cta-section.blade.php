@props([
    'title' => '',
    'description' => '',
    'primaryButton' => null,
    'secondaryButton' => null
])

<section class="py-20 bg-navy-900 relative overflow-hidden">
    <div class="absolute inset-0 islamic-pattern opacity-10"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-gold-500/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center scroll-reveal">
        <h2 class="font-serif text-3xl md:text-4xl text-white font-bold mb-4">{{ $title }}</h2>
        <p class="text-gray-400 max-w-2xl mx-auto mb-8">{{ $description }}</p>
        <div class="flex flex-wrap justify-center gap-4">
            @if($primaryButton)
                <a href="{{ $primaryButton['url'] ?? '#' }}" class="btn-primary px-8 py-3 rounded text-white font-semibold flex items-center gap-2">
                    <i class="fas {{ $primaryButton['icon'] ?? 'fa-arrow-right' }}"></i> {{ $primaryButton['text'] }}
                </a>
            @endif
            @if($secondaryButton)
                <a href="{{ $secondaryButton['url'] ?? '#' }}" class="border-2 border-gold-500 text-gold-500 px-8 py-3 rounded font-semibold hover:bg-gold-500 hover:text-navy-900 transition-all flex items-center gap-2">
                    <i class="fas {{ $secondaryButton['icon'] ?? 'fa-download' }}"></i> {{ $secondaryButton['text'] }}
                </a>
            @endif
        </div>
    </div>
</section>