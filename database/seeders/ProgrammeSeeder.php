<?php

namespace Database\Seeders;

use App\Models\Programme;
use Illuminate\Database\Seeder;

class ProgrammeSeeder extends Seeder
{
    public function run(): void
    {
        $programmes = [
            // Undergraduate
            [
                'slug' => 'computer-science-it',
                'title' => 'Computer Science & Information Technology',
                'type' => 'BSc (Hons)',
                'category' => 'undergraduate',
                'icon' => 'fa-laptop-code',
                'badge' => 'BSc (Hons)',
                'description' => 'Develop expertise in software engineering, data science, cybersecurity, and artificial intelligence with hands-on laboratory training.',
                'duration' => '4 Years (8 Semesters)',
                'credits' => '140 Credits',
                'intake' => 'September & February',
                'requirements' => [
                    'Secondary School Certificate with minimum 70% in Mathematics and Physics',
                    'English Language proficiency (IELTS 6.0 or equivalent)',
                    'Pass in INSAN Entrance Examination',
                    'Personal interview with the Faculty Dean',
                ],
                'fees' => [
                    ['label' => 'Tuition per Semester', 'value' => '$2,500 USD'],
                    ['label' => 'Registration Fee', 'value' => '$150 USD (one-time)'],
                    ['label' => 'Laboratory Fee', 'value' => '$300 USD per year'],
                    ['label' => 'Total Programme Cost', 'value' => '$20,600 USD'],
                ],
                'modules' => [
                    'Introduction to Programming & Algorithms',
                    'Data Structures & Object-Oriented Design',
                    'Database Management Systems',
                    'Computer Networks & Security',
                    'Artificial Intelligence & Machine Learning',
                    'Software Engineering & Project Management',
                    'Cloud Computing & Distributed Systems',
                    'Capstone Project & Industry Internship',
                ],
                'sort_order' => 1,
            ],
            [
                'slug' => 'islamic-studies',
                'title' => 'Islamic Studies & Arabic Language',
                'type' => 'BA (Hons)',
                'category' => 'undergraduate',
                'icon' => 'fa-mosque',
                'badge' => 'BA (Hons)',
                'description' => 'Comprehensive study of Islamic theology, jurisprudence, Quranic sciences, and classical Arabic linguistics and literature.',
                'duration' => '4 Years (8 Semesters)',
                'credits' => '132 Credits',
                'intake' => 'September Only',
                'requirements' => [
                    'Secondary School Certificate with minimum 65% overall',
                    'Arabic Language proficiency test for non-native speakers',
                    'Pass in INSAN Entrance Examination',
                    'Personal interview with the Faculty Dean',
                ],
                'fees' => [
                    ['label' => 'Tuition per Semester', 'value' => '$1,800 USD'],
                    ['label' => 'Registration Fee', 'value' => '$150 USD (one-time)'],
                    ['label' => 'Library & Manuscript Access', 'value' => '$200 USD per year'],
                    ['label' => 'Total Programme Cost', 'value' => '$15,750 USD'],
                ],
                'modules' => [
                    'Foundations of Islamic Theology (Aqidah)',
                    'Principles of Islamic Jurisprudence (Usul al-Fiqh)',
                    'Quranic Exegesis (Tafsir) & Sciences',
                    'Hadith Studies & Authentication Methods',
                    'Classical Arabic Grammar & Rhetoric',
                    'Islamic History & Civilization',
                    'Comparative Religion & Philosophy',
                    'Research Methodology in Islamic Studies',
                ],
                'sort_order' => 2,
            ],
            // Add remaining undergraduate programmes...
            
            // Graduate
            [
                'slug' => 'data-science-ai',
                'title' => 'Data Science & Artificial Intelligence',
                'type' => 'MSc',
                'category' => 'graduate',
                'icon' => 'fa-brain',
                'badge' => 'MSc',
                'description' => 'Advanced study in machine learning, deep learning, big data analytics, and intelligent systems design with industry collaboration.',
                'duration' => '2 Years (4 Semesters)',
                'credits' => '36 Credits',
                'intake' => 'September & February',
                'requirements' => [
                    'Bachelor degree in Computer Science, Mathematics, or related field (minimum GPA 3.0/4.0)',
                    'GRE scores (minimum 300) or equivalent',
                    'Programming proficiency in Python or R',
                    'Two academic references',
                ],
                'fees' => [
                    ['label' => 'Tuition per Semester', 'value' => '$3,500 USD'],
                    ['label' => 'Registration Fee', 'value' => '$200 USD (one-time)'],
                    ['label' => 'Research & Computing Lab', 'value' => '$500 USD per year'],
                    ['label' => 'Total Programme Cost', 'value' => '$15,100 USD'],
                ],
                'modules' => [
                    'Advanced Machine Learning & Deep Learning',
                    'Big Data Analytics & Cloud Infrastructure',
                    'Natural Language Processing & Computer Vision',
                    'Statistical Learning & Optimization',
                    'Ethics in AI & Data Governance',
                    'Research Methodology & Thesis',
                    'Industry Project & Internship',
                ],
                'sort_order' => 1,
            ],
            // Add remaining graduate programmes...
            
            // Continuing Education
            [
                'slug' => 'pmp-certification',
                'title' => 'Project Management Professional (PMP)',
                'type' => 'Certificate',
                'category' => 'continuing',
                'icon' => 'fa-certificate',
                'badge' => 'Certificate',
                'description' => 'Industry-recognised certification preparing professionals for leadership roles in project planning, execution, and delivery across sectors.',
                'duration' => '12 Weeks (Evening & Weekend Classes)',
                'credits' => '120 Contact Hours',
                'intake' => 'Monthly Intakes',
                'requirements' => [
                    'Bachelor degree or equivalent professional qualification',
                    'Minimum 3 years professional experience',
                    'Basic understanding of business operations',
                    'Commitment to attend 90% of sessions',
                ],
                'fees' => [
                    ['label' => 'Programme Fee', 'value' => '$1,200 USD'],
                    ['label' => 'Study Materials & PMBOK Guide', 'value' => '$150 USD'],
                    ['label' => 'PMP Exam Voucher (optional)', 'value' => '$555 USD'],
                    ['label' => 'Total Investment', 'value' => '$1,905 USD'],
                ],
                'modules' => [
                    'Project Integration & Scope Management',
                    'Schedule, Cost & Quality Management',
                    'Resource, Communication & Risk Management',
                    'Procurement & Stakeholder Management',
                    'Agile & Hybrid Project Approaches',
                    'PMP Exam Preparation & Mock Tests',
                    'Capstone Project Simulation',
                ],
                'sort_order' => 1,
            ],
            // Add remaining continuing education programmes...
        ];

        foreach ($programmes as $programme) {
            Programme::create($programme);
        }
    }
}