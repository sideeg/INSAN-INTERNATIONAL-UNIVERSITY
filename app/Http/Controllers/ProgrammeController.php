<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    public function index(Request $request)
    {
        $query = Programme::query()->where('is_active', true);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        $programmes = $query->orderBy('sort_order')->get();

        return view('programmes', [
            'undergraduateProgrammes' => $programmes->where('category', 'undergraduate'),
            'graduateProgrammes' => $programmes->where('category', 'graduate'),
            'continuingProgrammes' => $programmes->where('category', 'continuing'),
            'programmeData' => $programmes->keyBy('slug')->map->toModalArray(),
        ]);
    }

    public function show(string $slug)
    {
        $programme = Programme::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('programmes.show', compact('programme'));
    }
}