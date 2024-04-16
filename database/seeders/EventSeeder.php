<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'event' => 'Cita medica',
                'start_date' => '2024-04-15 11:00',
                'end_date' => '2024-04-15 13:00',
                'description' => 'cita para odontologia por un amuela partida',
            ],
            [
                'event' => 'audiencia',
                'start_date' => '2024-04-16 09:00',
                'end_date' => '2024-04-16 11:00',
                'description' => 'demanda por alimentos',
            ],
        ];
        foreach ($events as $event) {
            Event::create($event);
        }
    }

}
