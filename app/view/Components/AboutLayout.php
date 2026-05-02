<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

/**
 * <x-about-layout>
 *
 * Renders the shared "About" section shell (hero banner + tab nav)
 * and slots the child view's content into the page body.
 *
 * Usage in any about sub-view:
 *
 *   <x-about-layout>
 *       ... page-specific content ...
 *   </x-about-layout>
 */
class AboutLayout extends Component
{
    public function render(): View
    {
        return view('components.about-layout');
    }
}