<?php

namespace App\Http\Controllers;

use App\Models\StudentLeader;
use App\Models\StudentClub;
use App\Models\StudentService;
use App\Models\InternationalService;
use App\Models\Country;

class CampusLifeController extends Controller
{
    public function index()
    {
        $councilMembers = StudentLeader::where('is_council', true)
            ->orderBy('sort_order')
            ->get();

        $clubs = StudentClub::where('is_active', true)
            ->orderBy('member_count', 'desc')
            ->get();

        $services = StudentService::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $intlServices = InternationalService::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $countries = Country::where('is_represented', true)
            ->orderBy('student_count', 'desc')
            ->get();

        return view('campus-life', compact(
            'councilMembers', 'clubs', 'services', 
            'intlServices', 'countries'
        ));
    }
}