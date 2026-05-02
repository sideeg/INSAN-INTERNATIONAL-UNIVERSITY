<?php

namespace App\Http\Controllers;

use App\Models\GraduationEvent;
use App\Models\Partner;
use App\Models\StaffProfile;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller
{
    // ──────────────────────────────────────────────────────────────
    // /about  — landing page (mission, vision, brief history)
    // ──────────────────────────────────────────────────────────────

    public function index(): View
    {
        // Show a trimmed leadership snapshot on the landing page
        $vcProfile = StaffProfile::active()
            ->byRole('vc')
            ->ordered()
            ->first();

        $leadershipSnapshot = StaffProfile::active()
            ->byRole('leadership')
            ->ordered()
            ->take(4)
            ->get();

        $featuredPartners = Partner::active()
            ->forHomepage()
            ->ordered()
            ->get();

        $latestConvocation = GraduationEvent::published()
            ->convocations()
            ->ordered()
            ->first();

        return view('about.index', compact(
            'vcProfile',
            'leadershipSnapshot',
            'featuredPartners',
            'latestConvocation',
        ));
    }

    // ──────────────────────────────────────────────────────────────
    // /about/governance  — Board / Council / Senate
    // ──────────────────────────────────────────────────────────────

    public function governance(): View
    {
        $members = StaffProfile::active()
            ->byRole('governance')
            ->ordered()
            ->get();

        return view('about.governance', compact('members'));
    }

    // ──────────────────────────────────────────────────────────────
    // /about/leadership  — Management team
    // ──────────────────────────────────────────────────────────────

    public function leadership(): View
    {
        $members = StaffProfile::active()
            ->byRole('leadership')
            ->ordered()
            ->get();

        return view('about.leadership', compact('members'));
    }

    // ──────────────────────────────────────────────────────────────
    // /about/vice-chancellor  — Dedicated VC profile page
    // ──────────────────────────────────────────────────────────────

    public function viceChancellor(): View
    {
        // Abort with 404 if the university hasn't set up a VC profile yet.
        $vc = StaffProfile::active()
            ->byRole('vc')
            ->ordered()
            ->firstOrFail();

        return view('about.vice-chancellor', compact('vc'));
    }

    // ──────────────────────────────────────────────────────────────
    // /about/collaborations  — Partners & MoUs
    // ──────────────────────────────────────────────────────────────

    public function collaborations(Request $request): View
    {
        $type = $request->query('type'); // optional filter: ?type=academic

        $partnersQuery = Partner::active()->ordered();

        if ($type && in_array($type, ['academic', 'industry', 'government', 'international', 'mou'])) {
            $partnersQuery->byType($type);
        }

        $partners = $partnersQuery->get();

        // Group by type so the view can render separate sections without extra queries
        $grouped = $partners->groupBy('partnership_type');

        // Pass available types with counts for the filter tabs
        $typeCounts = Partner::active()
            ->selectRaw('partnership_type, count(*) as total')
            ->groupBy('partnership_type')
            ->pluck('total', 'partnership_type');

        return view('about.collaborations', compact('partners', 'grouped', 'typeCounts', 'type'));
    }

    // ──────────────────────────────────────────────────────────────
    // /about/graduation  — Convocation archive listing
    // ──────────────────────────────────────────────────────────────

    public function graduation(): View
    {
        $convocations = GraduationEvent::published()
            ->convocations()
            ->ordered()
            ->get();

        // Separate any upcoming convocation announcement from past archives
        $upcoming = $convocations->filter->isUpcoming()->first();
        $archives = $convocations->reject->isUpcoming();

        return view('about.graduation', compact('convocations', 'upcoming', 'archives'));
    }

    // ──────────────────────────────────────────────────────────────
    // /about/graduation/{slug}  — Individual convocation detail
    // ──────────────────────────────────────────────────────────────

    public function graduationShow(string $slug): View
    {
        $event = GraduationEvent::published()
            ->where('slug', $slug)
            ->firstOrFail();

        // Sidebar: other convocations for navigation
        $others = GraduationEvent::published()
            ->convocations()
            ->ordered()
            ->where('id', '!=', $event->id)
            ->take(5)
            ->get();

        return view('about.graduation-show', compact('event', 'others'));
    }
}