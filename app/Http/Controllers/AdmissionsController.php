<?php

namespace App\Http\Controllers;

use App\Models\AcademicCalendarEvent;
use App\Models\Fee;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdmissionsController extends Controller
{
    /**
     * /admissions — main admissions landing page.
     */
    public function index()
    {
        $upcomingEvents = AcademicCalendarEvent::published()
            ->forYear(AcademicCalendarEvent::currentAcademicYear())
            ->inCategory('admission')
            ->upcoming()
            ->ordered()
            ->take(4)
            ->get();

        $featuredScholarship = Scholarship::active()->featured()->first();

        return view('admissions.index', compact('upcomingEvents', 'featuredScholarship'));
    }

    /**
     * /admissions/calendar — academic calendar timeline page.
     */
    public function calendar(Request $request)
    {
        $availableYears  = AcademicCalendarEvent::availableYears();
        $selectedYear    = $request->query('year', AcademicCalendarEvent::currentAcademicYear());
        $selectedCategory = $request->query('category', 'all');

        $query = AcademicCalendarEvent::published()->forYear($selectedYear)->ordered();

        if ($selectedCategory !== 'all') {
            $query->inCategory($selectedCategory);
        }

        $events      = $query->get();
        $byMonth     = $events->groupBy(fn ($e) => $e->start_date->format('F Y'));
        $categories  = AcademicCalendarEvent::CATEGORY_LABELS;

        return view('admissions.calendar', compact(
            'byMonth', 'availableYears', 'selectedYear', 'selectedCategory', 'categories'
        ));
    }

    /**
     * /admissions/fees — fees and funding page.
     */
    public function fees(Request $request)
    {
        $latestYear      = Fee::latestYear();
        $selectedLevel   = $request->query('level', 'Undergraduate');
        $availableLevels = Fee::availableLevels($latestYear);

        // Categories with fees for the selected level or 'All' levels
        $structuredFees = \App\Models\FeeCategory::active()
            ->with(['fees' => function ($q) use ($latestYear, $selectedLevel) {
                $q->active()
                  ->forYear($latestYear)
                  ->where(function ($inner) use ($selectedLevel) {
                      $inner->where('programme_level', $selectedLevel)
                            ->orWhere('programme_level', 'All');
                  })
                  ->orderBy('sort_order');
            }])
            ->get()
            ->filter(fn ($cat) => $cat->fees->isNotEmpty());


        return view('admissions.fees', compact(
            'structuredFees', 'latestYear', 'selectedLevel', 'availableLevels'
        ));
    }

    /**
     * /admissions/scholarships — scholarships listing page.
     */
    public function scholarships()
    {
        $scholarships = Scholarship::active()->get();
        return view('admissions.scholarships', compact('scholarships'));
    }

    /**
     * /admissions/scholarships/{slug} — individual scholarship detail page.
     */
    public function scholarshipShow(string $slug)
    {
        $scholarship = Scholarship::active()->where('slug', $slug)->firstOrFail();
        return view('admissions.scholarship-show', compact('scholarship'));
    }

    /**
     * /apply — application form / portal redirect page.
     */
    public function apply()
    {
        $academicYear = AcademicCalendarEvent::currentAcademicYear();

        $deadline = AcademicCalendarEvent::published()
            ->forYear($academicYear)
            ->inCategory('admission')
            ->where('name', 'like', '%deadline%')
            ->orderBy('start_date')
            ->first();

        return view('admissions.apply', compact('deadline'));
    }

    /**
     * GET /admissions/calendar/export — simple PDF or text export fallback.
     * In production, swap the plain-text body for a real PDF (e.g. using DomPDF).
     */
    public function calendarExport(Request $request)
    {
        $year   = $request->query('year', AcademicCalendarEvent::currentAcademicYear());
        $events = AcademicCalendarEvent::published()->forYear($year)->ordered()->get();

        $lines = ["ICUC Academic Calendar – {$year}", str_repeat('=', 50), ''];

        $byMonth = $events->groupBy(fn ($e) => $e->start_date->format('F Y'));

        foreach ($byMonth as $month => $monthEvents) {
            $lines[] = strtoupper($month);
            $lines[] = str_repeat('-', 30);
            foreach ($monthEvents as $event) {
                $lines[] = $event->formatted_date_range . '  |  ' . $event->name;
                if ($event->description) {
                    $lines[] = '    ' . $event->description;
                }
                $lines[] = '';
            }
        }

        $content = implode("\n", $lines);

        return response($content, 200, [
            'Content-Type'        => 'text/plain',
            'Content-Disposition' => "attachment; filename=\"academic-calendar-{$year}.txt\"",
        ]);
    }
}