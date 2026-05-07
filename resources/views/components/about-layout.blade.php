{{-- resources/views/components/about-layout.blade.php --}}

{{-- ── Section hero ───────────────────────────────────── --}}
<div class="bg-gradient-to-br from-[#003366] to-[#00509e] text-white py-16 px-6">
    <div class="max-w-6xl mx-auto">
<p class="text-sm uppercase tracking-widest text-blue-200 mb-2">
    {{ __('INSAN International University') }}
</p>        

<h1 class="text-4xl font-bold mb-4">
    {{ __('About Us') }}
</h1>
        <p class="text-blue-100 max-w-2xl">
    {{ __('Established to advance knowledge, foster innovation, and serve society — discover our leadership, governance, partnerships, and legacy of graduation.') }}
</p>
    </div>
</div>

{{-- ── Tab navigation ─────────────────────────────────── --}}
<nav class="bg-white border-b border-gray-200 sticky top-0 z-30 shadow-sm">
    <div class="max-w-6xl mx-auto px-6 overflow-x-auto">
        <ul class="flex gap-1 whitespace-nowrap text-sm font-medium">
           @php
$tabs = [
    ['route' => 'about', 'label' => __('Overview')],
    ['route' => 'about.vice-chancellor','label' => __('Vice Chancellor')],
    ['route' => 'about.governance','label' => __('Governance')],
    ['route' => 'about.leadership','label' => __('Leadership')],
    ['route' => 'about.collaborations','label' => __('Collaborations')],
    ['route' => 'about.graduation','label' => __('Graduation')],
];
@endphp

            @foreach ($tabs as $tab)
                @php $active = request()->routeIs($tab['route']); @endphp
                <li>
                    <a href="{{ route($tab['route']) }}"
                       class="inline-block py-4 px-4 border-b-2 transition-colors
                              {{ $active
                                 ? 'border-[#003366] text-[#003366]'
                                 : 'border-transparent text-gray-500 hover:text-[#003366] hover:border-blue-200' }}">
                        {{ $tab['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>

{{-- ── Page body ───────────────────────────────────────── --}}
<div class="max-w-6xl mx-auto px-6 py-12">
    {{ $slot }}
</div>