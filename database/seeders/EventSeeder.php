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
                'title' => 'Annual Graduation Ceremony 2026',
                'category' => 'academic',
                'thumbnail' => 'https://images.unsplash.com/photo-1544531585-9847b68c8c86?w=800&q=80',
                'start_date' => Carbon::parse('2026-05-15'),
                'end_date' => Carbon::parse('2026-05-15'),
                'time' => '9:00 AM - 2:00 PM',
                'location' => 'Main Auditorium, INSAN Campus',
                'description' => 'Join us in celebrating the achievements of our graduating class of 2026. Keynote address by distinguished alumni and award presentations.',
                'schedule' => [
                    '8:30 AM — Guest Arrival & Registration',
                    '9:00 AM — Academic Procession & Opening Recitation',
                    '9:30 AM — Welcome Address by University President',
                    '10:00 AM — Conferral of Degrees by Faculty',
                    '11:30 AM — Valedictorian Address',
                    '12:00 PM — Keynote Speech by Distinguished Alumni',
                    '12:45 PM — Award Presentations',
                    '1:30 PM — Closing Dua & Reception',
                ],
            ],
            [
                'slug' => 'cultural-night-2026',
                'title' => 'International Cultural Night',
                'category' => 'cultural',
                'thumbnail' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=800&q=80',
                'start_date' => Carbon::parse('2026-05-22'),
                'end_date' => Carbon::parse('2026-05-22'),
                'time' => '6:00 PM - 10:00 PM',
                'location' => 'University Square & Open Air Theater',
                'description' => 'A vibrant celebration of diversity featuring traditional performances, international cuisine, and cultural exhibitions from over 25 countries.',
                'schedule' => [
                    '6:00 PM — Opening Ceremony & Flag Parade',
                    '6:30 PM — Traditional Fashion Show',
                    '7:15 PM — Cultural Dance Performances',
                    '8:00 PM — International Cuisine Festival',
                    '8:45 PM — Musical Performances',
                    '9:30 PM — Unity Circle & Closing',
                ],
            ],
            // Add remaining events...
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}