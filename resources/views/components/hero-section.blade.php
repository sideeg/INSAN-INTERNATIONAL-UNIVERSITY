@props([
    'backgroundImage' => '',
    'title' => '',
    'highlightedText' => '',
    'description' => '',
    'breadcrumbs' => [],
    'height' => '400px'
])

<section class="relative overflow-hidden" style="height: {{ $height }}">
    <div class="absolute inset-0">
        <img src="{{ $backgroundImage }}" alt="{{ $title }}" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 hero-overlay"></div>
    <div class="absolute inset-0 islamic-pattern opacity-30"></div>
    <div class="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-center">
        <div class="scroll-reveal">
            @if(count($breadcrumbs) > 0)
                <div class="flex items-center gap-3 mb-4">
                    @foreach($breadcrumbs as $index => $crumb)
                        @if($index > 0)
                            <i class="fas fa-chevron-right text-gold-500 text-xs"></i>
                        @endif
                        @if(isset($crumb['url']))
                            <a href="{{ $crumb['url'] }}" class="text-gold-500 hover:text-gold-400 text-sm">{{ $crumb['label'] }}</a>
                        @else
                            <span class="text-white text-sm">{{ $crumb['label'] }}</span>
                        @endif
                    @endforeach
                </div>
            @endif
            <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl text-white font-bold leading-tight mb-4">
                {!! $title !!}
                @if($highlightedText)
                    <br><span class="text-gold-500">{{ $highlightedText }}</span>
                @endif
            </h1>
            @if($description)
                <p class="text-gray-300 text-lg max-w-2xl leading-relaxed">{{ $description }}</p>
            @endif
        </div>
    </div>
</section>