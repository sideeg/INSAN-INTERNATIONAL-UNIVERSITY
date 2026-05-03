<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'slug' => 'graduation-2026',
                'title' => [
                    'en' => 'Annual Graduation Ceremony 2026',
                    'ar' => 'حفل التخرج السنوي 2026'
                ],
                'category' => 'academic',
                'thumbnail' => 'https://images.unsplash.com/photo-1738949538500-54647382e038?q=80&w=687',
                'start_date' => Carbon::parse('2026-05-15'),
                'end_date' => Carbon::parse('2026-05-15'),
                'time' => [
                    'en' => '9:00 AM - 2:00 PM',
                    'ar' => '٩:٠٠ صباحاً - ٢:٠٠ ظهراً'
                ],
                'location' => [
                    'en' => 'Main Auditorium, INSAN Campus',
                    'ar' => 'القاعة الرئيسية، حرم جامعة إنسان'
                ],
                'description' => [
                    'en' => 'Join us in celebrating the achievements of our graduating class of 2026. Keynote address by distinguished alumni.',
                    'ar' => 'انضم إلينا للاحتفال بإنجازات خريجي دفعة 2026. يتضمن الحفل كلمة رئيسية من أبرز الخريجين وتوزيع الجوائز.'
                ],
                'schedule' => [
                    'en' => [
                        '8:30 AM — Guest Arrival & Registration',
                        '9:00 AM — Academic Procession',
                        '12:00 PM — Keynote Speech'
                    ],
                    'ar' => [
                        '٨:٣٠ صباحاً — وصول الضيوف والتسجيل',
                        '٩:٠٠ صباحاً — الموكب الأكاديمي',
                        '١٢:٠٠ ظهراً — الكلمة الرئيسية'
                    ]
                ],
            ],
            [
                'slug' => 'cultural-night-2026',
                'title' => [
                    'en' => 'International Cultural Night',
                    'ar' => 'الليلة الثقافية العالمية'
                ],
                'category' => 'cultural',
                'thumbnail' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=800&q=80',
                'start_date' => Carbon::parse('2026-05-22'),
                'end_date' => Carbon::parse('2026-05-22'),
                'time' => [
                    'en' => '6:00 PM - 10:00 PM',
                    'ar' => '٦:٠٠ مساءً - ١٠:٠٠ مساءً'
                ],
                'location' => [
                    'en' => 'University Square',
                    'ar' => 'ساحة الجامعة ومسرح الهواء الطلق'
                ],
                'description' => [
                    'en' => 'A vibrant celebration of diversity featuring traditional performances and international cuisine.',
                    'ar' => 'احتفال نابض بالحياة بالتنوع الثقافي يضم عروضاً تقليدية وأطباقاً عالمية من أكثر من ٢٥ دولة.'
                ],
                'schedule' => [
                    'en' => [
                        '6:00 PM — Opening Ceremony',
                        '7:15 PM — Cultural Dance Performances',
                    ],
                    'ar' => [
                        '٦:٠٠ مساءً — الحفل الافتتاحي',
                        '٧:١٥ مساءً — عروض الرقص الثقافي',
                    ]
                ],
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}