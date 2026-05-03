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
                'name'    => [
                    'en' => 'The UMSC Mufti Scholarship',
                    'ar' => 'منحة مفتي المجلس الأعلى لمسلمي أوغندا'
                ],
                'tagline' => [
                    'en' => 'Empowering Future Muslim Leaders Through Education',
                    'ar' => 'تمكين قادة المستقبل المسلمين من خلال التعليم'
                ],
                'overview' => [
                    'en' => 'The UMSC Mufti Scholarship is established to support talented Muslim students of strong academic potential who face financial barriers...',
                    'ar' => 'تم تأسيس منحة المفتي لدعم الطلاب المسلمين الموهوبين ذوي الإمكانات الأكاديمية القوية الذين يواجهون عوائق مالية...'
                ],
                'purposes' => [
                    'en' => [
                        'Support financially disadvantaged but academically qualified Muslim students',
                        'Develop future Muslim leaders and professionals',
                    ],
                    'ar' => [
                        'دعم الطلاب المسلمين المؤهلين أكاديمياً والمحتاجين مالياً',
                        'تطوير قادة ومهنيين مسلمين للمستقبل',
                    ]
                ],
                'benefits' => [
                    'en' => [
                        'Full or partial tuition coverage',
                        'Dedicated mentorship from Islamic scholars',
                    ],
                    'ar' => [
                        'تغطية كاملة أو جزئية للرسوم الدراسية',
                        'توجيه وإرشاد من علماء دين متخصصين',
                    ]
                ],
                'eligibility_criteria' => [
                    'en' => [
                        'Must be a Muslim Ugandan citizen',
                        'Must demonstrate verifiable financial need',
                    ],
                    'ar' => [
                        'أن يكون مسلماً ويحمل الجنسية الأوغندية',
                        'إثبات الحاجة المالية الماسة',
                    ]
                ],
                'required_documents' => [
                    'en' => ['Completed application form', 'Academic transcripts', 'Personal statement'],
                    'ar' => ['نموذج التقديم المكتمل', 'السجلات الأكاديمية', 'رسالة الدافع الشخصية']
                ],
                'application_process' => [
                    'en' => "1. Complete online application.\n2. Submit documents.\n3. Attend interview if shortlisted.",
                    'ar' => "١. أكمل طلب التقديم عبر الإنترنت.\n٢. قم بتسليم المستندات المطلوبة.\n٣. حضور المقابلة الشخصية إذا تم ترشيحك."
                ],
                'application_deadline' => '2024-10-31',
                'application_url'      => 'https://portal.inu.edu.sd/apply/scholarships/mufti',
                'duration'             => '3–4 years',
                'covers_full_tuition'  => true,
                'is_active'            => true,
                'is_featured'          => true,
                'sort_order'           => 1,
            ]
        );
    }
}