<?php

namespace Database\Seeders;

use App\Models\GraduationEvent;
use App\Models\Partner;
use App\Models\StaffProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedStaffProfiles();
        $this->seedPartners();
        $this->seedGraduationEvents();
    }

    // ──────────────────────────────────────────────────────────────
    // Staff Profiles
    // ──────────────────────────────────────────────────────────────

    private function seedStaffProfiles(): void
    {
        // Vice Chancellor
        StaffProfile::create([
            'name'           => 'Prof. Ahmed Hassan Al-Rashid',
            'title'          => 'Vice Chancellor',
            'department'     => 'Office of the Vice Chancellor',
            'role_type'      => 'vc',
            'qualifications' => 'PhD (University of London), MSc (Cairo University), BSc (University of Khartoum)',
            'bio'            => 'Professor Al-Rashid brings over 30 years of distinguished academic leadership to INSAN International University. A renowned scholar in the fields of Islamic Economics and Development Studies, he has guided the university through significant growth, establishing it as a centre of academic excellence in Sudan and the wider Arab world. His leadership philosophy centres on nurturing talent, fostering innovation, and ensuring that every graduate leaves equipped to serve their community with competence and integrity.',
            'bio_extended'   => "Prior to joining INSAN, Professor Al-Rashid served as Dean of the Faculty of Economics at the University of Khartoum and later as a senior policy advisor to the Ministry of Higher Education and Scientific Research.\n\nHe has authored more than 40 peer-reviewed papers and three books on Islamic finance and higher education policy in the Arab world. He is an active member of the International Association of University Presidents (IAUP) and serves on the advisory board of the League of Arab States' Higher Education Council.\n\nUnder his stewardship, INSAN has signed over 25 memoranda of understanding with universities and organisations across Africa, the Arab world, Europe, and Asia, while dramatically expanding its postgraduate offerings and research output.",
            'email'          => 'vc@inu.edu.sd',
            'phone'          => '+249-185-000-001',
            'portrait'       => null,
            'sort_order'     => 1,
            'is_active'      => true,
        ]);

        // Governance members
        $governanceMembers = [
            ['name' => 'H.E. Dr. Fatima Al-Nour',       'title' => 'Chancellor',                         'qualifications' => 'PhD (Paris-Sorbonne)'],
            ['name' => 'Prof. Khalid Ibrahim Osman',     'title' => 'Chair, University Council',          'qualifications' => 'PhD (McGill University)'],
            ['name' => 'Dr. Amira Saleh Abdalla',        'title' => 'Chair, Academic Senate',             'qualifications' => 'PhD (Ain Shams University)'],
            ['name' => 'Mr. Yousif Abdel-Aziz Hassan',   'title' => 'University Treasurer',               'qualifications' => 'MBA (INSEAD), CPA'],
            ['name' => 'Prof. Rania Mohammed Al-Tayeb',  'title' => 'Council Member (External)',          'qualifications' => 'PhD (University of Manchester)'],
            ['name' => 'Dr. Tariq Hassan Al-Mubarak',    'title' => 'Council Member (Industry)',          'qualifications' => 'MBA (Harvard Business School)'],
        ];

        foreach ($governanceMembers as $i => $member) {
            StaffProfile::create(array_merge($member, [
                'role_type'  => 'governance',
                'sort_order' => $i + 1,
                'is_active'  => true,
            ]));
        }

        // Leadership / management team
        $leadershipMembers = [
            ['name' => 'Prof. Mona Ali El-Sheikh',      'title' => 'Deputy Vice Chancellor (Academic)',       'department' => 'Academic Affairs',       'qualifications' => 'PhD (University of Edinburgh)'],
            ['name' => 'Dr. Omar Abdel-Rahman Hamad',   'title' => 'Deputy Vice Chancellor (Admin & Finance)','department' => 'Administration',         'qualifications' => 'PhD (American University of Cairo)'],
            ['name' => 'Dr. Hana Ibrahim Mahmoud',      'title' => 'Dean of Students',                       'department' => 'Student Affairs',        'qualifications' => 'PhD (University of Khartoum)'],
            ['name' => 'Prof. Samir Qasim Al-Amin',     'title' => 'Dean of Research & Graduate Studies',    'department' => 'Research Office',        'qualifications' => 'PhD (University of Cape Town)'],
            ['name' => 'Dr. Lubna Mohammed Al-Fadl',    'title' => 'Dean of International Relations',        'department' => 'International Affairs',  'qualifications' => 'PhD (University of Jordan)'],
            ['name' => 'Mr. Anas Yassin Al-Bashir',     'title' => 'Registrar',                              'department' => 'Registry',               'qualifications' => 'MA (University of Khartoum)'],
            ['name' => 'Dr. Nadia Salim Al-Haj',        'title' => 'Director of Quality Assurance',          'department' => 'Quality Assurance',      'qualifications' => 'PhD (Alexandria University)'],
            ['name' => 'Mr. Kamal Abdel-Hafiz Ibrahim', 'title' => 'Director of IT & Digital Transformation','department' => 'Information Technology', 'qualifications' => 'MSc (Heriot-Watt University)'],
        ];

        foreach ($leadershipMembers as $i => $member) {
            StaffProfile::create(array_merge($member, [
                'role_type'  => 'leadership',
                'sort_order' => $i + 1,
                'is_active'  => true,
            ]));
        }
    }

    // ──────────────────────────────────────────────────────────────
    // Partners
    // ──────────────────────────────────────────────────────────────

    private function seedPartners(): void
    {
        $partners = [
            // Academic
            ['name' => 'University of Khartoum',                 'acronym' => 'UofK',   'type' => 'academic',      'country' => 'Sudan',          'website' => 'https://www.uofk.edu', 'homepage' => true,  'mou' => '2018-06-01'],
            ['name' => 'University of Cairo',                    'acronym' => 'CU',     'type' => 'academic',      'country' => 'Egypt',          'website' => 'https://cu.edu.eg',    'homepage' => true,  'mou' => '2019-09-15'],
            ['name' => 'University of Cape Town',                'acronym' => 'UCT',    'type' => 'academic',      'country' => 'South Africa',   'website' => 'https://www.uct.ac.za','homepage' => false, 'mou' => '2021-03-10'],
            ['name' => 'International Islamic University Malaysia','acronym' => 'IIUM',  'type' => 'academic',      'country' => 'Malaysia',       'website' => 'https://www.iium.edu.my','homepage' => true,'mou' => '2020-11-20'],
            ['name' => 'Qatar University',                       'acronym' => 'QU',     'type' => 'academic',      'country' => 'Qatar',          'website' => 'https://qu.edu.qa',    'homepage' => false, 'mou' => '2022-01-05'],

            // International
            ['name' => 'United Nations Development Programme',   'acronym' => 'UNDP',   'type' => 'international', 'country' => 'International',  'website' => 'https://www.undp.org', 'homepage' => true,  'mou' => null],
            ['name' => 'World Health Organization',              'acronym' => 'WHO',    'type' => 'international', 'country' => 'International',  'website' => 'https://www.who.int',  'homepage' => false, 'mou' => null],
            ['name' => 'Islamic Development Bank',               'acronym' => 'IsDB',   'type' => 'international', 'country' => 'Saudi Arabia',   'website' => 'https://isdb.org',     'homepage' => true,  'mou' => '2017-05-12'],

            // Government
            ['name' => 'Ministry of Higher Education & Scientific Research', 'acronym' => 'MOHESR', 'type' => 'government', 'country' => 'Sudan', 'website' => null, 'homepage' => false, 'mou' => null],
            ['name' => 'National Council for Higher Education',  'acronym' => 'NCHE',   'type' => 'government',    'country' => 'Sudan',          'website' => null,                   'homepage' => false, 'mou' => null],
            ['name' => 'Sudan Investment Authority',             'acronym' => 'SIA',    'type' => 'government',    'country' => 'Sudan',          'website' => null,                   'homepage' => false, 'mou' => '2023-02-14'],

            // Industry
            ['name' => 'Sudanese Mobile Telephone Company',      'acronym' => 'SUDATEL','type' => 'industry',      'country' => 'Sudan',          'website' => 'https://sudatel.sd',   'homepage' => false, 'mou' => '2021-08-30'],
            ['name' => 'Bank of Khartoum',                       'acronym' => 'BoK',    'type' => 'industry',      'country' => 'Sudan',          'website' => null,                   'homepage' => false, 'mou' => '2022-06-01'],

            // MoU-specific (overlap with academic but highlighted as formal MoU)
            ['name' => 'Heriot-Watt University Dubai',           'acronym' => 'HWU',    'type' => 'mou',           'country' => 'UAE',            'website' => 'https://dubai.hw.ac.uk','homepage' => true, 'mou' => '2023-09-01', 'mou_expiry' => '2028-08-31'],
        ];

        foreach ($partners as $i => $p) {
            Partner::create([
                'name'             => $p['name'],
                'acronym'          => $p['acronym'] ?? null,
                'partnership_type' => $p['type'],
                'country'          => $p['country'] ?? null,
                'website_url'      => $p['website'] ?? null,
                'description'      => "Strategic partnership supporting joint research, student exchange, and curriculum development.",
                'mou_signed_date'  => $p['mou'] ?? null,
                'mou_expiry_date'  => $p['mou_expiry'] ?? null,
                'sort_order'       => $i + 1,
                'is_active'        => true,
                'show_on_homepage' => $p['homepage'] ?? false,
            ]);
        }
    }

    // ──────────────────────────────────────────────────────────────
    // Graduation Events
    // ──────────────────────────────────────────────────────────────

    private function seedGraduationEvents(): void
    {
        $events = [
            [
                'number'  => 1,
                'title'   => '1st Convocation Ceremony',
                'date'    => '2017-06-15',
                'venue'   => 'University Main Hall, Khartoum',
                'grads'   => 312,
                'keynote' => 'H.E. Minister of Higher Education',
                'desc'    => "A landmark occasion as INSAN International University proudly conferred degrees upon its inaugural cohort of graduates. The ceremony celebrated 312 graduates across four faculties, marking the university's first major milestone since its founding. The day was a testament to the vision of our founders and the dedication of our students, staff, and families.",
                'published' => true,
            ],
            [
                'number'  => 2,
                'title'   => '2nd Convocation Ceremony',
                'date'    => '2019-07-20',
                'venue'   => 'Friendship Hall, Khartoum',
                'grads'   => 487,
                'keynote' => 'Prof. Dr. Abdullah Al-Shibani, Secretary-General of the Association of Arab Universities',
                'desc'    => "The 2nd Convocation Ceremony reflected the university's rapid growth, with nearly 500 graduates receiving their degrees and diplomas. New faculties — including the Faculty of Engineering and Faculty of Health Sciences — participated for the first time. The ceremony was attended by senior government dignitaries, international guests, and proud families.",
                'published' => true,
            ],
            [
                'number'  => 3,
                'title'   => '3rd Convocation Ceremony',
                'date'    => '2022-12-10',
                'venue'   => 'University Sports Complex, Khartoum',
                'grads'   => 620,
                'keynote' => 'Dr. Lubna Al-Zubaidy, President, Arab Network for Quality Assurance in Higher Education',
                'desc'    => "Following a pause due to extraordinary circumstances, INSAN held its 3rd Convocation with renewed resolve, conferring degrees upon 620 graduates. The ceremony honoured the resilience of students and staff alike, and marked the launch of the university's strategic plan for 2023–2027.",
                'published' => true,
            ],
            [
                'number'  => 4,
                'title'   => '4th Convocation Ceremony',
                'date'    => '2025-06-28',
                'venue'   => 'University Main Grounds, Khartoum',
                'grads'   => 750,
                'keynote' => 'Prof. Ahmed Hassan Al-Rashid, Vice Chancellor, INSAN International University',
                'desc'    => "Our largest convocation to date, celebrating 750 graduates across all nine faculties including our first cohort of PhD graduates. A proud milestone for the university community.",
                'published' => true,
            ],
        ];

        foreach ($events as $e) {
            GraduationEvent::create([
                'convocation_number'     => $e['number'],
                'title'                  => $e['title'],
                'slug'                   => Str::slug($e['title']),
                'type'                   => 'convocation',
                'description'            => $e['desc'],
                'venue'                  => $e['venue'],
                'ceremony_date'          => $e['date'],
                'graduates_count'        => $e['grads'],
                'keynote_speaker'        => $e['keynote'],
                'cover_image'            => null,
                'gallery_images'         => null,
                'programme_booklet_url'  => null,
                'live_stream_url'        => null,
                'is_published'           => $e['published'],
                'sort_order'             => $e['number'],
            ]);
        }
    }
}