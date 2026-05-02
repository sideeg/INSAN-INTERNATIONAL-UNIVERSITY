<?php

namespace Database\Seeders;

use App\Models\Scholarship;
use Illuminate\Database\Seeder;

class ScholarshipSeeder extends Seeder
{
    public function run(): void
    {
        Scholarship::firstOrCreate(
            ['slug' => 'umsc-mufti-scholarship'],
            [
                'name'    => 'The UMSC Mufti Scholarship',
                'tagline' => 'Empowering Future Muslim Leaders Through Education',

                'overview' => 'The UMSC Mufti Scholarship at Islamic Call University College (ICUC), established in collaboration with the Uganda Muslim Supreme Council (UMSC), is one of Uganda\'s most prestigious Islamic education awards. It exists to support talented Muslim students of strong academic potential who face financial barriers to higher education — ensuring that financial hardship is never an obstacle to academic excellence and community contribution.',

                'purposes' => [
                    'Support financially disadvantaged but academically qualified Muslim students',
                    'Promote excellence in both Islamic and general academic disciplines',
                    'Develop future Muslim leaders, scholars, and professionals',
                    'Ensure equal access to quality higher education for all deserving students',
                ],

                'benefits' => [
                    'Full or partial tuition coverage (determined by demonstrated financial need)',
                    'Dedicated mentorship from Islamic scholars and UMSC community leaders',
                    'Priority access to university academic and career support services',
                    'Participation in UMSC leadership development forums and events',
                ],

                'eligibility_criteria' => [
                    'Must be a Muslim Ugandan citizen',
                    'Must hold a strong academic record (minimum of a credit pass in prior qualifications)',
                    'Must demonstrate verifiable financial need',
                    'Must show commitment to Islamic values and community service',
                    'Must be enrolled or accepted into a full-time undergraduate programme at ICUC',
                    'Must not be in receipt of another full scholarship covering tuition',
                ],

                'required_documents' => [
                    'Completed scholarship application form (online or paper)',
                    'Official academic transcripts from previous institution(s)',
                    'A signed recommendation letter from a recognised Islamic scholar or community leader',
                    'Evidence of financial need (e.g. household income statement, parental declaration)',
                    'A personal statement (500–800 words) outlining your goals and commitment to the scholarship values',
                    'Copy of national identification (National ID or passport)',
                ],

                'application_process' => "1. Complete the online application form via the student portal, or collect a paper form from the Admissions Office.\n2. Gather and attach all required documents listed above.\n3. Submit your complete application before the published deadline. Incomplete applications will not be considered.\n4. Shortlisted applicants will be invited to attend an interview with the Scholarship Selection Committee.\n5. Final selections are based on academic merit, financial need, and alignment with the scholarship's founding values.\n6. All applicants will be notified of the outcome within 30 days of the interview stage.",

                'application_deadline' => '2024-10-31',
                'application_url'      => 'https://portal.inu.edu.sd/apply/scholarships/mufti',

                'duration'             => '3–4 years (covering the full undergraduate programme duration)',
                'renewal_conditions'   => "Scholarship renewal is assessed annually and requires:\n- Maintained academic performance (minimum GPA of 2.5 or equivalent)\n- Continued demonstration of financial need\n- Satisfactory conduct and adherence to university regulations\n- Completion of one community/mentorship activity per year",

                'impact_points' => [
                    'Enables access to quality higher education for students who would otherwise be unable to afford it',
                    'Produces academically strong, ethically grounded graduates equipped to lead in their communities',
                    'Strengthens the UMSC–ICUC partnership in advancing Islamic education in Uganda and the region',
                    'Contributes directly to national development through an educated, value-driven Muslim professional class',
                ],

                'partner_organisation' => 'Uganda Muslim Supreme Council (UMSC)',
                'covers_full_tuition'  => true,
                'is_active'            => true,
                'is_featured'          => true,
                'sort_order'           => 1,
            ]
        );
    }
}