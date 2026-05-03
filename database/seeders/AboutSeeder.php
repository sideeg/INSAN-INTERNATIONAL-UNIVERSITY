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

    private function seedStaffProfiles(): void
    {
        // Vice Chancellor
        StaffProfile::create([
            'name'           => ['en' => 'Prof. Ahmed Hassan Al-Rashid', 'ar' => 'أ.د. أحمد حسن الراشد'],
            'title'          => ['en' => 'Vice Chancellor', 'ar' => 'مدير الجامعة'],
            'department'     => ['en' => 'Office of the Vice Chancellor', 'ar' => 'مكتب مدير الجامعة'],
            'role_type'      => 'vc',
            'qualifications' => ['en' => 'PhD (University of London), MSc (Cairo University)', 'ar' => 'دكتوراة (جامعة لندن)، ماجستير (جامعة القاهرة)'],
            'bio'            => [
                'en' => 'Professor Al-Rashid brings over 30 years of distinguished academic leadership to INSAN International University...',
                'ar' => 'يتمتع البروفيسور الراشد بأكثر من 30 عاماً من القيادة الأكاديمية المتميزة في جامعة إنسان العالمية...'
            ],
            'bio_extended'   => [
                'en' => 'Prior to joining INSAN, Professor Al-Rashid served as Dean of the Faculty of Economics...',
                'ar' => 'قبل انضمامه إلى جامعة إنسان، شغل البروفيسور الراشد منصب عميد كلية الاقتصاد...'
            ],
            'email'          => 'vc@inu.edu.sd',
            'phone'          => '+249-185-000-001',
            'portrait'       => null,
            'sort_order'     => 1,
            'is_active'      => true,
        ]);

        // Governance members
        $governanceMembers = [
            [
                'name' => ['en' => 'H.E. Dr. Fatima Al-Nour', 'ar' => 'سعادة الدكتورة فاطمة النور'],
                'title' => ['en' => 'Chancellor', 'ar' => 'رئيس الجامعة (فخري)'],
                'qualifications' => ['en' => 'PhD (Paris-Sorbonne)', 'ar' => 'دكتوراة (جامعة السوربون)']
            ],
            [
                'name' => ['en' => 'Prof. Khalid Ibrahim Osman', 'ar' => 'أ.د. خالد إبراهيم عثمان'],
                'title' => ['en' => 'Chair, University Council', 'ar' => 'رئيس مجلس الجامعة'],
                'qualifications' => ['en' => 'PhD (McGill University)', 'ar' => 'دكتوراة (جامعة مكغيل)']
            ],
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
            [
                'name' => ['en' => 'Prof. Mona Ali El-Sheikh', 'ar' => 'أ.د. منى علي الشيخ'],
                'title' => ['en' => 'Deputy Vice Chancellor', 'ar' => 'نائب مدير الجامعة'],
                'department' => ['en' => 'Academic Affairs', 'ar' => 'الشؤون الأكاديمية'],
                'qualifications' => ['en' => 'PhD (University of Edinburgh)', 'ar' => 'دكتوراة (جامعة إدنبرة)']
            ],
        ];

        foreach ($leadershipMembers as $i => $member) {
            StaffProfile::create(array_merge($member, [
                'role_type'  => 'leadership',
                'sort_order' => $i + 1,
                'is_active'  => true,
            ]));
        }
    }

    private function seedPartners(): void
    {
        // Kept simple as Partners typically just use normal strings, but if translatable, apply array format here.
        Partner::create([
            'name'             => 'University of Khartoum',
            'acronym'          => 'UofK',
            'partnership_type' => 'academic',
            'country'          => 'Sudan',
            'website_url'      => 'https://www.uofk.edu',
            'description'      => 'Strategic partnership supporting joint research.',
            'sort_order'       => 1,
            'is_active'        => true,
            'show_on_homepage' => true,
        ]);
    }

    private function seedGraduationEvents(): void
    {
        // Assuming GraduationEvent isn't heavily translated yet, or apply standard array mapping if you added HasTranslations
    }
}