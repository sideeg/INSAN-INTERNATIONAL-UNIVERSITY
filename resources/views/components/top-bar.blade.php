{{-- resources/views/components/top-bar.blade.php --}}
<!-- Top Bar -->
<div class="bg-navy-900 text-white py-2 text-sm border-b border-navy-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <div class="flex items-center gap-6">
            <a href="mailto:{{ config('university.email', 'info@inu.edu.sd') }}" class="flex items-center gap-2 hover:text-gold-500 transition-colors">
                <i class="fas fa-envelope text-gold-500 text-xs"></i>
                <span class="hidden sm:inline">{{ config('university.email', 'info@inu.edu.sd') }}</span>
            </a>
            <a href="tel:{{ config('university.phone_clean', '+256414675299') }}" class="flex items-center gap-2 hover:text-gold-500 transition-colors">
                <i class="fas fa-phone text-gold-500 text-xs"></i>
                <span>{{ config('university.phone', '+256 (0) 414 675 299') }}</span>
            </a>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('student.portal') }}" class="hidden sm:flex items-center gap-2 hover:text-gold-500 transition-colors">
                <i class="fas fa-user-graduate text-gold-500 text-xs"></i>
                <span>Student Portal</span>
            </a>
            <a href="{{ route('apply') }}" class="btn-primary px-4 py-1.5 rounded text-white text-xs font-semibold">Apply Now</a>
            <div class="flex items-center gap-2 text-xs">
                <a href="{{ url('?lang=ar') }}" class="text-gold-500 font-semibold cursor-pointer hover:underline">AR</a>
                <span class="text-gray-400">|</span>
                <span class="font-semibold">EN</span>
            </div>
        </div>
    </div>
</div>