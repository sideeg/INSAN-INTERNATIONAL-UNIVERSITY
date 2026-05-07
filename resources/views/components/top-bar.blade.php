<div class="bg-navy-900 text-white py-2">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center text-sm">
        <div class="flex items-center gap-6">
            <span class="flex items-center gap-2">
                <i class="fas fa-envelope text-gold-500"></i> {{ __('Email') }}: info@insan.edu
            </span>
            <span class="flex items-center gap-2">
                <i class="fas fa-phone text-gold-500"></i> {{ __('Call') }}: +256 (0) 414 675 299
            </span>
        </div>
        
        <div class="flex items-center gap-4">
            <a href="/admin" class="hover:text-gold-500 transition-colors">{{ __('Admin Portal') }}</a>
            <span class="text-gray-600">|</span>
            
            <!-- LANGUAGE SWITCHER (Crucial) -->
            @if(app()->getLocale() == 'en')
                <a href="{{ route('lang.switch', 'ar') }}" class="flex items-center gap-1 hover:text-gold-500">
                    <i class="fas fa-globe"></i> العربية
                </a>
            @else
                <a href="{{ route('lang.switch', 'en') }}" class="flex items-center gap-1 hover:text-gold-500">
                    <i class="fas fa-globe"></i> English
                </a>
            @endif
        </div>
    </div>
</div>