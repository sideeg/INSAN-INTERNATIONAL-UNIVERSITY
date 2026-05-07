<div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col">

    <div class="bg-gray-50 h-28 flex items-center justify-center p-4 border-b border-gray-100">
        <img src="{{ $partner->logo_url }}"
             alt="{{ $partner->name }}"
             class="max-h-16 max-w-full object-contain">
    </div>

    <div class="p-5 flex flex-col flex-1">

        <div class="flex items-start justify-between gap-2 mb-1">
            <p class="font-semibold text-gray-800 text-sm">{{ $partner->name }}</p>

            @if ($partner->acronym)
            <span class="text-xs font-mono bg-blue-50 text-[#003366] border border-blue-200 px-1.5 py-0.5 rounded">
                {{ $partner->acronym }}
            </span>
            @endif
        </div>

        @if ($partner->country)
        <p class="text-xs text-gray-400 mb-2">📍 {{ $partner->country }}</p>
        @endif

        @if ($partner->description)
        <p class="text-xs text-gray-500 flex-1 line-clamp-3 mb-3">
            {{ $partner->description }}
        </p>
        @endif

        <div class="mt-auto flex items-center justify-between">

            @if ($partner->hasMou())
            <span class="text-xs border rounded-full px-2 py-0.5
                {{ $partner->isMouActive() ? 'text-green-700 bg-green-50 border-green-200' : 'text-gray-500 bg-gray-50 border-gray-200' }}">
                
                {{ $partner->isMouActive() ? __('Active MoU') : __('MoU Expired') }}

                @if ($partner->mou_signed_date)
                    ({{ $partner->mou_signed_date->format('Y') }})
                @endif
            </span>
            @else
            <span></span>
            @endif

            @if ($partner->website_url)
            <a href="{{ $partner->website_url }}" target="_blank"
               class="text-xs text-[#003366] hover:underline font-medium">
                {{ __('Visit site →') }}
            </a>
            @endif

        </div>

    </div>

</div>