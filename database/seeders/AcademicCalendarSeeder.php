<?php

namespace Database\Seeders;

use App\Models\AcademicCalendarEvent;
use Illuminate\Database\Seeder;

class AcademicCalendarSeeder extends Seeder
{
    public function run(): void
    {
        $year = '2024/2025';

        $events = [
            // ── Admissions ───────────────────────────────────────────────────
            [
                'name'          => 'Online Application Portal Opens',
                'description'   => 'The online application portal opens for all undergraduate and postgraduate programmes for the 2024/2025 academic year.',
                'start_date'    => '2024-09-01',
                'end_date'      => null,
                'category'      => 'admission',
                'academic_year' => $year,
                'sort_order'    => 1,
            ],
            [
                'name'          => 'Early Application Deadline',
                'description'   => 'Deadline for early applications. Students who apply early may receive priority consideration.',
                'start_date'    => '2024-10-15',
                'end_date'      => null,
                'category'      => 'admission',
                'academic_year' => $year,
                'sort_order'    => 2,
            ],
            [
                'name'          => 'Final Application Deadline',
                'description'   => 'Last day to submit completed applications for Semester 2 intake.',
                'start_date'    => '2024-11-30',
                'end_date'      => null,
                'category'      => 'admission',
                'academic_year' => $year,
                'sort_order'    => 3,
            ],
            [
                'name'          => 'Admissions Results Released',
                'description'   => 'Admission decisions communicated to all applicants via email and the student portal.',
                'start_date'    => '2024-12-15',
                'end_date'      => null,
                'category'      => 'admission',
                'academic_year' => $year,
                'sort_order'    => 4,
            ],
            [
                'name'          => 'Mufti Scholarship Application Deadline',
                'description'   => 'Final deadline for the UMSC Mufti Scholarship application for the 2024/2025 academic year.',
                'start_date'    => '2024-10-31',
                'end_date'      => null,
                'category'      => 'admission',
                'academic_year' => $year,
                'sort_order'    => 5,
            ],

            // ── Orientation ──────────────────────────────────────────────────
            [
                'name'          => 'New Student Orientation',
                'description'   => 'Compulsory orientation programme for all new undergraduate students. Includes campus tour, registration, and academic guidance.',
                'start_date'    => '2025-01-13',
                'end_date'      => '2025-01-17',
                'category'      => 'orientation',
                'academic_year' => $year,
                'sort_order'    => 10,
            ],

            // ── Semester 2 ───────────────────────────────────────────────────
            [
                'name'          => 'Semester 2 Teaching Begins',
                'description'   => 'Official start of teaching for all programmes in Semester 2.',
                'start_date'    => '2025-01-20',
                'end_date'      => null,
                'category'      => 'academic',
                'academic_year' => $year,
                'sort_order'    => 20,
            ],
            [
                'name'          => 'Course Add/Drop Period',
                'description'   => 'Students may add or drop courses without academic penalty.',
                'start_date'    => '2025-01-20',
                'end_date'      => '2025-01-31',
                'category'      => 'academic',
                'academic_year' => $year,
                'sort_order'    => 21,
            ],
            [
                'name'          => 'Mid-Semester Break',
                'description'   => 'No scheduled classes. Students are encouraged to use this time for revision.',
                'start_date'    => '2025-03-17',
                'end_date'      => '2025-03-21',
                'category'      => 'holiday',
                'academic_year' => $year,
                'sort_order'    => 30,
            ],
            [
                'name'          => 'Last Day of Teaching – Semester 2',
                'description'   => 'Final day of scheduled lectures and practicals.',
                'start_date'    => '2025-05-02',
                'end_date'      => null,
                'category'      => 'academic',
                'academic_year' => $year,
                'sort_order'    => 40,
            ],

            // ── Examinations ─────────────────────────────────────────────────
            [
                'name'          => 'Semester 2 Examinations',
                'description'   => 'Written examinations for all Semester 2 courses. Individual timetables issued by the Registrar.',
                'start_date'    => '2025-05-12',
                'end_date'      => '2025-05-30',
                'category'      => 'examination',
                'academic_year' => $year,
                'sort_order'    => 50,
            ],
            [
                'name'          => 'Supplementary Examinations',
                'description'   => 'Supplementary sittings for eligible students. Subject to Examination Board approval.',
                'start_date'    => '2025-07-07',
                'end_date'      => '2025-07-11',
                'category'      => 'examination',
                'academic_year' => $year,
                'sort_order'    => 51,
            ],

            // ── Graduation ───────────────────────────────────────────────────
            [
                'name'          => 'Graduation Ceremony 2025',
                'description'   => 'Annual graduation ceremony for students completing their programmes. Gowning and rehearsal schedules communicated separately.',
                'start_date'    => '2025-06-28',
                'end_date'      => null,
                'category'      => 'graduation',
                'academic_year' => $year,
                'sort_order'    => 60,
            ],

            // ── Holidays ─────────────────────────────────────────────────────
            [
                'name'          => 'Eid al-Fitr Holiday',
                'description'   => 'University closed in observance of Eid al-Fitr. Exact dates subject to moon sighting.',
                'start_date'    => '2025-03-30',
                'end_date'      => '2025-04-02',
                'category'      => 'holiday',
                'academic_year' => $year,
                'sort_order'    => 70,
            ],
            [
                'name'          => 'Labour Day',
                'description'   => 'Public holiday. University closed.',
                'start_date'    => '2025-05-01',
                'end_date'      => null,
                'category'      => 'holiday',
                'academic_year' => $year,
                'sort_order'    => 71,
            ],
        ];

        foreach ($events as $event) {
            AcademicCalendarEvent::firstOrCreate(
                ['name' => $event['name'], 'academic_year' => $event['academic_year']],
                array_merge($event, ['is_published' => true, 'is_all_day' => true, 'color' => AcademicCalendarEvent::CATEGORY_COLORS[$event['category']] ?? '#1b1b18'])
            );
        }
    }
}