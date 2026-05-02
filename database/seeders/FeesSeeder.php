<?php

namespace Database\Seeders;

use App\Models\Fee;
use App\Models\FeeCategory;
use Illuminate\Database\Seeder;

class FeesSeeder extends Seeder
{
    public function run(): void
    {
        $year = '2024/2025';

        // ── Categories ────────────────────────────────────────────────────────
        $categories = [
            ['name' => 'Tuition Fees',          'slug' => 'tuition',       'description' => 'Programme tuition charged per academic year.', 'sort_order' => 1],
            ['name' => 'Registration & Admin',  'slug' => 'registration',  'description' => 'One-time and annual administrative fees.', 'sort_order' => 2],
            ['name' => 'Accommodation',         'slug' => 'accommodation', 'description' => 'On-campus hostel fees per semester.', 'sort_order' => 3],
            ['name' => 'Catering & Meals',      'slug' => 'catering',      'description' => 'Optional meal plan per semester.', 'sort_order' => 4],
            ['name' => 'Library & ICT',         'slug' => 'library-ict',   'description' => 'Library access and ICT services levy.', 'sort_order' => 5],
            ['name' => 'Medical & Welfare',     'slug' => 'medical',       'description' => 'Student welfare and campus medical clinic.', 'sort_order' => 6],
        ];

        foreach ($categories as $cat) {
            FeeCategory::firstOrCreate(['slug' => $cat['slug']], array_merge($cat, ['is_active' => true]));
        }

        $tuition    = FeeCategory::where('slug', 'tuition')->first();
        $admin      = FeeCategory::where('slug', 'registration')->first();
        $accomm     = FeeCategory::where('slug', 'accommodation')->first();
        $catering   = FeeCategory::where('slug', 'catering')->first();
        $library    = FeeCategory::where('slug', 'library-ict')->first();
        $medical    = FeeCategory::where('slug', 'medical')->first();

        // ── Fees ─────────────────────────────────────────────────────────────
        $fees = [
            // Undergraduate tuition
            ['fee_category_id' => $tuition->id, 'programme_level' => 'Undergraduate', 'programme_name' => 'B.Sc. Computer Science',         'name' => 'Tuition',       'amount' => 1_800_000, 'frequency' => 'per_semester', 'sort_order' => 1],
            ['fee_category_id' => $tuition->id, 'programme_level' => 'Undergraduate', 'programme_name' => 'B.Sc. Information Technology',    'name' => 'Tuition',       'amount' => 1_800_000, 'frequency' => 'per_semester', 'sort_order' => 2],
            ['fee_category_id' => $tuition->id, 'programme_level' => 'Undergraduate', 'programme_name' => 'B.A. Islamic Studies',            'name' => 'Tuition',       'amount' => 1_200_000, 'frequency' => 'per_semester', 'sort_order' => 3],
            ['fee_category_id' => $tuition->id, 'programme_level' => 'Undergraduate', 'programme_name' => 'B.A. Arabic Language & Literature','name' => 'Tuition',      'amount' => 1_200_000, 'frequency' => 'per_semester', 'sort_order' => 4],
            ['fee_category_id' => $tuition->id, 'programme_level' => 'Undergraduate', 'programme_name' => 'B.Com. Business Administration',  'name' => 'Tuition',       'amount' => 1_500_000, 'frequency' => 'per_semester', 'sort_order' => 5],
            ['fee_category_id' => $tuition->id, 'programme_level' => 'Undergraduate', 'programme_name' => 'B.Ed. Education (Arts)',          'name' => 'Tuition',       'amount' => 1_300_000, 'frequency' => 'per_semester', 'sort_order' => 6],
            ['fee_category_id' => $tuition->id, 'programme_level' => 'Undergraduate', 'programme_name' => 'B.Ed. Education (Sciences)',      'name' => 'Tuition',       'amount' => 1_400_000, 'frequency' => 'per_semester', 'sort_order' => 7],

            // Postgraduate tuition
            ['fee_category_id' => $tuition->id, 'programme_level' => 'Postgraduate',  'programme_name' => 'M.Sc. Computer Science',          'name' => 'Tuition',       'amount' => 2_500_000, 'frequency' => 'per_semester', 'sort_order' => 10],
            ['fee_category_id' => $tuition->id, 'programme_level' => 'Postgraduate',  'programme_name' => 'M.A. Islamic Studies',            'name' => 'Tuition',       'amount' => 2_000_000, 'frequency' => 'per_semester', 'sort_order' => 11],
            ['fee_category_id' => $tuition->id, 'programme_level' => 'Postgraduate',  'programme_name' => 'MBA (Islamic Finance)',           'name' => 'Tuition',       'amount' => 2_800_000, 'frequency' => 'per_semester', 'sort_order' => 12],

            // Diploma tuition
            ['fee_category_id' => $tuition->id, 'programme_level' => 'Diploma',       'programme_name' => 'Diploma in Islamic Studies',      'name' => 'Tuition',       'amount' => 900_000,   'frequency' => 'per_semester', 'sort_order' => 20],
            ['fee_category_id' => $tuition->id, 'programme_level' => 'Diploma',       'programme_name' => 'Diploma in Business Studies',     'name' => 'Tuition',       'amount' => 950_000,   'frequency' => 'per_semester', 'sort_order' => 21],

            // Registration & Admin (same for all levels)
            ['fee_category_id' => $admin->id,   'programme_level' => 'All',           'programme_name' => null,                              'name' => 'Application Fee',         'amount' => 50_000,  'frequency' => 'once',         'sort_order' => 1, 'notes' => 'Non-refundable. Payable once on first application.'],
            ['fee_category_id' => $admin->id,   'programme_level' => 'All',           'programme_name' => null,                              'name' => 'Registration Fee',        'amount' => 150_000, 'frequency' => 'per_year',     'sort_order' => 2, 'notes' => 'Payable at the start of each academic year.'],
            ['fee_category_id' => $admin->id,   'programme_level' => 'All',           'programme_name' => null,                              'name' => 'Student Activity Levy',   'amount' => 75_000,  'frequency' => 'per_year',     'sort_order' => 3],
            ['fee_category_id' => $admin->id,   'programme_level' => 'All',           'programme_name' => null,                              'name' => 'Examination Fee',         'amount' => 120_000, 'frequency' => 'per_semester', 'sort_order' => 4],
            ['fee_category_id' => $admin->id,   'programme_level' => 'All',           'programme_name' => null,                              'name' => 'ID Card & Portal Access', 'amount' => 30_000,  'frequency' => 'once',         'sort_order' => 5, 'notes' => 'One-time fee payable on enrolment.'],

            // Accommodation
            ['fee_category_id' => $accomm->id,  'programme_level' => 'All',           'programme_name' => null,                              'name' => 'Standard Room (Shared)',  'amount' => 400_000, 'frequency' => 'per_semester', 'sort_order' => 1, 'notes' => '4-bed shared room including utilities.'],
            ['fee_category_id' => $accomm->id,  'programme_level' => 'All',           'programme_name' => null,                              'name' => 'Standard Room (Twin)',    'amount' => 600_000, 'frequency' => 'per_semester', 'sort_order' => 2, 'notes' => '2-bed room. Limited availability.'],
            ['fee_category_id' => $accomm->id,  'programme_level' => 'All',           'programme_name' => null,                              'name' => 'Single Room',             'amount' => 900_000, 'frequency' => 'per_semester', 'sort_order' => 3, 'notes' => 'Single occupancy. Subject to availability.'],

            // Catering
            ['fee_category_id' => $catering->id,'programme_level' => 'All',           'programme_name' => null,                              'name' => 'Full Meal Plan',          'amount' => 350_000, 'frequency' => 'per_semester', 'sort_order' => 1, 'notes' => 'Three meals per day, Monday–Friday.'],
            ['fee_category_id' => $catering->id,'programme_level' => 'All',           'programme_name' => null,                              'name' => 'Lunch-Only Plan',         'amount' => 180_000, 'frequency' => 'per_semester', 'sort_order' => 2, 'notes' => 'Lunch only, Monday–Friday.'],

            // Library & ICT
            ['fee_category_id' => $library->id, 'programme_level' => 'All',           'programme_name' => null,                              'name' => 'Library Services Levy',   'amount' => 60_000,  'frequency' => 'per_year',     'sort_order' => 1, 'notes' => 'Covers physical and digital library access.'],
            ['fee_category_id' => $library->id, 'programme_level' => 'All',           'programme_name' => null,                              'name' => 'ICT & Internet Access',   'amount' => 80_000,  'frequency' => 'per_year',     'sort_order' => 2, 'notes' => 'Campus-wide Wi-Fi and computer lab access.'],

            // Medical
            ['fee_category_id' => $medical->id, 'programme_level' => 'All',           'programme_name' => null,                              'name' => 'Student Medical Cover',   'amount' => 100_000, 'frequency' => 'per_year',     'sort_order' => 1, 'notes' => 'Basic outpatient cover at campus clinic.'],
        ];

        foreach ($fees as $fee) {
            $notes = $fee['notes'] ?? null;
            unset($fee['notes']);
            Fee::firstOrCreate(
                [
                    'fee_category_id'  => $fee['fee_category_id'],
                    'programme_level'  => $fee['programme_level'],
                    'programme_name'   => $fee['programme_name'],
                    'name'             => $fee['name'],
                    'academic_year'    => $year,
                ],
                array_merge($fee, [
                    'currency'    => 'UGX',
                    'academic_year' => $year,
                    'is_active'   => true,
                    'notes'       => $notes,
                ])
            );
        }
    }
}