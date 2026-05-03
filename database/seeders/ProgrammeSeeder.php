<?php

namespace Database\Seeders;

use App\Models\Programme;
use Illuminate\Database\Seeder;

class ProgrammeSeeder extends Seeder
{
    public function run(): void
    {
        $programmes = [
            [
                'slug' => 'computer-science-it',
                'title' => [
                    'en' => 'Computer Science & Information Technology',
                    'ar' => 'علوم الحاسوب وتقنية المعلومات'
                ],
                'type' => 'BSc (Hons)',
                'category' => 'undergraduate',
                'icon' => 'fa-laptop-code',
                'badge' => 'BSc (Hons)',
                'description' => [
                    'en' => 'Develop expertise in software engineering, data science, cybersecurity, and artificial intelligence.',
                    'ar' => 'طوّر خبراتك في هندسة البرمجيات، علوم البيانات، الأمن السيبراني، والذكاء الاصطناعي مع تدريب عملي في المختبرات.'
                ],
                'duration' => '4 Years (8 Semesters)',
                'credits' => '140 Credits',
                'intake' => 'September & February',
                
                // Translations mapped into arrays
                'requirements' => [
                    'en' => [
                        'Secondary School Certificate with minimum 70%',
                        'English Language proficiency (IELTS 6.0)',
                        'Personal interview'
                    ],
                    'ar' => [
                        'شهادة الثانوية العامة بمعدل لا يقل عن 70%',
                        'إجادة اللغة الإنجليزية',
                        'مقابلة شخصية'
                    ]
                ],
                
                'fees' => [
                    'en' => [
                        ['label' => 'Tuition per Semester', 'value' => '$2,500 USD'],
                        ['label' => 'Total Programme Cost', 'value' => '$20,600 USD'],
                    ],
                    'ar' => [
                        ['label' => 'الرسوم الدراسية للفصل', 'value' => '$2,500 دولار'],
                        ['label' => 'إجمالي تكلفة البرنامج', 'value' => '$20,600 دولار'],
                    ]
                ],

                'modules' => [
                    'en' => [
                        'Introduction to Programming & Algorithms',
                        'Artificial Intelligence & Machine Learning',
                    ],
                    'ar' => [
                        'مقدمة في البرمجة والخوارزميات',
                        'الذكاء الاصطناعي وتعلم الآلة',
                    ]
                ],
                'sort_order' => 1,
            ],
            
            [
                'slug' => 'islamic-studies',
                'title' => [
                    'en' => 'Islamic Studies & Arabic Language',
                    'ar' => 'الدراسات الإسلامية واللغة العربية'
                ],
                'type' => 'BA (Hons)',
                'category' => 'undergraduate',
                'icon' => 'fa-mosque',
                'badge' => 'BA (Hons)',
                'description' => [
                    'en' => 'Comprehensive study of Islamic theology, jurisprudence, Quranic sciences, and classical Arabic.',
                    'ar' => 'دراسة شاملة للعقيدة الإسلامية، الفقه، علوم القرآن، واللغة العربية الفصحى وأدبها.'
                ],
                'duration' => '4 Years (8 Semesters)',
                'credits' => '132 Credits',
                'intake' => 'September Only',
                'requirements' => [
                    'en' => ['Secondary School Certificate minimum 65%', 'Arabic Language proficiency test'],
                    'ar' => ['شهادة الثانوية العامة بمعدل 65%', 'اختبار كفاءة اللغة العربية']
                ],
                'fees' => [
                    'en' => [['label' => 'Total Programme Cost', 'value' => '$15,750 USD']],
                    'ar' => [['label' => 'إجمالي تكلفة البرنامج', 'value' => '$15,750 دولار']]
                ],
                'modules' => [
                    'en' => ['Foundations of Islamic Theology', 'Quranic Exegesis & Sciences'],
                    'ar' => ['أسس العقيدة الإسلامية', 'تفسير وعلوم القرآن']
                ],
                'sort_order' => 2,
            ],
        ];

        foreach ($programmes as $programme) {
            Programme::create($programme);
        }
    }
}